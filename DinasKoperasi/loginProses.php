<?php
// 1. Memulai session (Wajib ada di paling atas)
session_start();

// 2. Memanggil file koneksi yang tadi sudah diperbaiki port-nya
include 'koneksi.php';

// 3. Mengecek apakah tombol login sudah diklik
if (isset($_POST['login'])) {
    
    // 4. Menangkap data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 5. Melakukan query untuk mencari user di tabel admin
    // Gunakan mysqli_real_escape_string untuk keamanan dasar dari hacker
    $user_secure = mysqli_real_escape_string($koneksi, $username);
    $pass_secure = mysqli_real_escape_string($koneksi, $password);

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user_secure' AND password='$pass_secure'");
    
    // 6. Mengecek apakah data ditemukan
    if (mysqli_num_rows($query) > 0) {
        // Jika cocok, ambil data user tersebut
        $data = mysqli_fetch_assoc($query);

        // 7. Simpan data ke dalam session agar bisa digunakan di halaman lain
        $_SESSION['admin_id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama']     = $data['nama_lengkap'];
        $_SESSION['status']   = "login";

        // 8. Alihkan ke halaman dashboard admin
        header("location:adminDashboard.php");
    } else {
        // Jika tidak cocok, tampilkan pesan error dan kembali ke login
        echo "<script>
                alert('Login Gagal! Username atau Password salah.');
                window.location='index.php'; 
              </script>";
    }
} else {
    // Jika mencoba akses file ini tanpa klik tombol login, tendang balik
    header("location:index.php");
}
?>