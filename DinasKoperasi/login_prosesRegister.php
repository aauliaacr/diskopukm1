<?php
// 1. Memulai session
session_start();

// 2. Memanggil file koneksi database
include 'koneksi.php';

// 3. Mengecek apakah tombol 'register' (Daftar Sekarang) sudah diklik
if (isset($_POST['register'])) {
    
    // 4. Menangkap data yang dikirim dari form pendaftaran
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // 5. Mengamankan input dari SQL Injection
    $user_secure  = mysqli_real_escape_string($koneksi, $username);
    $email_secure = mysqli_real_escape_string($koneksi, $email);
    $pass_secure  = mysqli_real_escape_string($koneksi, $password); // Catatan: Menyimpan password secara plain text (sesuai alur login sebelumnya)

    // 6. Mengecek apakah Username atau Email sudah pernah didaftarkan sebelumnya
    $cek_duplikat = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user_secure' OR email='$email_secure'");
    
    if (mysqli_num_rows($cek_duplikat) > 0) {
        // Jika data ditemukan (sudah ada yang pakai)
        echo "<script>
                alert('Pendaftaran Gagal! Username atau Email tersebut sudah terdaftar. Silakan gunakan yang lain.');
                window.location='login_register.php'; 
              </script>";
    } else {
        // 7. Jika belum ada, lakukan query INSERT untuk memasukkan data baru ke database
        // Asumsi tabel Anda bernama 'admin' dan memiliki kolom username, email, dan password
        $query_insert = "INSERT INTO admin (username, email, password) VALUES ('$user_secure', '$email_secure', '$pass_secure')";
        $insert = mysqli_query($koneksi, $query_insert);
        
        if ($insert) {
            // Jika berhasil disimpan ke database
            echo "<script>
                    alert('Pendaftaran Berhasil! Akun Anda telah dibuat. Silakan masuk (login).');
                    window.location='login.php'; // Sesuaikan dengan nama file halaman login Anda (misal index.php)
                  </script>";
        } else {
            // Jika gagal karena masalah database/koneksi
            echo "<script>
                    alert('Terjadi kesalahan sistem saat menyimpan data.');
                    window.location='login_register.php'; 
                  </script>";
        }
    }
} else {
    // 8. Tendang balik pengguna jika mereka mencoba mengakses URL prosesRegister.php secara langsung tanpa mengisi form
    header("location:login_register.php");
}
?>