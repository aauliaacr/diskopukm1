<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Akun Anda</title>
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
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 transform hover:shadow-2xl">
        
        <!-- Bagian Header Card -->
        <div class="px-8 pt-8 pb-6 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-brand-100 text-brand-600 mb-4">
                <i data-lucide="shield-check" class="w-8 h-8"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang Kembali</h1>
            <p class="text-sm text-gray-500">Silakan masukkan detail akun Anda untuk masuk.</p>
        </div>

        <!-- Form Login Terhubung dengan prosesLogin.php -->
        <div class="px-8 pb-8">
            <form action="loginProses.php" method="POST" class="space-y-5">
                
                <!-- Input Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="text" id="username" name="username" required 
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors"
                            placeholder="Masukkan username Anda">
                    </div>
                </div>

                <!-- Input Kata Sandi -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" required 
                            class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm transition-colors"
                            placeholder="••••••••">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i data-lucide="eye" id="eyeIcon" class="h-5 w-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Opsi Tambahan -->
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" 
                            class="h-4 w-4 text-brand-600 focus:ring-brand-500 border-gray-300 rounded cursor-pointer">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                            Ingat saya
                        </label>
                    </div>
                    <div class="text-sm">
                        <a href="login_LupaPass.php" class="font-medium text-brand-600 hover:text-brand-500 transition-colors">
                            Lupa kata sandi?
                        </a>
                    </div>
                </div>

                <!-- Tombol Submit (name="login" agar sesuai dengan isset di PHP) -->
                <button type="submit" name="login"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-colors mt-6">
                    Masuk
                </button>
            </form>

            <!-- Garis Pemisah -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Atau masuk dengan</span>
                    </div>
                </div>

            <!-- Link Daftar -->
            <p class="mt-8 text-center text-sm text-gray-600">
                Belum punya akun? 
                <!-- Anda bisa arahkan href ini ke halaman register.php nantinya -->
                <a href="login_register.php" class="font-semibold text-brand-600 hover:text-brand-500 hover:underline transition-all">
                    Daftar sekarang
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
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            // Ubah tipe input antara text dan password
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Ubah ikon
            if (type === 'text') {
                eyeIcon.setAttribute('data-lucide', 'eye-off');
            } else {
                eyeIcon.setAttribute('data-lucide', 'eye');
            }
            // Re-render ikon yang baru diubah
            lucide.createIcons();
        });
    </script>
</body>
</html>