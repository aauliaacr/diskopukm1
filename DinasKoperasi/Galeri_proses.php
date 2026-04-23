<?php
include 'koneksi.php';

if (isset($_POST['upload'])) {
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file  = $_FILES['gambar']['tmp_name'];
    $ukuran    = $_FILES['gambar']['size'];
    
    // Ambil ekstensi file
    $ekstensi = pathinfo($nama_file, PATHINFO_EXTENSION);
    $ekstensi_boleh = array('jpg', 'jpeg', 'png', 'webp');

}

    // Cek apakah yang diupload benar-benar gambar
    if (in_array(strtolower($ekstensi), $ekstensi_boleh)) {
        // Beri nama unik: GLR_waktu_angka_acak.ekstensi
        $nama_baru = "GLR_" . time() . "_" . rand(10, 99) . "." . $ekstensi;
        $folder = "uploads/galeri/";

        // Buat folder jika belum ada
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        // Pindahkan file ke folder
        if (move_uploaded_file($tmp_file, $folder . $nama_baru)) {
    // Sesuaikan nama kolom: judul_foto dan nama_file
    $judul = $_POST['judul_foto'] ?? 'Tanpa Judul';
    $query = "INSERT INTO galeri (judul_foto, nama_file) VALUES ('$judul', '$nama_baru')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Foto berhasil ditambahkan!'); window.location='Galeri_kelola.php';</script>";
    }
    }
}
?>