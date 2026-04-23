<?php
// 1. Memulai session
session_start();

// 2. Memanggil file koneksi
include 'koneksi.php';

// 3. Mengecek apakah tombol reset_password sudah diklik
if (isset($_POST['reset_password'])) {
    
    // 4. Menangkap data dari form
    $username = $_POST['username'];
    $password_baru = $_POST['password_baru'];

    // 5. Mengamankan input dari SQL Injection
    $user_secure = mysqli_real_escape_string($koneksi, $username);
    $pass_secure = mysqli_real_escape_string($koneksi, $password_baru);

    // 6. Cek apakah username tersebut ada di database
    $cek_user = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user_secure'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        
        // 7. Jika username ditemukan, langsung UPDATE password di database
        $update = mysqli_query($koneksi, "UPDATE admin SET password='$pass_secure' WHERE username='$user_secure'");
        
        if ($update) {
            // Jika berhasil update
            echo "<script>
                    alert('Kata sandi berhasil diubah! Silakan login dengan kata sandi baru Anda.');
                    window.location='index.php'; // Arahkan kembali ke halaman login
                  </script>";
        } else {
            // Jika gagal update karena error database
            echo "<script>
                    alert('Terjadi kesalahan pada sistem database.');
                    window.location='lupa_password.html';
                  </script>";
        }
    } else {
        // Jika username tidak ditemukan di database
        echo "<script>
                alert('Gagal! Username tidak ditemukan.');
                window.location='lupa_password.html'; 
              </script>";
    }
} else {
    // Tendang balik jika mencoba akses file ini secara langsung melalui URL
    header("location:lupa_password.html");
}
?>