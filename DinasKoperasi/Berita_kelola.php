<?php
session_start();
include 'koneksi.php';

// Pastikan hanya admin yang sudah login yang bisa mengakses halaman ini
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='index.php';</script>";
    exit;
}

// Ambil data berita dari database
$query = "SELECT * FROM berita ORDER BY tanggal_posting DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - Admin Panel</title>
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
            <!-- Menu Kelola Berita Aktif -->
            <a href="Berita_kelola.php" class="flex items-center gap-3 p-3 rounded bg-[#0a424a] font-semibold transition-colors">
                <i data-lucide="file-text" class="w-5 h-5"></i> Kelola Berita
            </a>
            <a href="Galeri_kelola.php" class="flex items-center gap-3 p-3 rounded hover:bg-[#0a424a] transition-colors">
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

    <!-- Konten Utama -->
    <main class="flex-grow p-8 ml-64">
        
        <!-- Header Utama Halaman -->
        <header class="mb-8 flex flex-col md:flex-row md:justify-between md:items-end gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Berita</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola artikel, pengumuman, dan publikasi berita terbaru.</p>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500 font-medium">
                <i data-lucide="user" class="w-4 h-4"></i>
                Halo, <?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Admin'; ?>!
            </div>
        </header>

        <!-- Container Tabel Berita -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
            
            <!-- Header Kartu & Tombol Tambah -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-gray-100 pb-4">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <i data-lucide="list" class="w-5 h-5 text-[#0f5b66]"></i> Daftar Berita
                </h2>
                
                <a href="Berita_tambah.php" class="bg-[#0f5b66] text-white px-4 py-2 rounded-md hover:bg-[#0a424a] font-semibold transition-colors text-sm flex items-center gap-2 shadow-sm">
                    <i data-lucide="plus" class="w-4 h-4"></i> Tambah Berita
                </a>
            </div>

            <!-- Tabel Data Berita -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-full">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm border-y">
                            <th class="p-3 font-semibold text-center w-12">No</th>
                            <th class="p-3 font-semibold">Gambar</th>
                            <th class="p-3 font-semibold">Judul Berita</th>
                            <th class="p-3 font-semibold">Status</th>
                            <th class="p-3 font-semibold">Tanggal Posting</th>
                            <th class="p-3 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <?php 
                        $no = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) : 
                        ?>
                        <tr class="border-b hover:bg-gray-50 transition-colors">
                            <td class="p-3 text-center text-gray-500"><?= $no++; ?></td>
                            <td class="p-3">
                                <div class="w-20 h-12 rounded overflow-hidden border border-gray-200 bg-gray-100">
                                    <img src="uploads/<?= $row['gambar']; ?>" class="w-full h-full object-cover" alt="Gambar Berita">
                                </div>
                            </td>
                            <td class="p-3 font-medium text-gray-800">
                                <?= $row['judul']; ?>
                            </td>
                            <td class="p-3">
                                <?php
                                    $is_publish = strtolower($row['status']) == 'publish';
                                    $bg_status = $is_publish ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700';
                                ?>
                                <span class="px-2.5 py-1 rounded-md text-[11px] <?= $bg_status ?> font-bold uppercase tracking-wider">
                                    <?= $row['status']; ?>
                                </span>
                            </td>
                            <td class="p-3 text-gray-600">
                                <?= date('d/m/Y', strtotime($row['tanggal_posting'])); ?>
                            </td>
                            <td class="p-3 text-center whitespace-nowrap">
                                <a href="Berita_edit.php?id=<?= $row['id']; ?>" class="text-blue-500 hover:text-blue-700 inline-flex items-center gap-1 font-medium bg-blue-50 px-3 py-1.5 rounded-md hover:bg-blue-100 transition-colors mr-2">
                                    <i data-lucide="edit" class="w-4 h-4"></i> Edit
                                </a>
                                <a href="Berita_hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?');" class="text-red-500 hover:text-red-700 inline-flex items-center gap-1 font-medium bg-red-50 px-3 py-1.5 rounded-md hover:bg-red-100 transition-colors">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php 
                            endwhile; 
                        } else {
                            echo "<tr><td colspan='6' class='p-6 text-center text-gray-500 border-2 border-dashed border-gray-200 rounded-lg'>Belum ada data berita.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <!-- Script Inisialisasi Ikon -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>