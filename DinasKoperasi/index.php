<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Koperasi dan UKM - Kota Makassar</title>
    
    <!-- Menggunakan Tailwind CSS via CDN untuk styling cepat -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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

    <style>
        /* Efek paralaks dan overlay untuk bagian Hero (Banner Utama) */
        .hero-bg {
            background-image: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)), url('https://images.unsplash.com/photo-1577083552431-6e5fd01988ec?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        html { scroll-behavior: smooth; }
        
        /* Transisi halus untuk menu mobile */
        #mobile-menu { transition: all 0.3s ease-in-out; }

        /* Gallery Styling */
        .gallery-swiper {
            padding-bottom: 50px !important;
        }
        .gallery-img {
            width: 100%;
            height: 300px;
            object-cover: cover;
            border-radius: 12px;
        }

        /* Navigation Arrows Styling */
        .swiper-button-next, .swiper-button-prev {
            color: #1e3a8a !important;
            background: white;
            width: 40px !important;
            height: 40px !important;
            border-radius: 50%;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 18px !important;
            font-weight: bold;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen">

    <!-- Topbar (Informasi Kontak Cepat) -->
    <div class="bg-primary text-white text-xs md:text-sm py-2 px-4 hidden md:block">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex space-x-6">
                <span><i class="fas fa-phone-alt mr-2"></i> (0411) 123456</span>
                <span><i class="fas fa-envelope mr-2"></i> info@diskopukm.makassarkota.go.id</span>
                <span><i class="fas fa-map-marker-alt mr-2"></i> Jl. Balaikota No. 11, Makassar</span>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-secondary transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-secondary transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-secondary transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-secondary transition"><i class="fab fa-youtube"></i></a>
                <a href="#" class="hover:text-secondary transition"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <!-- Gunakan gambar lokal Anda nanti, ini placeholder ikon -->
                <div class="bg-primary text-white p-2 rounded-full w-12 h-12 flex items-center justify-center shadow-lg">
                    <i class="fas fa-building text-2xl"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg md:text-xl text-primary leading-tight">DINAS KOPERASI & UKM</h1>
                    <p class="text-xs md:text-sm text-gray-500 font-medium">PEMERINTAH KOTA MAKASSAR</p>
                </div>
            </div>

            <!-- Desktop Menu -->
          <div class="hidden lg:flex space-x-8 font-medium text-gray-700">
            <a href="#" class="text-primary border-b-2 border-primary pb-1">Beranda</a>

            <div class="relative group">
                <button class="flex items-center hover:text-primary transition pb-1 focus:outline-none">
                    Profil <i class="fas fa-chevron-down ml-2 text-[10px] transition-transform group-hover:rotate-180"></i>
                </button>
                <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                    <a href="ProfilSelayangPandang.php" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary border-b border-gray-50">Selayang Pandang</a>
                    <a href="ProfilSelayangPandang.php" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary border-b border-gray-50">Visi & Misi</a>
                    <a href="ProfilStrukturOrganisasi.php" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">Struktur Organisasi</a>
                </div>
            </div>

            <div class="relative group">
                <button class="flex items-center hover:text-primary transition pb-1 focus:outline-none">
                    Layanan <i class="fas fa-chevron-down ml-2 text-[10px] transition-transform group-hover:rotate-180"></i>
                </button>
                <div class="absolute left-0 mt-2 w-56 bg-white border border-gray-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                    <a href="#layanan-umkm" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary border-b border-gray-50">Fasilitasi UMKM</a>
                    <a href="#layanan-koperasi" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary border-b border-gray-50">Legalitas Koperasi</a>
                    <a href="#oss-rba" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary border-b border-gray-50">Perizinan</a>
                    <a href="#pelatihan" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">Pelatihan & Sertifikasi</a>
                </div>
            </div>

            <div class="relative group">
                <button class="flex items-center hover:text-primary transition pb-1 focus:outline-none">
                    Inkubator <i class="fas fa-chevron-down ml-2 text-[10px] transition-transform group-hover:rotate-180"></i>
                </button>
                <div class="absolute left-0 mt-2 w-56 bg-white border border-gray-100 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                    <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary border-b border-gray-50">Inkubator Koperasi</a>
                    <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary border-b border-gray-50">Inkubator UMKM</a>
                    <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary border-b border-gray-50">Inkubator Start-Up</a>
                </div>
            </div>

            <a href="#kontak" class="hover:text-primary transition">Kontak</a>
        </div>

            <!-- Pencarian (Desktop) -->
            <div class="hidden lg:block relative">
                <input type="text" placeholder="Cari..." class="pl-4 pr-10 py-2 border rounded-full focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-sm">
                <i class="fas fa-search absolute right-3 top-2.5 text-gray-400"></i>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-2xl text-primary focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 absolute w-full shadow-lg">
            <div class="flex flex-col px-4 py-2 space-y-2 text-gray-700">
                <a href="#" class="block py-2 text-primary font-medium border-b border-gray-100">Beranda</a>
                <a href="#profil" class="block py-2 hover:text-primary border-b border-gray-100">Profil</a>
                <a href="#layanan" class="block py-2 hover:text-primary border-b border-gray-100">Layanan</a>
                <a href="#berita" class="block py-2 hover:text-primary border-b border-gray-100">Berita</a>
                <a href="#galeri" class="block py-2 hover:text-primary border-b border-gray-100">Galeri</a>
                <a href="#kontak" class="block py-2 hover:text-primary">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-bg h-[500px] md:h-[600px] flex items-center">
        <div class="swiper myHeroSwiper h-[500px] md:h-[600px] w-full">
    <div class="swiper-wrapper">
        
        <div class="swiper-slide relative bg-gray-800">
            <img src="assets/images/slider1.jpg" class="absolute inset-0 w-full h-full object-cover opacity-40">
            <div class="relative max-w-6xl mx-auto h-full flex flex-col justify-center px-6 text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-2">Dinas Koperasi dan UKM <br><span class="text-secondary">Kota Makassar</span></h1>
                <p class="max-w-2xl mb-8">Mewujudkan Koperasi yang tangguh dan UMKM yang berdaya saing global untuk Makassar Kota Dunia yang Sombere' dan Smart.</p>
                <div class="flex gap-4">
                    <a href="#" class="bg-primary px-6 py-3 rounded-lg font-semibold">Layanan Kami</a>
                    <a href="#berita" class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition">Berita Terbaru</a>
                </div>
            </div>
        </div>

        <div class="swiper-slide relative bg-gray-800">
            <img src="assets/images/slider2.jpg" class="absolute inset-0 w-full h-full object-cover opacity-40">
            <div class="relative max-w-6xl mx-auto h-full flex flex-col justify-center px-6 text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-2">Pemberdayaan <br><span class="text-secondary">UMKM Digital</span></h1>
                <p class="max-w-2xl mb-8">Mendorong pelaku usaha lokal untuk go-digital melalui pelatihan dan pendampingan intensif.</p>
                <div class="flex gap-4">
                    <a href="#" class="bg-primary px-6 py-3 rounded-lg font-semibold">Daftar Pelatihan</a>
                </div>
            </div>
        </div>

        <div class="swiper-slide relative bg-gray-800">
            <img src="assets/images/slider3.jpg" class="absolute inset-0 w-full h-full object-cover opacity-40">
            <div class="relative max-w-6xl mx-auto h-full flex flex-col justify-center px-6 text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-2">Inkubator <br><span class="text-secondary">Bisnis Kreatif</span></h1>
                <p class="max-w-2xl mb-8">Fasilitas bagi wirausaha muda untuk mengembangkan inovasi dan jaringan bisnis di Makassar.</p>
                <div class="flex gap-4">
                    <a href="#" class="bg-primary px-6 py-3 rounded-lg font-semibold">Selengkapnya</a>
                </div>
            </div>
        </div>

    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev !text-secondary"></div>
    <div class="swiper-button-next !text-secondary"></div>
</div>
    </header>

    <!-- Papan Pengumuman / Ticker (Opsional) -->
    <div class="bg-secondary text-primary py-2 overflow-hidden relative shadow-md z-10">
        <div class="whitespace-nowrap animate-[marquee_20s_linear_infinite] inline-block font-medium text-sm">
            <i class="fas fa-bullhorn mr-2"></i> <strong>Pengumuman:</strong> Pendaftaran Bantuan Modal Usaha bagi UMKM Lorong Wisata telah dibuka hingga akhir bulan ini. | <i class="fas fa-bullhorn mr-2"></i> Ayo daftarkan Koperasi Anda untuk mengikuti pelatihan digitalisasi keuangan! 
        </div>
    </div>

    <!-- Layanan Unggulan Section -->
    <section id="layanan" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary mb-3">Layanan Publik</h2>
                <div class="h-1 w-20 bg-secondary mx-auto rounded"></div>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Akses layanan utama Dinas Koperasi dan UKM Kota Makassar secara cepat dan mudah.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <a href="#" class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 group text-center block">
                    <div class="w-16 h-16 bg-blue-50 text-primary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition">
                        <i class="fas fa-store text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Pendataan UMKM</h3>
                    <p class="text-sm text-gray-500">Daftarkan usaha Anda ke dalam database sistem terpadu UMKM Kota Makassar.</p>
                </a>
                
                <!-- Card 2 -->
                <a href="#" class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 group text-center block">
                    <div class="w-16 h-16 bg-blue-50 text-primary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition">
                        <i class="fas fa-users-cog text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Bina Koperasi</h3>
                    <p class="text-sm text-gray-500">Layanan perizinan, pendirian, dan pelaporan Rapat Anggota Tahunan (RAT) Koperasi.</p>
                </a>

                <!-- Card 3 -->
                <a href="#" class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 group text-center block">
                    <div class="w-16 h-16 bg-blue-50 text-primary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition">
                        <i class="fas fa-chalkboard-teacher text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Pelatihan Bisnis</h3>
                    <p class="text-sm text-gray-500">Informasi jadwal dan pendaftaran pelatihan inkubator bisnis dan digital marketing.</p>
                </a>

                <!-- Card 4 -->
                <a href="#" class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 group text-center block">
                    <div class="w-16 h-16 bg-blue-50 text-primary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:text-white transition">
                        <i class="fas fa-hands-helping text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Klinik Konsultasi</h3>
                    <p class="text-sm text-gray-500">Layanan pengaduan, bantuan hukum, dan konsultasi legalitas usaha (NIB, Halal).</p>
                </a>
            </div>
        </div>
    </section>

        <!-- Statistik Section -->
    <section class="py-12 bg-primary text-white relative overflow-hidden">
        <!-- Background Pattern (Opsional) -->
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <i class="fas fa-building text-4xl text-secondary mb-3"></i>
                    <h3 class="text-4xl font-bold mb-1 counter" data-target="1254">0</h3>
                    <p class="text-blue-200 text-sm">Jumlah Koperasi Aktif</p>
                </div>
                <div>
                    <i class="fas fa-store-alt text-4xl text-secondary mb-3"></i>
                    <h3 class="text-4xl font-bold mb-1 counter" data-target="35800">0</h3>
                    <p class="text-blue-200 text-sm">Jumlah UMKM Binaan</p>
                </div>
                <div>
                    <i class="fas fa-certificate text-4xl text-secondary mb-3"></i>
                    <h3 class="text-4xl font-bold mb-1 counter" data-target="8500">0</h3>
                    <p class="text-blue-200 text-sm">Data KKMP</p>
                </div>
                <div>
                    <i class="fas fa-handshake text-4xl text-secondary mb-3"></i>
                    <h3 class="text-4xl font-bold mb-1 counter" data-target="120">0</h3>
                    <p class="text-blue-200 text-sm">Program & Pelatihan (2023)</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Profil / Sambutan Section -->
    <section id="profil" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-10">
                <div class="lg:w-1/3">
                    <!-- Placeholder Foto Kadis -->
                    <div class="relative">
                        <div class="absolute -inset-4 bg-secondary rounded-xl transform rotate-3 opacity-30"></div>
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Kepala Dinas" class="rounded-xl shadow-lg relative z-10 w-full object-cover h-[400px]">
                        <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur rounded-lg p-4 text-center z-20 shadow">
                            <h4 class="font-bold text-primary"> Munafri Arifuddin, S.H.</h4>
                            <p class="text-xs text-gray-600">Wali Kota Makassar</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-2/3">
                    <h4 class="text-secondary font-bold mb-2 uppercase tracking-wider">Sambutan</h4>
                    <h2 class="text-3xl font-bold text-primary mb-6">Mendorong Pertumbuhan Ekonomi Melalui UMKM Kuat</h2>
                    <p class="text-gray-600 mb-4 leading-relaxed text-justify">
                        Assalamu'alaikum Warahmatullahi Wabarakatuh.<br><br>
                        Selamat datang di Website Resmi Dinas Koperasi dan UKM Kota Makassar. Kami hadir sebagai bentuk komitmen Pemerintah Kota Makassar dalam memberikan pelayanan informasi yang transparan, cepat, dan akuntabel kepada masyarakat luas, khususnya bagi para pelaku Koperasi dan Usaha Mikro, Kecil, dan Menengah (UMKM).
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed text-justify">
                        Melalui portal digital ini, kami berharap para pelaku usaha dapat mengakses berbagai layanan seperti pendataan, fasilitasi perizinan, pelatihan, serta informasi program strategis seperti pengembangan Lorong Wisata (Longwis) secara lebih efisien. Mari bersama kita wujudkan UMKM Makassar yang berdaya saing global!
                    </p>
                    <a href="Strukturorganisasi.php" class="text-primary font-semibold hover:text-blue-800 flex items-center">
                        Baca Profil Lengkap <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="profil" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col-reverse lg:flex-row items-center gap-10">
            
            <div class="lg:w-2/3">
                <h4 class="text-secondary font-bold mb-2 uppercase tracking-wider">Sambutan</h4>
                <h2 class="text-3xl font-bold text-primary mb-6">Mendorong Pertumbuhan Ekonomi Melalui UMKM Kuat</h2>
                <p class="text-gray-600 mb-4 leading-relaxed text-justify">
                    Assalamu'alaikum Warahmatullahi Wabarakatuh.<br><br>
                    Selamat datang di Website Resmi Dinas Koperasi dan UKM Kota Makassar. Kami hadir sebagai bentuk komitmen Pemerintah Kota Makassar dalam memberikan pelayanan informasi yang transparan, cepat, dan akuntabel kepada masyarakat luas, khususnya bagi para pelaku Koperasi dan Usaha Mikro, Kecil, dan Menengah (UMKM).
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed text-justify">
                    Melalui portal digital ini, kami berharap para pelaku usaha dapat mengakses berbagai layanan seperti pendataan, fasilitasi perizinan, pelatihan, serta informasi program strategis seperti pengembangan Lorong Wisata (Longwis) secara lebih efisien. Mari bersama kita wujudkan UMKM Makassar yang berdaya saing global!
                </p>
                <a href="#" class="text-primary font-semibold hover:text-blue-800 flex items-center">
                    Baca Profil Lengkap <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="lg:w-1/3">
                <div class="relative">
                    <div class="absolute -inset-4 bg-secondary rounded-xl transform -rotate-3 opacity-30"></div>
                    <img src="images/kadis.jpeg" alt="Kepala Dinas" class="rounded-xl shadow-lg relative z-10 w-full object-cover h-[400px]">
                    <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur rounded-lg p-4 text-center z-20 shadow">
                        <h4 class="font-bold text-primary">Arlin Ariesta, S.STP, M.Si</h4>
                        <p class="text-xs text-gray-600">Kepala Dinas Koperasi & UKM Kota Makassar</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <!---Berita-->
   <section id="berita" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-3xl font-bold text-primary mb-3">Berita Terkini</h2>
                <div class="h-1 w-20 bg-secondary rounded"></div>
            </div>
            <a href="Berita.php" class="hidden md:inline-block text-primary font-medium hover:underline">
                Lihat Semua Berita <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div id="container-berita" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php 
            include 'koneksi.php';
            // Query tetap sama, pastikan kolom 'kategori' sudah ada di database
            $query = "SELECT * FROM berita WHERE status = 'publish' ORDER BY tanggal_posting DESC LIMIT 3";
            $result = mysqli_query($koneksi, $query);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) : ?>
                    
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300">
                        <div class="relative">
                            <div class="absolute top-4 right-4 z-10">
                                <span class="bg-secondary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-md">
                                    <?= $row['kategori'] ?? 'Umum'; ?>
                                </span>
                            </div>

                            <img src="uploads/<?php echo $row['gambar']; ?>" class="w-full h-48 object-cover" alt="<?php echo $row['judul']; ?>">
                            
                            <div class="absolute bottom-0 left-0 bg-primary/90 backdrop-blur-sm text-white text-[10px] px-3 py-1 rounded-tr-lg">
                                <?= date('d M Y', strtotime($row['tanggal_posting'])); ?>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
                                <?= $row['judul']; ?>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                <?= strip_tags($row['isi_berita']); ?>
                            </p>
                            <a href="Berita_detail.php?slug=<?= $row['slug']; ?>" class="text-primary font-bold inline-flex items-center hover:gap-2 transition-all group">
                                Baca Selengkapnya 
                                <i class="fas fa-chevron-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>

                <?php endwhile; 
            } else {
                echo '<p class="text-gray-500 col-span-3 text-center">Belum ada berita yang diterbitkan.</p>';
            }
            ?>
        </div>
        
        <div class="mt-8 text-center md:hidden">
            <a href="Berita.php" class="inline-block bg-primary text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-blue-800 transition">Lihat Semua Berita</a>
        </div>
    </div>
