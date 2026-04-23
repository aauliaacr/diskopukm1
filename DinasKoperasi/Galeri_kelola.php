<?php
session_start();
include 'koneksi.php';

// Pastikan hanya admin yang sudah login yang bisa mengakses halaman ini
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='index.php';</script>";
    exit;
}

// Mengambil data galeri dari database
$query = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri - Admin Panel</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar Sederhana Admin -->
    <aside class="w-64 bg-[#0f5b66] text-white flex flex-col fixed h-full z-10">
        <div class="p-6 border-b border-[#0a424a] flex items-center gap-3">
            <div class="bg-white p-2 rounded-lg">
                <i data-lucide="building-2" class="w-6 h-6 text-[#0f5b66]"></i>
            </div>
            <h2 class="text-lg font-bold">Admin Panel</h2>
        </div>
        <nav class="flex-grow p-4 space-y-2">
            <a href="adminDashboard.php" class="flex items-center gap-3 p-3 rounded hover:bg-[#0a424a] transition-colors">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard Utama
            </a>
             <a href="Berita_kelola.php" class="flex items-center gap-3 p-3 rounded hover:bg-[#0a424a] transition-colors">
                <i data-lucide="file-text" class="w-5 h-5"></i> Kelola Berita
            </a>
            <a href="Galeri_kelola.php" class="flex items-center gap-3 p-3 rounded bg-[#0a424a] font-semibold transition-colors">
                <i data-lucide="image" class="w-5 h-5"></i> Kelola Galeri
            </a>
            <a href="StrukturOrg_kelola.php" class="flex items-center gap-3 p-3 rounded hover:bg-[#0a424a] transition-colors">
                <i data-lucide="users" class="w-5 h-5"></i> Kelola Struktur
            </a>
            <a href="logout.php" class="flex items-center gap-3 p-3 rounded hover:bg-red-600 transition-colors mt-8 text-red-200 hover:text-white">
                <i data-lucide="log-out" class="w-5 h-5"></i> Keluar
            </a>
        </nav>
    </aside>

    <!-- Konten Utama (Beri margin kiri agar tidak tertutup sidebar fixed) -->
    <main class="flex-grow p-8 ml-64">
        
        <!-- Header Utama Halaman -->
        <header class="mb-8 flex flex-col md:flex-row md:justify-between md:items-end gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Galeri</h1>
                <p class="text-sm text-gray-500 mt-1">Unggah, edit, dan hapus foto kegiatan pada galeri website.</p>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500 font-medium">
                <i data-lucide="user" class="w-4 h-4"></i>
                Halo, <?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Admin'; ?>!
            </div>
        </header>

        <!-- Container Kelola Galeri -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            
            <!-- Header Kartu & Form Upload -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-gray-100 pb-4">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <i data-lucide="images" class="w-5 h-5 text-[#0f5b66]"></i> Daftar Foto Galeri
                </h2>
                
                <!-- Form Upload diarahkan ke Galeri_proses.php milik Anda -->
                <form action="Galeri_proses.php" method="POST" enctype="multipart/form-data" class="flex items-center gap-2 w-full md:w-auto">
                    <input type="file" name="gambar" accept=".jpg, .jpeg, .png" class="border border-gray-300 p-1.5 text-sm rounded-md focus:outline-none focus:border-[#0f5b66] w-full md:w-auto" required>
                    <button type="submit" name="upload" class="bg-[#0f5b66] text-white px-4 py-2 rounded-md hover:bg-[#0a424a] font-semibold transition-colors text-sm flex items-center gap-2 shadow-sm">
                        <i data-lucide="upload" class="w-4 h-4"></i> Upload
                    </button>
                </form>
            </div>

            <!-- Grid Foto Galeri -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
                <?php 
                if (mysqli_num_rows($query) > 0) {
                    while($row = mysqli_fetch_assoc($query)) : 
                ?>
                <div class="relative group h-40 md:h-48 rounded-xl overflow-hidden border border-gray-200 bg-gray-100 shadow-sm">
                    <!-- Path gambar menggunakan path asli Anda -->
                    <img src="uploads/galeri/<?= $row['nama_file']; ?>" alt="Foto Galeri" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    
                    <!-- Overlay Hover (Hitam transparan dengan ikon Edit & Hapus) -->
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                        
                        <!-- Tombol Edit -->
                        <a href="Galeri_edit.php?id=<?= $row['id']; ?>" title="Edit Foto" class="bg-blue-500 text-white p-2.5 rounded-full shadow-lg hover:bg-blue-600 transition transform hover:-translate-y-1">
                            <i data-lucide="edit-2" class="w-4 h-4"></i>
                        </a>

                        <!-- Tombol Hapus -->
                        <a href="hapus_galeri.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?');" title="Hapus Foto" class="bg-red-500 text-white p-2.5 rounded-full shadow-lg hover:bg-red-600 transition transform hover:-translate-y-1">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </a>

                    </div>
                </div>
                <?php 
                    endwhile; 
                } else {
                    // Pesan jika galeri masih kosong
                    echo "<div class='col-span-full py-12 text-center text-gray-500 border-2 border-dashed border-gray-300 rounded-xl bg-gray-50'>
                            <i data-lucide='image-off' class='w-10 h-10 mx-auto text-gray-400 mb-2'></i>
                            Belum ada foto di galeri. Silakan upload foto baru.
                          </div>";
                }
                ?>
            </div>

        </div>
    </main>

    <!-- Script Inisialisasi Ikon -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>