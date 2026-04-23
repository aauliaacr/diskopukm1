<?php
// Cek apakah session sudah dimulai agar tidak terjadi error
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Navbar -->
<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <!-- Logo (Arahkan ke beranda) -->
            <a href="beranda.php" class="flex items-center gap-3 cursor-pointer">
                <!-- Menggunakan kode warna langsung [#0f5b66] agar aman di semua halaman -->
                <div class="w-10 h-10 bg-[#0f5b66] rounded-lg flex items-center justify-center text-white">
                    <i data-lucide="building-2" class="w-6 h-6"></i>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-[#0f5b66] text-lg leading-tight tracking-wide">DINAS KOPERASI & UKM</span>
                    <span class="text-xs text-gray-500 font-medium tracking-wider">PEMERINTAH KOTA MAKASSAR</span>
                </div>
            </a>

           <!-- Menu Tengah -->
<div class="hidden lg:flex items-center space-x-8">
    <a href="index.php" class="text-gray-600 font-medium hover:text-[#0f5b66] transition-colors py-4">Beranda</a>
    
    <!-- Dropdown Profil -->
    <div class="relative group py-4">
        <button class="flex items-center gap-1 text-gray-600 font-medium hover:text-[#0f5b66] transition-colors focus:outline-none cursor-pointer">
            Profil
            <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"></i>
        </button>
        
        <!-- Isi Dropdown Profil -->
        <div class="absolute left-0 top-full w-56 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-2 group-hover:translate-y-0 transition-all duration-300 z-50 overflow-hidden">
            <div class="py-2">
                <a href="struktur_organisasi.php" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Struktur Organisasi</a>
                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Visi dan Misi</a>
                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Tugas Pokok & Fungsi</a>
            </div>
        </div>
    </div>

    <!-- Dropdown Layanan -->
    <div class="relative group py-4">
        <button class="flex items-center gap-1 text-gray-600 font-medium hover:text-[#0f5b66] transition-colors focus:outline-none cursor-pointer">
            Layanan
            <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"></i>
        </button>
        
        <!-- Isi Dropdown Profil -->
        <div class="absolute left-0 top-full w-56 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-2 group-hover:translate-y-0 transition-all duration-300 z-50 overflow-hidden">
            <div class="py-2">
                <a href="struktur_organisasi.php" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Struktur Organisasi</a>
                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Visi dan Misi</a>
                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Tugas Pokok & Fungsi</a>
            </div>
        </div>
    </div>
    
    <!-- Dropdown Inkubator -->
    <div class="relative group py-4">
        <button class="flex items-center gap-1 text-gray-600 font-medium hover:text-[#0f5b66] transition-colors focus:outline-none cursor-pointer">
            Inkubator
            <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"></i>
        </button>
        
        <!-- Isi Dropdown Inkubator -->
        <div class="absolute left-0 top-full w-56 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-2 group-hover:translate-y-0 transition-all duration-300 z-50 overflow-hidden">
            <div class="py-2">
                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Profil Inkubator</a>
                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Program Inkubasi</a>
                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Daftar Tenant</a>
                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#0f5b66] transition-colors">Form Pendaftaran</a>
            </div>
        </div>
    </div>

    <a href="#" class="text-gray-600 font-medium hover:text-[#0f5b66] transition-colors py-4">Kontak</a>
</div>

            <!-- Tombol Kanan (Dinamis berdasarkan Status Login) -->
            <div class="hidden md:flex items-center">
                <?php if(isset($_SESSION['status']) && $_SESSION['status'] == "login"): ?>
                    <!-- Jika sudah login, tampilkan tombol Dashboard & Logout -->
                    <a href="adminDashboard.php" class="px-4 py-2 bg-[#0f5b66] text-white rounded-lg text-sm font-semibold hover:bg-[#0a424a] transition-colors mr-2">Dashboard</a>
                    <a href="logout.php" class="px-4 py-2 border border-red-500 text-red-500 rounded-lg text-sm font-semibold hover:bg-red-50 transition-colors">Keluar</a>
                <?php else: ?>
                    <!-- Jika belum login, tampilkan tombol Login/Daftar -->
                    <a href="index.php" class="px-4 py-2 border border-[#0f5b66] text-[#0f5b66] rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors mr-2">Masuk</a>
                    <a href="register.php" class="px-4 py-2 bg-[#0f5b66] text-white rounded-lg text-sm font-semibold hover:bg-[#0a424a] transition-colors">Daftar</a>
                <?php endif; ?>
            </div>

            <!-- Tombol Menu Mobile -->
            <div class="lg:hidden flex items-center">
                <button class="text-gray-600 hover:text-[#0f5b66] focus:outline-none">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
            
        </div>
    </div>
</nav>