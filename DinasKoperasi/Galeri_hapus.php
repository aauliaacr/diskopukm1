<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama file untuk dihapus dari folder
$query_cari = mysqli_query($koneksi, "SELECT nama_file FROM galeri WHERE id = '$id'");
$data = mysqli_fetch_assoc($query_cari);

if ($data) {
    $file_fisik = $data['nama_file']; // Sesuaikan kolom database
    if (file_exists("uploads/galeri/" . $file_fisik)) {
        unlink("uploads/galeri/" . $file_fisik);
    }
    
    mysqli_query($koneksi, "DELETE FROM galeri WHERE id = '$id'");
    header("Location: Galeri_kelola.php");
    }
}
?>