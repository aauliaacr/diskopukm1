<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Buat Berita Baru</h2>
        <form action="berita_prosesSlug.php" method="POST" enctype="multipart/form-data">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block font-semibold">Judul Berita</label>
                    <input type="text" name="judul" class="w-full border p-2 rounded focus:outline-blue-500" placeholder="Masukkan judul..." required>
                </div>
                
                <div>
                    <label class="block font-semibold">Isi Berita</label>
                    <textarea name="isi_berita" rows="6" class="w-full border p-2 rounded focus:outline-blue-500" placeholder="Tulis konten berita di sini..." required></textarea>
                </div>

               <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block font-semibold">Kategori</label>
                <select name="kategori" class="w-full border p-2 rounded focus:outline-blue-500" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Berita">Berita</option>
                    <option value="Artikel">Artikel</option>
                    <option value="Siaran Pers">Siaran Pers</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold">Status Publikasi</label>
                <select name="status" class="w-full border p-2 rounded focus:outline-blue-500">
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold">Gambar Utama</label>
                <input type="file" name="gambar" class="w-full border p-1 rounded border-gray-300">
            </div>
</div>

                <div class="flex justify-end gap-3 mt-4">
                    <a href="Berita_kelola.php" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Batal</a>
                    <button type="submit" name="simpan" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan ke Database</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>