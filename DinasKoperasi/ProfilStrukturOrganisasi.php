<?php
// 1. Panggil koneksi database
include 'koneksi.php';

// Pastikan koneksi berhasil (opsional, untuk debugging awal)
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - Dinas Koperasi & UKM Makassar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            dark: '#0f5b66', 
                            accent: '#a3b18a', 
                            bgShape: '#e3ebd3', 
                            hover: '#0a424a',
                            light: '#f8faf9',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans text-gray-700 antialiased min-h-screen flex flex-col">

    <!-- Memanggil Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Header Halaman -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="text-center">
                <h4 class="text-brand-accent font-bold tracking-widest text-sm uppercase mb-2">Profil Dinas</h4>
                <h1 class="text-3xl font-bold text-brand-dark sm:text-4xl">Struktur Organisasi</h1>
                <p class="mt-3 text-lg text-gray-500 sm:mt-4 max-w-2xl mx-auto">
                    Susunan kepengurusan dan pimpinan Dinas Koperasi dan Usaha Kecil Menengah Kota Makassar.
                </p>
            </div>
        </div>
    </div>

    <!-- Container Daftar Pejabat (Grid Foto Dinamis) -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex-grow w-full">
        
        <!-- ================= BAGIAN PIMPINAN ================= -->
        <div class="mb-20">
            <h2 class="text-2xl font-bold text-center text-brand-dark mb-10 flex items-center justify-center">
                <span class="w-12 h-1 bg-brand-accent rounded-full mr-4"></span>
                Unsur Pimpinan
                <span class="w-12 h-1 bg-brand-accent rounded-full ml-4"></span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-4xl mx-auto">
                
                <?php
                // Query untuk mengambil data yang kategorinya 'pimpinan'
                $query_pimpinan = mysqli_query($koneksi, "SELECT * FROM struktur_org WHERE kategori='pimpinan' ORDER BY id ASC");
                
                // Cek apakah ada data pimpinan
                if (mysqli_num_rows($query_pimpinan) > 0) {
                    // Looping data pimpinan
                    while ($pimpinan = mysqli_fetch_assoc($query_pimpinan)):
                ?>
                <!-- Card Pimpinan Dinamis -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1 group">
                    <div class="overflow-hidden h-[340px] relative bg-brand-bgShape flex justify-center pt-6">
                        <!-- Menampilkan foto dari folder uploads -->
                        <!-- Fallback ke placeholder jika foto kosong di database -->
                        <?php 
                        $foto_url = !empty($pimpinan['foto']) ? "uploads/" . $pimpinan['foto'] : "https://via.placeholder.com/400x500.png?text=Belum+Ada+Foto"; 
                        ?>
                        <img src="<?= $foto_url ?>" alt="<?= $pimpinan['nama']; ?>" 
                             class="w-11/12 h-full object-cover object-top rounded-t-xl shadow-md group-hover:scale-[1.02] transition-transform duration-500">
                    </div>
                    <div class="p-6 text-center relative bg-white">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-brand-dark text-white p-3 rounded-full shadow-lg">
                            <i data-lucide="star" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-dark mt-4"><?= $pimpinan['nama']; ?></h3>
                        <p class="text-brand-accent font-semibold mt-1"><?= $pimpinan['jabatan']; ?></p>
                    </div>
                </div>
                <?php 
                    endwhile; 
                } else {
                    // Tampilan jika data kosong
                    echo "<div class='col-span-1 md:col-span-2 text-center text-gray-500 p-8 border border-dashed border-gray-300 rounded-xl'>Data Unsur Pimpinan belum ditambahkan.</div>";
                }
                ?>

            </div>
        </div>

        <!-- ================= BAGIAN KEPALA BIDANG & UPTD ================= -->
        <div>
            <h2 class="text-2xl font-bold text-center text-brand-dark mb-10 flex items-center justify-center">
                <span class="w-12 h-1 bg-gray-300 rounded-full mr-4"></span>
                Kepala Bidang & UPTD
                <span class="w-12 h-1 bg-gray-300 rounded-full ml-4"></span>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <?php
                // Query untuk mengambil data yang kategorinya 'kabid' ATAU 'uptd'
                $query_bidang = mysqli_query($koneksi, "SELECT * FROM struktur_org WHERE kategori IN ('kabid', 'uptd') ORDER BY id ASC");
                
                // Cek apakah ada data bidang/uptd
                if (mysqli_num_rows($query_bidang) > 0) {
                    // Looping data
                    while ($bidang = mysqli_fetch_assoc($query_bidang)):
                ?>
                <!-- Card Bidang Dinamis -->
                <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden transition-all hover:shadow-lg group">
                    <div class="overflow-hidden h-60 relative bg-gray-100">
                        <?php 
                        $foto_bidang_url = !empty($bidang['foto']) ? "uploads/" . $bidang['foto'] : "https://via.placeholder.com/300x400.png?text=Belum+Ada+Foto"; 
                        ?>
                        <img src="<?= $foto_bidang_url ?>" alt="<?= $bidang['nama']; ?>" 
                             class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 text-center flex flex-col justify-between h-[120px]">
                        <h3 class="text-lg font-bold text-brand-dark leading-tight line-clamp-2"><?= $bidang['nama']; ?></h3>
                        <p class="text-sm text-gray-500 mt-2 font-medium">
                            <?php 
                            // Memberi label (badge) tambahan jika dia adalah UPTD
                            if ($bidang['kategori'] == 'uptd') {
                                echo '<span class="inline-block bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs mb-1">UPTD</span><br>';
                            }
                            ?>
                            <?= $bidang['jabatan']; ?>
                        </p>
                    </div>
                </div>
                <?php 
                    endwhile; 
                } else {
                     // Tampilan jika data kosong
                     echo "<div class='col-span-1 sm:col-span-2 lg:col-span-4 text-center text-gray-500 p-8 border border-dashed border-gray-300 rounded-xl'>Data Kepala Bidang atau UPTD belum ditambahkan.</div>";
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