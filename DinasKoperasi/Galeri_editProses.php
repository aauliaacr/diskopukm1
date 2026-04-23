<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $judul_foto = mysqli_real_escape_string($koneksi, $_POST['judul_foto']);
    
    // Cek apakah ada upload file baru
    if ($_FILES['nama_file']['name'] != "") {
        
        // 1. Ambil nama file lama untuk dihapus dari folder
        $q = mysqli_query($koneksi, "SELECT nama_file FROM galeri WHERE id = '$id'");
        $dt = mysqli_fetch_assoc($q);
        
        if ($dt['nama_file'] != "" && file_exists("uploads/galeri/" . $dt['nama_file'])) {
            unlink("uploads/galeri/" . $dt['nama_file']); // Hapus foto lama
        }

        // 2. Olah file baru
        $nama_asli = $_FILES['nama_file']['name'];
        $tmp_file  = $_FILES['nama_file']['tmp_name'];
        $ekstensi  = pathinfo($nama_asli, PATHINFO_EXTENSION);
        $nama_baru = "GLR_" . time() . "." . $ekstensi;

        move_uploaded_file($tmp_file, "uploads/galeri/" . $nama_baru);

        // Update database dengan gambar baru
        $query = "UPDATE galeri SET judul_foto = '$judul_foto', nama_file = '$nama_baru' WHERE id = '$id'";
    } else {
        // Update database hanya judul saja
        $query = "UPDATE galeri SET judul_foto = '$judul_foto' WHERE id = '$id'";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Galeri berhasil diperbarui!'); window.location='Galeri_kelola.php';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
?>