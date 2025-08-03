<?php
include "../config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM kategori");
$title = "Kelola Kategori";
ob_start();
?>

<h2>Data Kategori</h2>

<div class="nav-links">
    <a href="../index.php"><i class="fas fa-home"></i> Kembali ke Menu Utama</a>
    <a href="tambah.php"><i class="fas fa-plus"></i> Tambah Kategori</a>
</div>

<table>
    <tr><th>Kode</th><th>Nama</th><th>Aksi</th></tr>
    <?php while ($d = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= htmlspecialchars($d['kode_kategori']) ?></td>
            <td><?= htmlspecialchars($d['nama_kategori']) ?></td>
            <td>
                <a href="edit.php?kode=<?= urlencode($d['kode_kategori']) ?>">Edit</a> |
                <a href="hapus.php?kode=<?= urlencode($d['kode_kategori']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
