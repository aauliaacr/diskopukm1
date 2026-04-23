<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'], }, colors: { brand: { 50: '#eff6ff', 100: '#dbeafe', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8', } } } }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-brand-50 to-brand-100 min-h-screen flex flex-col justify-center items-center p-4 font-sans text-gray-800 antialiased">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="px-8 pt-8 pb-6 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-brand-100 text-brand-600 mb-4">
                <i data-lucide="refresh-cw" class="w-8 h-8"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Reset Kata Sandi</h1>
            <p class="text-sm text-gray-500">Masukkan username Anda dan buat kata sandi yang baru.</p>
        </div>

        <div class="px-8 pb-8">
            <form action="login_prosesLupaPass.php" method="POST" class="space-y-5">
                
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <input type="text" id="username" name="username" required 
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm"
                            placeholder="Masukkan username Anda">
                    </div>
                </div>

                <div>
                    <label for="password_baru" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="h-5 w-5 text-gray-400"></i>
                        </div>
                        <!-- ID di sini adalah password_baru -->
                        <input type="password" id="password_baru" name="password_baru" required minlength="4"
                            class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 sm:text-sm"
                            placeholder="Buat sandi baru">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i data-lucide="eye" class="h-5 w-5"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" name="reset_password"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-brand-600 hover:bg-brand-700 mt-6">
                    Simpan Kata Sandi Baru
                </button>
            </form>
            
            <p class="mt-8 text-center text-sm text-gray-600">
                Batal reset? 
                <a href="index.php" class="font-semibold text-brand-600 hover:text-brand-500 hover:underline">
                    Kembali ke halaman masuk
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
        // PERBAIKAN: Ubah 'password' menjadi 'password_baru' sesuai dengan ID di input
        const passwordInput = document.getElementById('password_baru'); 

        togglePassword.addEventListener('click', function () {
            // Ubah tipe input antara text dan password
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // PERBAIKAN: Ganti elemen ikon secara langsung di dalam tombol
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