<?php
$title = "Kelola Penerbit";
include "../config/koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM penerbit");
ob_start();
?>
<h2>Data Penerbit</h2>
<div class="nav-links">
    <a href="../index.php"><i class="fas fa-home"></i> Kembali ke Menu Utama</a>
    <a href="tambah.php"><i class="fas fa-plus"></i> Tambah Penerbit</a>
</div>

<table>
    <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Kota</th>
        <th>Aksi</th>
    </tr>
    <?php while ($d = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= htmlspecialchars($d['kode_penerbit']) ?></td>
        <td><?= htmlspecialchars($d['nama_penerbit']) ?></td>
        <td><?= htmlspecialchars($d['kota_penerbit']) ?></td>
        <td>
            <a href="edit.php?kode=<?= urlencode($d['kode_penerbit']) ?>">Edit</a> | 
            <a href="hapus.php?kode=<?= urlencode($d['kode_penerbit']) ?>" onclick="return confirm('Yakin ingin menghapus penerbit ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
