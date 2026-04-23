<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <!-- Tailwind CSS untuk styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons untuk ikon -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar untuk tampilan lebih rapi */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-gradient-to-br from-brand-50 to-brand-100 min-h-screen flex flex-col justify-center items-center p-4 font-sans text-gray-800 antialiased">

    <!-- Container Utama -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 transform hover:shadow-2xl mt-8 mb-8">
        
        <!-- Bagian Header Card -->
        <div class="px-8 pt-8 pb-6 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-brand-100 text-brand-600 mb-4">
                <i data-lucide="user-plus" class="w-8 h-8"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Buat Akun Baru</h1>
            <p class="text-sm text-gray-500">Lengkapi data di bawah ini untuk mendaftar.</p>
        </div>

        <!-- Form Register Terhubung dengan prosesRegister.php -->
        <div class="px-8 pb-8">
            <form action="login_prosesRegister.php" method="POST" class="space-y-5">
                
                <!-- Input Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="text" id="username" name="username" required minlength="3"
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors"
                            placeholder="Pilih username unik">
                    </div>
                </div>

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" required 
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors"
                            placeholder="nama@email.com">
                    </div>
                </div>

                <!-- Input Kata Sandi -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" required minlength="6"
                            class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors"
                            placeholder="Minimal 6 karakter">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i data-lucide="eye" class="h-5 w-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Persetujuan S&K -->
                <div class="flex items-start mt-4">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" required
                            class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-gray-300 rounded cursor-pointer">
                    </div>
                    <div class="ml-2 text-sm">
                        <label for="terms" class="font-medium text-gray-700 cursor-pointer">
                            Saya menyetujui <a href="#" class="text-brand-600 hover:text-brand-500 hover:underline">Syarat & Ketentuan</a>
                        </label>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" name="register"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-colors mt-6">
                    Daftar Sekarang
                </button>
            </form>

            <!-- Link Kembali ke Login -->
            <p class="mt-8 text-center text-sm text-gray-600">
                Sudah punya akun? 
                <a href="index.php" class="font-semibold text-brand-600 hover:text-brand-500 hover:underline transition-all">
                    Masuk di sini
                </a>
            </p>
        </div>
    </div>

    <!-- Script Fungsionalitas -->
    <script>
        // Inisialisasi Ikon Lucide
        lucide.createIcons();

        // Logika Toggle Visibilitas Kata Sandi
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            // Ubah tipe input antara text dan password
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Ganti elemen ikon secara langsung di dalam tombol
            if (type === 'text') {
                this.innerHTML = '<i data-lucide="eye-off" class="h-5 w-5"></i>';
            } else {
                this.innerHTML = '<i data-lucide="eye" class="h-5 w-5"></i>';
            }
            
            // Render ulang ikon yang baru disisipkan
            lucide.createIcons();
        });
    </script>
</body>
</html>