<?php
session_start();
include 'koneksi.php';

// Pastikan hanya admin yang sudah login yang bisa mengakses halaman ini
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='index.php';</script>";
    exit;
}

// Mengambil jumlah data untuk Ringkasan Dashboard (Gunakan @ agar tidak error jika tabel belum ada)
$jml_berita = @mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM berita"));
$jml_galeri = @mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM galeri"));
$jml_admin  = @mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM admin"));

// Fallback jika query gagal (misal tabel belum dibuat)
$jml_berita = $jml_berita ? $jml_berita : 0;
$jml_galeri = $jml_galeri ? $jml_galeri : 0;
$jml_admin  = $jml_admin ? $jml_admin : 0;

// Nama Admin
$nama_admin = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Admin';
$inisial = strtoupper(substr($nama_admin, 0, 1));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Dinas Koperasi & UKM</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar Sederhana Admin (Sudah Diseragamkan) -->
    <aside class="w-64 bg-[#0f5b66] text-white flex flex-col fixed h-full z-10 shadow-lg">
        <div class="p-6 border-b border-[#0a424a] flex items-center gap-3">
            <div class="bg-white p-2 rounded-lg">
                <i data-lucide="building-2" class="w-6 h-6 text-[#0f5b66]"></i>
            </div>
            <div class="flex flex-col">
                <h2 class="text-lg font-bold leading-tight">Admin Panel</h2>
                <span class="text-[10px] text-gray-300 tracking-wider">DINAS KOPERASI & UKM</span>
            </div>
        </div>
        <nav class="flex-grow p-4 space-y-2">
            <!-- Menu Dashboard Aktif -->
            <a href="adminDashboard.php" class="flex items-center gap-3 p-3 rounded bg-[#0a424a] font-semibold transition-colors">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard Utama
            </a>
            <a href="Berita_kelola.php" class="flex items-center gap-3 p-3 rounded hover:bg-[#0a424a] transition-colors">
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
        <header class="mb-8 flex flex-col md:flex-row md:justify-between md:items-end gap-4 border-b border-gray-200 pb-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Ringkasan Data</h1>
            </div>
            <div class="flex items-center gap-3 text-sm text-gray-500 font-medium">
                <span>Halo, <?= $nama_admin; ?>!</span>
                <div class="w-8 h-8 rounded-full bg-indigo-500 text-white flex items-center justify-center font-bold shadow-sm">
                    <?= $inisial; ?>
                </div>
            </div>
        </header>

        <!-- Kartu Ringkasan (Stats Cards) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            <!-- Kartu Total Berita -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 border-l-4 border-l-blue-500 relative overflow-hidden group hover:shadow-md transition-all">
                <p class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-1">Total Berita</p>
                <h3 class="text-3xl font-bold text-gray-800"><?= $jml_berita; ?></h3>
                <i data-lucide="file-text" class="w-12 h-12 text-gray-100 absolute -right-2 -bottom-2 transform group-hover:scale-110 transition-transform"></i>
            </div>

            <!-- Kartu Galeri Foto -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 border-l-4 border-l-green-500 relative overflow-hidden group hover:shadow-md transition-all">
                <p class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-1">Galeri Foto</p>
                <h3 class="text-3xl font-bold text-gray-800"><?= $jml_galeri; ?></h3>
                <i data-lucide="camera" class="w-12 h-12 text-gray-100 absolute -right-2 -bottom-2 transform group-hover:scale-110 transition-transform"></i>
            </div>

            <!-- Kartu Admin Aktif -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 border-l-4 border-l-purple-500 relative overflow-hidden group hover:shadow-md transition-all">
                <p class="text-xs font-bold text-gray-400 tracking-widest uppercase mb-1">Admin Aktif</p>
                <h3 class="text-3xl font-bold text-gray-800"><?= $jml_admin; ?></h3>
                <i data-lucide="users" class="w-12 h-12 text-gray-100 absolute -right-2 -bottom-2 transform group-hover:scale-110 transition-transform"></i>
            </div>

        </div>

        <!-- Banner Selamat Datang -->
        <div class="bg-[#0f5b66] text-white rounded-xl shadow-md overflow-hidden relative">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-5"></div>
            <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-40 h-40 rounded-full bg-white opacity-5"></div>
            
            <div class="p-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="max-w-xl">
                    <h2 class="text-2xl font-bold mb-2 flex items-center gap-2">
                        Selamat Datang di Panel Kendali <i data-lucide="sparkles" class="w-6 h-6 text-yellow-300"></i>
                    </h2>
                    <p class="text-[#b2d1d6] leading-relaxed text-sm md:text-base">
                        Di sini kamu bisa mengelola konten website Dinas Koperasi & UKM dengan mudah. Gunakan menu navigasi di samping kiri untuk mulai bekerja: menambah berita, mengatur galeri, hingga mengelola struktur organisasi.
                    </p>
                </div>
                
                <div class="bg-[#0a424a] bg-opacity-50 p-4 rounded-lg border border-[#1a6e7a] text-center shrink-0 w-full md:w-auto">
                    <p class="text-xs text-[#b2d1d6] uppercase tracking-wider mb-1">Status Server</p>
                    <div class="flex items-center justify-center gap-2 font-semibold">
                        <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                        MySQL Connected
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Script Inisialisasi Ikon -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>