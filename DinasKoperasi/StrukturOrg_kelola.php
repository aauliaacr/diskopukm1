<?php
session_start();
// Panggil file koneksi database
include 'koneksi.php';

// Pastikan hanya admin yang sudah login yang bisa mengakses halaman ini
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='index.php';</script>";
    exit;
}

// ==========================================
// PROSES TAMBAH DATA & UPLOAD FOTO
// ==========================================
if (isset($_POST['tambah'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $kategori = $_POST['kategori'];

    // Info File Foto
    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    
    // Ekstensi yang diperbolehkan
    $ext_valid = array('png', 'jpg', 'jpeg');
    $ext = explode('.', $nama_file);
    $ext = strtolower(end($ext));

    if (in_array($ext, $ext_valid)) {
        if ($ukuran_file <= 2000000) { // Maksimal ukuran 2MB
            // Buat nama file unik agar tidak bentrok jika namanya sama
            $nama_file_baru = uniqid() . '.' . $ext;
            
            // Pindahkan file ke folder 'uploads/' (Pastikan folder ini sudah Anda buat)
            move_uploaded_file($tmp_file, 'uploads/' . $nama_file_baru);

            // Simpan data ke database
            $query = "INSERT INTO struktur_org (nama, jabatan, kategori, foto) VALUES ('$nama', '$jabatan', '$kategori', '$nama_file_baru')";
            if (mysqli_query($koneksi, $query)) {
                echo "<script>alert('Data pejabat berhasil ditambahkan!'); window.location='admin_struktur.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan ke database!');</script>";
            }
        } else {
            echo "<script>alert('Ukuran foto terlalu besar! Maksimal 2MB.');</script>";
        }
    } else {
        echo "<script>alert('Ekstensi file tidak valid! Gunakan format JPG, JPEG, atau PNG.');</script>";
    }
}

// ==========================================
// PROSES EDIT DATA
// ==========================================
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $kategori = $_POST['kategori'];

    // Cek apakah ada file foto baru yang diupload
    if ($_FILES['foto']['name'] != "") {
        $nama_file = $_FILES['foto']['name'];
        $ukuran_file = $_FILES['foto']['size'];
        $tmp_file = $_FILES['foto']['tmp_name'];
        
        $ext_valid = array('png', 'jpg', 'jpeg');
        $ext = explode('.', $nama_file);
        $ext = strtolower(end($ext));

        if (in_array($ext, $ext_valid)) {
            if ($ukuran_file <= 2000000) {
                // Hapus foto lama
                $q_foto = mysqli_query($koneksi, "SELECT foto FROM struktur_org WHERE id='$id'");
                if (mysqli_num_rows($q_foto) > 0) {
                    $data_foto = mysqli_fetch_assoc($q_foto);
                    $foto_lama = $data_foto['foto'];
                    if(file_exists("uploads/".$foto_lama) && !empty($foto_lama)){
                        unlink("uploads/".$foto_lama);
                    }
                }

                // Upload foto baru
                $nama_file_baru = uniqid() . '.' . $ext;
                move_uploaded_file($tmp_file, 'uploads/' . $nama_file_baru);

                $query = "UPDATE struktur_org SET nama='$nama', jabatan='$jabatan', kategori='$kategori', foto='$nama_file_baru' WHERE id='$id'";
            } else {
                echo "<script>alert('Ukuran foto terlalu besar! Maksimal 2MB.'); window.history.back();</script>";
                exit;
            }
        } else {
            echo "<script>alert('Ekstensi file tidak valid! Gunakan format JPG, JPEG, atau PNG.'); window.history.back();</script>";
            exit;
        }
    } else {
        // Update data tanpa mengubah foto
        $query = "UPDATE struktur_org SET nama='$nama', jabatan='$jabatan', kategori='$kategori' WHERE id='$id'";
    }

    if (isset($query) && mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data pejabat berhasil diperbarui!'); window.location='admin_struktur.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate database!');</script>";
    }
}

// ==========================================
// PROSES HAPUS DATA
// ==========================================
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    
    // Cari nama file foto lama untuk dihapus dari folder
    $q_foto = mysqli_query($koneksi, "SELECT foto FROM struktur_org WHERE id='$id'");
    if (mysqli_num_rows($q_foto) > 0) {
        $data_foto = mysqli_fetch_assoc($q_foto);
        $foto_lama = $data_foto['foto'];
        
        // Hapus file fisik dari folder uploads
        if(file_exists("uploads/".$foto_lama) && !empty($foto_lama)){
            unlink("uploads/".$foto_lama);
        }

        // Hapus data dari database
        mysqli_query($koneksi, "DELETE FROM struktur_org WHERE id='$id'");
        echo "<script>alert('Data berhasil dihapus!'); window.location='admin_struktur.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Struktur Organisasi - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar Sederhana -->
    <aside class="w-64 bg-[#0f5b66] text-white flex flex-col fixed h-full z-10">
        <div class="p-6 border-b border-[#0a424a] flex items-center gap-3">
            <div class="bg-white p-2 rounded-lg">
                <i data-lucide="building-2" class="w-6 h-6 text-[#0f5b66]"></i>
            </div>
            <h2 class="text-lg font-bold">Admin Panel</h2>
        </div>
        <nav class="flex-grow p-4 space-y-2">
            <a href="adminDashboard.php" class="flex items-center gap-3 p-3 rounded hover:bg-[#0a424a] transition-colors">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard Utama
            </a>
            <a href="Berita_kelola.php" class="flex items-center gap-3 p-3 rounded hover:bg-[#0a424a] transition-colors">
                <i data-lucide="file-text" class="w-5 h-5"></i> Kelola Berita
            </a>
            <a href="Galeri_kelola.php" class="flex items-center gap-3 p-3 rounded hover:bg-[#0a424a] transition-colors">
                <i data-lucide="image" class="w-5 h-5"></i> Kelola Galeri
            </a>
            <a href="admin_struktur.php" class="flex items-center gap-3 p-3 rounded bg-[#0a424a] font-semibold transition-colors">
                <i data-lucide="users" class="w-5 h-5"></i> Kelola Struktur
            </a>
            <!-- Tambahkan menu lain di sini jika ada -->
            <a href="logout.php" class="flex items-center gap-3 p-3 rounded hover:bg-red-600 transition-colors mt-8 text-red-200 hover:text-white">
                <i data-lucide="log-out" class="w-5 h-5"></i> Keluar
            </a>
        </nav>
    </aside>

    <!-- Konten Utama (Beri margin kiri agar tidak tertutup sidebar fixed) -->
    <main class="flex-grow p-8 ml-64">
        
        <header class="mb-8 flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Kelola Struktur Organisasi</h1>
                <p class="text-sm text-gray-500 mt-1">Tambah, edit, atau hapus susunan pimpinan dan bidang.</p>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500 font-medium">
                <i data-lucide="user" class="w-4 h-4"></i>
                Halo, <?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Admin'; ?>!
            </div>
        </header>

        <?php
        // Cek apakah sedang mode EDIT
        $is_edit = false;
        $edit_id = "";
        $edit_nama = "";
        $edit_jabatan = "";
        $edit_kategori = "";
        
        if (isset($_GET['edit'])) {
            $is_edit = true;
            $edit_id = $_GET['edit'];
            $q_edit = mysqli_query($koneksi, "SELECT * FROM struktur_org WHERE id='$edit_id'");
            if ($data_edit = mysqli_fetch_assoc($q_edit)) {
                $edit_nama = $data_edit['nama'];
                $edit_jabatan = $data_edit['jabatan'];
                $edit_kategori = $data_edit['kategori'];
            }
        }
        ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- FORM TAMBAH/EDIT DATA (Sebelah Kiri) -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 h-fit">
                <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
                    <?php if($is_edit): ?>
                        <i data-lucide="edit" class="w-5 h-5 text-blue-600"></i> Edit Pejabat
                    <?php else: ?>
                        <i data-lucide="user-plus" class="w-5 h-5 text-[#0f5b66]"></i> Tambah Pejabat Baru
                    <?php endif; ?>
                </h2>
                
                <!-- Pastikan ada enctype="multipart/form-data" untuk upload file -->
                <form action="admin_struktur.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    
                    <?php if($is_edit): ?>
                        <input type="hidden" name="id" value="<?= $edit_id ?>">
                    <?php endif; ?>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" required placeholder="Contoh: Budi Santoso, S.E." value="<?= $edit_nama ?>"
                               class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-2 focus:ring-[#0f5b66] focus:border-[#0f5b66] outline-none transition-all text-sm">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" required placeholder="Contoh: Kepala Dinas / Kabid UKM" value="<?= $edit_jabatan ?>"
                               class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-2 focus:ring-[#0f5b66] focus:border-[#0f5b66] outline-none transition-all text-sm">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori (Posisi di Frontend)</label>
                        <select name="kategori" required 
                                class="w-full border border-gray-300 rounded-md p-2.5 focus:ring-2 focus:ring-[#0f5b66] focus:border-[#0f5b66] outline-none transition-all text-sm bg-white">
                            <option value="pimpinan" <?= $edit_kategori == 'pimpinan' ? 'selected' : '' ?>>Unsur Pimpinan (Kadis / Sekretaris)</option>
                            <option value="kabid" <?= $edit_kategori == 'kabid' ? 'selected' : '' ?>>Kepala Bidang</option>
                            <option value="uptd" <?= $edit_kategori == 'uptd' ? 'selected' : '' ?>>Kepala UPTD / Inkubator</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil (Maks 2MB)</label>
                        <!-- Input file khusus gambar, tidak required jika sedang edit -->
                        <input type="file" name="foto" accept=".jpg, .jpeg, .png" <?= $is_edit ? '' : 'required' ?> 
                               class="w-full text-sm text-gray-500 border border-gray-300 rounded-md file:mr-4 file:py-2.5 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-[#e3ebd3] file:text-[#0f5b66] hover:file:bg-[#d4e0bd] transition-colors cursor-pointer">
                        <?php if($is_edit): ?>
                            <p class="text-xs text-orange-500 mt-1">*Biarkan kosong jika tidak ingin mengganti foto profil.</p>
                        <?php endif; ?>
                    </div>
                    
                    <?php if($is_edit): ?>
                        <div class="flex gap-2 mt-4">
                            <button type="submit" name="edit" class="flex-1 bg-blue-600 text-white py-2.5 rounded-md hover:bg-blue-700 font-semibold transition-colors shadow-sm flex justify-center items-center gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4"></i> Update
                            </button>
                            <a href="admin_struktur.php" class="flex-1 bg-gray-200 text-gray-700 py-2.5 rounded-md hover:bg-gray-300 font-semibold transition-colors shadow-sm flex justify-center items-center gap-2">
                                Batal
                            </a>
                        </div>
                    <?php else: ?>
                        <button type="submit" name="tambah" 
                                class="w-full bg-[#0f5b66] text-white py-2.5 rounded-md hover:bg-[#0a424a] font-semibold transition-colors mt-4 shadow-sm flex justify-center items-center gap-2">
                            <i data-lucide="save" class="w-4 h-4"></i> Simpan Data
                        </button>
                    <?php endif; ?>
                </form>
            </div>

            <!-- TABEL DATA PEJABAT (Sebelah Kanan) -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
                    <i data-lucide="list" class="w-5 h-5 text-[#0f5b66]"></i> Daftar Struktur Saat Ini
                </h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-full">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 text-sm border-y">
                                <th class="p-3 font-semibold">Foto</th>
                                <th class="p-3 font-semibold">Nama Lengkap</th>
                                <th class="p-3 font-semibold">Jabatan & Kategori</th>
                                <th class="p-3 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <?php
                            // Ambil data dari database, urutkan pimpinan di atas
                            $q_tampil = mysqli_query($koneksi, "SELECT * FROM struktur_org ORDER BY kategori DESC, id ASC");
                            
                            if (mysqli_num_rows($q_tampil) > 0) {
                                while ($row = mysqli_fetch_assoc($q_tampil)):
                            ?>
                            <tr class="border-b hover:bg-gray-50 transition-colors">
                                <td class="p-3">
                                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-200 bg-gray-100">
                                        <img src="uploads/<?= $row['foto']; ?>" alt="Foto" class="w-full h-full object-cover object-top">
                                    </div>
                                </td>
                                <td class="p-3 font-semibold text-gray-800"><?= $row['nama']; ?></td>
                                <td class="p-3">
                                    <div class="font-medium text-gray-700"><?= $row['jabatan']; ?></div>
                                    <?php
                                        // Menentukan warna badge berdasarkan kategori
                                        $bg_badge = $row['kategori'] == 'pimpinan' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700';
                                    ?>
                                    <span class="text-[11px] px-2 py-0.5 rounded <?= $bg_badge ?> mt-1 inline-block uppercase tracking-wider font-bold">
                                        <?= $row['kategori']; ?>
                                    </span>
                                </td>
                                <td class="p-3 text-center whitespace-nowrap">
                                    <a href="?edit=<?= $row['id']; ?>" class="text-blue-500 hover:text-blue-700 inline-flex items-center gap-1 font-medium bg-blue-50 px-3 py-1.5 rounded-md hover:bg-blue-100 transition-colors mr-2">
                                        <i data-lucide="edit" class="w-4 h-4"></i> Edit
                                    </a>
                                    <a href="?hapus=<?= $row['id']; ?>" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $row['nama']; ?> dari struktur?');" 
                                       class="text-red-500 hover:text-red-700 inline-flex items-center gap-1 font-medium bg-red-50 px-3 py-1.5 rounded-md hover:bg-red-100 transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                endwhile; 
                            } else {
                                echo "<tr><td colspan='4' class='p-6 text-center text-gray-500'>Belum ada data struktur organisasi.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- Script Inisialisasi Ikon -->
    <script> lucide.createIcons(); </script>
</body>
</html>