<?php
include 'koneksi.php';

// Ambil ID dari URL
if (!isset($_GET['id'])) {
    header("Location: Galeri_kelola.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM galeri WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("Data foto tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Edit Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-xl w-full bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-blue-600 p-6 text-white text-center">
            <h2 class="text-2xl font-bold">Edit Foto Galeri</h2>
        </div>

        <form action="Galeri_editProses.php" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul / Keterangan Foto</label>
                <input type="text" name="judul_foto" value="<?= $data['judul_foto']; ?>" 
                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Saat Ini</label>
                <div class="relative h-48 w-full rounded-lg overflow-hidden border">
                    <img src="uploads/galeri/<?= $data['nama_file']; ?>" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti File Foto (Kosongkan jika tidak diubah)</label>
                <input type="file" name="nama_file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="flex gap-4 pt-4">
                <a href="Galeri_kelola.php" class="flex-1 text-center py-3 border border-gray-300 rounded-lg font-semibold text-gray-600 hover:bg-gray-50 transition">Batal</a>
                <button type="submit" name="update" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 shadow-lg transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</body>
</html>