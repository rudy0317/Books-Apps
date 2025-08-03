<?php
include "config/koneksi.php";
$title = "Menu Utama";
ob_start();

$kategori = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM kategori"));
$pengarang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pengarang"));
$penerbit = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM penerbit"));
$master_buku = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM master_buku"));
?>

<h2>Menu Navigasi</h2>

<div class="menu-dashboard">
    <a href="kategori/index.php" class="menu-item">Kategori<br>(<?= $kategori['total'] ?>)</a>
    <a href="pengarang/index.php" class="menu-item">Pengarang<br>(<?= $pengarang['total'] ?>)</a>
    <a href="penerbit/index.php" class="menu-item">Penerbit<br>(<?= $penerbit['total'] ?>)</a>
    <a href="master_buku/index.php" class="menu-item">Master Buku<br>(<?= $master_buku['total'] ?>)</a>
</div>

<?php
$content = ob_get_clean();
include "config/layout.php";
?>
