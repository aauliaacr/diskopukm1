<?php
include 'koneksi.php';

// 1. Ambil ID dari URL (contoh: edit_berita.php?id=12)
if (!isset($_GET['id'])) {
    header("Location: Berita_kelola.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen p-4 md:p-8">

    <div class="max-w-4xl mx-auto">
        <a href="Berita_kelola.php" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 transition">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Manajemen Berita
        </a>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-blue-900 p-6">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-edit mr-3"></i> Edit Berita
                </h2>
                <p class="text-blue-100 text-sm opacity-80">Perbarui informasi berita pada portal Dinas Koperasi & UKM</p>
            </div>

            <form action="Berita_editProses.php" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                
                <input type="hidden" name="id" value="<?= $data['id']; ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Berita</label>
                <input type="text" name="judul" value="<?= $data['judul']; ?>" 
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition" 
                    placeholder="Masukkan judul berita..." required>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Berita</label>
                <select name="kategori" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="Pengumuman" <?= $data['kategori'] == 'Pengumuman' ? 'selected' : ''; ?>>Pengumuman</option>
                    <option value="Artikel" <?= $data['kategori'] == 'Artikel' ? 'selected' : ''; ?>>Artikel</option>
                    <option value="Berita" <?= $data['kategori'] == 'Berita' ? 'selected' : ''; ?>>Berita</option>
                    <option value="Siaran Pers" <?= $data['kategori'] == 'Siaran Pers' ? 'selected' : ''; ?>>Siaran Pers</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Status Publikasi</label>
                <select name="status" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="publish" <?= $data['status'] == 'publish' ? 'selected' : ''; ?>>Publish (Tampil di Web)</option>
                    <option value="draft" <?= $data['status'] == 'draft' ? 'selected' : ''; ?>>Draft (Sembunyikan)</option>
                </select>
            </div>

                    <div class="md:col-span-2 bg-blue-50 p-4 rounded-xl border border-blue-100">
                        <p class="text-xs font-bold text-blue-800 uppercase mb-3"><i class="fas fa-image mr-1"></i> Gambar Saat Ini</p>
                        <div class="flex items-start gap-4">
                            <img src="uploads/<?= $data['gambar']; ?>" class="w-48 h-32 object-cover rounded-lg shadow-md border-2 border-white" alt="Thumbnail">
                            <div class="text-xs text-gray-500">
                                <p class="font-mono"><?= $data['gambar']; ?></p>
                                <p class="mt-1">* Jika tidak ingin mengganti gambar, biarkan input file kosong.</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Konten Berita</label>
                        <textarea name="isi_berita" rows="12" 
                                  class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition" 
                                  placeholder="Tulis isi berita secara lengkap..." required><?= $data['isi_berita']; ?></textarea>
                    </div>
                </div>

                <div class="flex justify-end items-center gap-4 pt-6 border-t border-gray-100">
                    <button type="reset" class="text-gray-500 hover:text-gray-700 font-medium transition">
                        Reset Perubahan
                    </button>
                    <button type="submit" name="update" 
                            class="bg-blue-900 text-white px-10 py-3 rounded-xl font-bold hover:bg-blue-800 shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1">
                        <i class="fas fa-save mr-2"></i> Update Berita
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>