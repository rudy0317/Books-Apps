<?php
$title = "Kelola Master Buku";
include "../config/koneksi.php";

// Handle filter dan pencarian
$where = [];

if (!empty($_GET['search'])) {
    $cari = mysqli_real_escape_string($koneksi, $_GET['search']);
    $where[] = "(judul_buku LIKE '%$cari%')";
}

if (!empty($_GET['kategori'])) {
    $kategoriFilter = mysqli_real_escape_string($koneksi, $_GET['kategori']);
    $where[] = "kategori = '$kategoriFilter'";
}

$whereSql = $where ? "WHERE " . implode(" AND ", $where) : "";

$data = mysqli_query($koneksi, "SELECT * FROM master_buku $whereSql ORDER BY judul_buku ASC");

// Ambil data kategori untuk filter
$kategoriList = mysqli_query($koneksi, "SELECT * FROM kategori");

ob_start();
?>

<div class="nav-links">
    <a href="../index.php"><i class="fas fa-home"></i> Kembali ke Menu Utama</a>



<form method="GET" class="filter-form">
    <input type="text" name="search" placeholder="Cari Judul Buku" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">

    <select name="kategori">
        <option value="">-- Semua Kategori --</option>
        <?php while ($kat = mysqli_fetch_assoc($kategoriList)) { ?>
            <option value="<?= $kat['kode_kategori'] ?>" <?= (isset($_GET['kategori']) && $_GET['kategori'] == $kat['kode_kategori']) ? 'selected' : '' ?>>
                <?= $kat['nama_kategori'] ?>
            </option>
        <?php } ?>
    </select>

    <button type="submit">Filter</button>
</form>
<a href="tambah.php"><i class="fas fa-plus"></i> Tambah Buku</a>
</div>
<table>
    <tr>
        <th>Kode</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php while ($d = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= htmlspecialchars($d['kode_buku']) ?></td>
        <td><?= htmlspecialchars($d['judul_buku']) ?></td>
        <td><?= htmlspecialchars($d['kategori']) ?></td>
        <td><?= htmlspecialchars($d['pengarang']) ?></td>
        <td><?= htmlspecialchars($d['penerbit']) ?></td>
        <td><?= htmlspecialchars($d['tahun']) ?></td>
        <td><?= number_format($d['harga']) ?></td>
        <td><?= substr(htmlspecialchars($d['deskripsi']), 0, 40) ?>...</td>
        <td>
            <a href="edit.php?kode=<?= urlencode($d['kode_buku']) ?>">Edit</a> | 
            <a href="hapus.php?kode=<?= urlencode($d['kode_buku']) ?>" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
