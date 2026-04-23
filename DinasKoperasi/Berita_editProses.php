<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    // 1. Tangkap data dari form edit_berita.php
    $id         = $_POST['id'];
    $judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi_berita = mysqli_real_escape_string($koneksi, $_POST['isi_berita']);
    $kategori = $_POST['kategori']; // Amkap data kategori
    $status     = $_POST['status'];
    
    // 2. Buat Slug baru (agar URL tetap relevan jika judul berubah)
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // 3. Cek apakah ada file gambar baru yang diunggah
    if ($_FILES['gambar']['name'] != "") {
        
        // --- PROSES GANTI GAMBAR ---
        
        // A. Ambil nama gambar lama dari database untuk dihapus dari folder
        $query_lama = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id = '$id'");
        $data_lama  = mysqli_fetch_assoc($query_lama);
        
        if ($data_lama['gambar'] != "" && file_exists("uploads/" . $data_lama['gambar'])) {
            unlink("uploads/" . $data_lama['gambar']); // Menghapus file fisik lama
        }

        // B. Olah gambar baru
        $nama_file = $_FILES['gambar']['name'];
        $tmp_file  = $_FILES['gambar']['tmp_name'];
        
        // Beri nama unik agar tidak bentrok (timestamp + nama asli)
        $nama_baru = time() . "_" . str_replace(' ', '_', $nama_file);
        
        // Pindahkan ke folder uploads
        move_uploaded_file($tmp_file, "uploads/" . $nama_baru);

        // C. Query Update dengan kolom gambar baru
        $query = "UPDATE berita SET 
                    judul        = '$judul', 
                    slug         = '$slug',
                    kategori     = '$kategori', 
                    isi_berita   = '$isi_berita', 
                    gambar       = '$nama_baru', 
                    status       = '$status' 
                  WHERE id = '$id'";
    } else {
        // --- PROSES TANPA GANTI GAMBAR ---
        
        // Query Update harus tetap menyertakan kategori agar data tersimpan
        $query = "UPDATE berita SET 
                    judul        = '$judul', 
                    slug         = '$slug', 
                    kategori     = '$kategori', 
                    isi_berita   = '$isi_berita', 
                    status       = '$status' 
                  WHERE id = '$id'";
    }

    // 4. Eksekusi Query
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Berita berhasil diperbarui!'); 
                window.location='Berita_kelola.php';
              </script>";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
} else {
    // Jika mencoba akses langsung tanpa submit form
    header("Location: Berita_kelola.php");
}
?>