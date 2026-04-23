<?php
include 'koneksi.php';

// Ambil parameter pencarian dan kategori dari URL
$search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
$kategori_filter = isset($_GET['kategori']) ? mysqli_real_escape_string($koneksi, $_GET['kategori']) : '';

// Susun Query Dasar
$sql = "SELECT * FROM berita WHERE status = 'publish'";

// Tambahkan logika pencarian jika ada input
if (!empty($search)) {
    $sql .= " AND (judul LIKE '%$search%' OR isi_berita LIKE '%$search%')";
}

// Tambahkan logika filter kategori jika dipilih
if (!empty($kategori_filter)) {
    $sql .= " AND kategori = '$kategori_filter'";
}

$sql .= " ORDER BY tanggal_posting DESC";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Berita - Dinas Koperasi & UKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0d5a6c', 
                        secondary: '#94aa3e', 
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">

    <div class="bg-primary py-8 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Warta Koperasi & UKM</h1>
            <p class="text-secondary">Kumpulan informasi dan berita terkini seputar Kota Makassar</p>

            <div class="max-w-7xl mx-auto px-4 mb-8">
    <form action="" method="GET" class="flex flex-col md:flex-row gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
        <div class="flex-1 relative">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" name="search" value="<?= $search; ?>" 
                   placeholder="Cari berita..." 
                   class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
        </div>

        <div class="md:w-64">
            <select name="kategori" onchange="this.form.submit()" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none cursor-pointer">
                <option value="">Semua Kategori</option>
                <option value="Koperasi" <?= $kategori_filter == 'Koperasi' ? 'selected' : ''; ?>>Koperasi</option>
                <option value="UMKM" <?= $kategori_filter == 'UMKM' ? 'selected' : ''; ?>>UMKM</option>
                <option value="Kegiatan" <?= $kategori_filter == 'Kegiatan' ? 'selected' : ''; ?>>Kegiatan</option>
                <option value="Pengumuman" <?= $kategori_filter == 'Pengumuman' ? 'selected' : ''; ?>>Pengumuman</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-900 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-800 transition">
            Filter
        </button>
        
        <?php if(!empty($search) || !empty($kategori_filter)): ?>
            <a href="Berita.php" class="text-red-500 flex items-center text-sm font-medium hover:underline">
                Reset Filter
            </a>
        <?php endif; ?>
    </form>
</div>

        </div>
    </div>

    <div class="max-w-6xl mx-auto py-12 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
           <div class="max-w-6xl mx-auto py-12 px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <?php 
        // Pastikan menggunakan variabel $result sesuai dengan query di bagian atas
        while($data = mysqli_fetch_array($result)) : 
        ?>
        
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col border border-gray-100">
            <div class="relative overflow-hidden">
                <div class="absolute top-4 right-4 z-10">
                    <span class="bg-secondary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-md">
                        <?= $data['kategori'] ?? 'Umum'; ?>
                    </span>
                </div>
                
                <img src="uploads/<?= $data['gambar']; ?>" class="w-full h-56 object-cover transform hover:scale-105 transition-transform duration-500" alt="Thumbnail">
            </div>

            <div class="p-6 flex flex-col flex-1">
                <span class="text-xs font-bold text-indigo-500 uppercase tracking-widest mb-2">
                    <i class="far fa-calendar-alt mr-1"></i> <?php echo date('d M Y', strtotime($data['tanggal_posting'])); ?>
                </span>
                
                <h2 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 leading-snug">
                    <?php echo $data['judul']; ?>
                </h2>
                
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                    <?php echo strip_tags($data['isi_berita']); ?>
                </p>
                
                <div class="mt-auto">
                    <a href="Berita_detail.php?id=<?php echo $data['id']; ?>" 
                       class="inline-block bg-primary text-white font-semibold px-4 py-2 rounded-lg hover:bg-secondary transition w-full text-center">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>

        <?php if(mysqli_num_rows($result) == 0): ?>
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">Tidak ada berita yang ditemukan.</p>
            </div>
        <?php endif; ?>

    </div>
</div>
</body>
</html>