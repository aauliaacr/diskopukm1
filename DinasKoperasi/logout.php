<?php
// 1. Mulai session agar sistem tahu session mana yang akan dihapus
session_start();

// 2. Hapus semua variabel session
$_SESSION = array();

// 3. Jika menggunakan cookie session, hapus juga cookie-nya
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Hancurkan session secara total di server
session_destroy();

// 5. Arahkan pengguna kembali ke halaman login atau beranda
header("location: index.php");
exit;
?>