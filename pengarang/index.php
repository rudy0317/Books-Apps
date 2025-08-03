<?php
$title = "Kelola Pengarang";
include "../config/koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM pengarang");
ob_start();
?>
<h2>Data Pengarang</h2>
<div class="nav-links">
    <a href="../index.php"><i class="fas fa-home"></i> Kembali ke Menu Utama</a>
    <a href="tambah.php"><i class="fas fa-plus"></i> Tambah Pengarang</a>
</div>

<table>
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    <?php while ($d = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= htmlspecialchars($d['kode_pengarang']) ?></td>
        <td><?= htmlspecialchars($d['nama_pengarang']) ?></td>
        <td>
            <a href="edit.php?kode=<?= urlencode($d['kode_pengarang']) ?>">Edit</a> | 
            <a href="hapus.php?kode=<?= urlencode($d['kode_pengarang']) ?>" onclick="return confirm('Yakin ingin menghapus pengarang ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