</section>

    <!---Galeri-->
    <section id="galeri" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            
            <div class="text-center mb-12">
                <h4 class="text-primary font-bold uppercase tracking-widest text-sm mb-2">Dokumentasi Kegiatan</h4>
                <h2 class="text-3xl font-bold text-secondary">Galeri Foto Dinas Koperasi & UKM</h2>
            </div>

            <div class="swiper gallery-swiper relative">
                <div class="swiper-wrapper">
                    <?php
                    include 'koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id DESC LIMIT 15");

                    if (mysqli_num_rows($query) > 0) {
                        while($g = mysqli_fetch_assoc($query)) : ?>
                            <div class="swiper-slide p-2">
                                <div class="w-full h-60 rounded-xl overflow-hidden shadow-md border bg-gray-100">
                                    <img src="uploads/galeri/<?php echo $g['nama_file']; ?>" 
                                        alt="<?php echo $g['judul_foto']; ?>" 
                                        class="w-full h-full object-cover"> </div>
                                <p class="text-xs text-center mt-2 text-gray-600 truncate"><?php echo $g['judul_foto']; ?></p>
                            </div>
                        <?php endwhile; 
                    }
                    ?>
                </div>
                <!--<div class="swiper-wrapper">
                    
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 1">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 2">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 3">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 4">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 5">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 6">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 7">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 8">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 9">
                    </div>

                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80" class="gallery-img" alt="Kegiatan 10">
                    </div>

                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <div class="swiper-pagination"></div> -->
            </div>

        </div>
     </section>


    <!---Kemitraan-->
    <section class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="container mx-auto px-4">
            <h3 class="text-center font-bold text-gray-400 uppercase tracking-widest text-xs mb-10">Didukung Oleh & Mitra Strategis</h3>
            
            <div class="swiper partner-swiper">
                <div class="swiper-wrapper items-center">
                    <div class="swiper-slide flex justify-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Logo_Kementerian_Koperasi_dan_UKM_Republik_Indonesia.png" class="h-14 object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-500" alt="Kemenkop">
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Coat_of_arms_of_South_Sulawesi.svg/1200px-Coat_of_arms_of_South_Sulawesi.svg.png" class="h-14 object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-500" alt="Sulsel">
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Makassar_Logo.svg" class="h-14 object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-500" alt="Makassar">
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <div class="flex items-center space-x-2 grayscale opacity-60 hover:grayscale-0 transition-all duration-500">
                            <i class="fas fa-university text-3xl text-blue-900"></i>
                            <span class="font-bold text-lg text-blue-900">BANK INDONESIA</span>
                        </div>
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <div class="flex items-center space-x-2 grayscale opacity-60 hover:grayscale-0 transition-all duration-500">
                            <i class="fas fa-shield-alt text-3xl text-gray-800"></i>
                            <span class="font-bold text-lg text-gray-800">OSS-RBA</span>
                        </div>
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <div class="flex items-center space-x-2 grayscale opacity-60 hover:grayscale-0 transition-all duration-500">
                            <i class="fas fa-landmark text-3xl text-red-700"></i>
                            <span class="font-bold text-lg text-red-700">PAJAK PRATAMA</span>
                        </div>
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <div class="flex items-center space-x-2 grayscale opacity-60 hover:grayscale-0 transition-all duration-500">
                            <i class="fas fa-handshake text-3xl text-green-700"></i>
                            <span class="font-bold text-lg text-green-700">KADIN</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-900 text-white pt-16 pb-8 mt-auto">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <!-- Info Dinas -->
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="bg-white text-primary p-2 rounded-full w-10 h-10 flex items-center justify-center">
                            <i class="fas fa-building text-xl"></i>
                        </div>
                        <h3 class="font-bold text-lg leading-tight">Dinas Koperasi & UKM<br><span class="text-sm font-normal text-gray-400">Kota Makassar</span></h3>
                    </div>
                    <p class="text-gray-400 text-sm mb-6 leading-relaxed">
                        Mewujudkan Koperasi yang tangguh dan UMKM yang berdaya saing global untuk Makassar Kota Dunia yang Sombere' dan Smart.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-secondary hover:text-primary transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-secondary hover:text-primary transition"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-secondary hover:text-primary transition"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Tautan Cepat -->
                <div>
                    <h3 class="text-lg font-bold mb-6 border-b border-gray-700 pb-2">Tautan Cepat</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-secondary transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Beranda</a></li>
                        <li><a href="#profil" class="hover:text-secondary transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Profil Dinas</a></li>
                        <li><a href="#layanan" class="hover:text-secondary transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Layanan Perizinan</a></li>
                        <li><a href="#" class="hover:text-secondary transition"><i class="fas fa-chevron-right text-xs mr-2"></i> PPID (Informasi Publik)</a></li>
                        <li><a href="#" class="hover:text-secondary transition"><i class="fas fa-chevron-right text-xs mr-2"></i> Pendaftaran UMKM</a></li>
                    </ul>
                </div>

                <!-- Link Terkait -->
                <div>
                    <h3 class="text-lg font-bold mb-6 border-b border-gray-700 pb-2">Link Terkait</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="https://makassarkota.go.id" target="_blank" class="hover:text-secondary transition"><i class="fas fa-external-link-alt text-xs mr-2"></i> Pemkot Makassar</a></li>
                        <li><a href="#" class="hover:text-secondary transition"><i class="fas fa-external-link-alt text-xs mr-2"></i> Kementerian Koperasi & UKM RI</a></li>
                        <li><a href="#" class="hover:text-secondary transition"><i class="fas fa-external-link-alt text-xs mr-2"></i> OSS (Perizinan Berusaha)</a></li>
                        <li><a href="#" class="hover:text-secondary transition"><i class="fas fa-external-link-alt text-xs mr-2"></i> e-Katalog LKPP</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div>
                    <h3 class="text-lg font-bold mb-6 border-b border-gray-700 pb-2">Hubungi Kami</h3>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-secondary"></i>
                            <span>Gedung Balaikota Makassar,<br>Jl. Jend. Ahmad Yani No. 2,<br>Kota Makassar, Sulawesi Selatan</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-secondary"></i>
                            <span>(0411) 123456 / 654321</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-secondary"></i>
                            <span>info@diskopukm.makassarkota.go.id</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-3 text-secondary"></i>
                            <span>Senin - Jumat: 08.00 - 16.00 WITA</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
                <p>&copy; 2024 Dinas Koperasi dan UKM Kota Makassar. Hak Cipta Dilindungi.</p>
                <p class="mt-2 md:mt-0">Dikelola oleh Tim IT Diskop UKM</p>
            </div>
        </div>
    </footer>

    <!-- CSS Animasi Kustom -->
    <style>
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>

    <!-- JavaScript Interaktif -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // 1. Script untuk Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // 2. Script untuk Animasi Counter (Angka Statistik)
        const counters = document.querySelectorAll('.counter');
        const speed = 200; // Semakin kecil angka, semakin cepat animasi

        // Gunakan IntersectionObserver agar animasi mulai saat bagian di-scroll ke viewport
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5 // Animasi mulai saat 50% elemen terlihat
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        
                        // Menghitung increment
                        const inc = target / speed;

                        // Cek jika count belum mencapai target
                        if (count < target) {
                            // Tambahkan count dan bulatkan ke atas
                            counter.innerText = Math.ceil(count + inc);
                            // Panggil fungsi secara rekursif setiap 1 milidetik
                            setTimeout(updateCount, 10);
                        } else {
                            // Pastikan hasil akhir sama persis dengan target
                            counter.innerText = target;
                        }
                    };
                    
                    updateCount();
                    // Stop observing setelah animasi jalan (supaya tidak berulang)
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            observer.observe(counter);
        });

        //js untuk swiper
        document.addEventListener('DOMContentLoaded', function () {
            
            // 1. Inisialisasi Slider Galeri
            const gallerySwiper = new Swiper(".gallery-swiper", {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 }
                }
            });

            // 2. Inisialisasi Slider Kemitraan
            const partnerSwiper = new Swiper(".partner-swiper", {
                slidesPerView: 2,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: { slidesPerView: 3 },
                    768: { slidesPerView: 4 },
                    1024: { slidesPerView: 5 }
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // ... (Kode slider Swiper dan Counter yang sudah ada di index.html kamu tetap di sini) ...
    </script>

    <script>
    const swiper = new Swiper('.myHeroSwiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade', // Opsional: efek transisi halus
        fadeEffect: {
            crossFade: true
        },
    });
</script>

</body>
</html>