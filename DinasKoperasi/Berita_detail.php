<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Jika berita tidak ditemukan
if (!$data) {
    header("location:Berita.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['judul']; ?> - Portal Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

    <article class="max-w-4xl mx-auto py-16 px-6">
        <a href="Berita.php" class="text-indigo-600 font-medium hover:underline mb-8 inline-block">
            &larr; Kembali ke Daftar Berita
        </a>

        <h1 class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight">
            <?php echo $data['judul']; ?>
        </h1>
        
        <div class="text-gray-400 text-sm mb-8 pb-8 border-b">
            Diposting pada <?php echo date('d F Y', strtotime($data['tanggal_posting'])); ?> oleh Admin
        </div>

        <img src="uploads/<?php echo $data['gambar']; ?>" class="w-full rounded-2xl mb-10 shadow-lg" alt="Cover Berita">

        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
            <?php echo nl2br($data['isi_berita']); ?>
        </div>
    </article>

</body>
</html>