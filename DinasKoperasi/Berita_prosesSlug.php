<?php
include 'koneksi.php';

if(isset($_POST['simpan'])) {
    $judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi_berita = mysqli_real_escape_string($koneksi, $_POST['isi_berita']);
    $status     = $_POST['status'];
    // 1. Ambil data kategori dari POST
    $kategori   = mysqli_real_escape_string($koneksi, $_POST['kategori']); 
    
    // Logika pembuatan SLUG (Judul ke URL-friendly)
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // Proses Gambar
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file  = $_FILES['gambar']['tmp_name'];
    
    if(!empty($nama_file)) {
        $ekstensi = pathinfo($nama_file, PATHINFO_EXTENSION);
        $nama_baru = time() . "." . $ekstensi;
        $path = "uploads/" . $nama_baru;
        move_uploaded_file($tmp_file, $path);
    } else {
        $nama_baru = "default.jpg"; // Disarankan ada default agar tampilan tidak pecah
    }

    // 2. Tambahkan kolom 'kategori' ke dalam Query INSERT
    $query = "INSERT INTO berita (judul, slug, kategori, isi_berita, gambar, status, tanggal_posting) 
              VALUES ('$judul', '$slug', '$kategori', '$isi_berita', '$nama_baru', '$status', NOW())";

    if(mysqli_query($koneksi, $query)) {
        echo "<script>alert('Berita Berhasil Disimpan!'); window.location='Berita_kelola.php';</script>";
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}
?>