<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 1. Ambil nama file gambar lama agar bisa dihapus dari folder uploads
    $query_gambar = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id = '$id'");
    $data_gambar = mysqli_fetch_assoc($query_gambar);
    $nama_file_lama = $data_gambar['gambar'];

    // 2. Hapus file fisik dari folder jika ada
    if ($nama_file_lama != "" && file_exists("uploads/" . $nama_file_lama)) {
        unlink("uploads/" . $nama_file_lama);
    }

    // 3. Hapus data dari database
    $query_hapus = mysqli_query($koneksi, "DELETE FROM berita WHERE id = '$id'");

    if ($query_hapus) {
        echo "<script>alert('Berita berhasil dihapus!'); window.location='Berita_kelola.php';</script>";
    } else {
        echo "Gagal menghapus: " . mysqli_error($koneksi);
    }
}
?>