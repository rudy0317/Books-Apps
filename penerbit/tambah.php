<?php
include "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $kota = $_POST['kota'];

    mysqli_query($koneksi, "INSERT INTO penerbit (kode_penerbit, nama_penerbit, kota_penerbit) VALUES ('$kode', '$nama', '$kota')");

    header("Location: index.php");
    exit;
}

$title = "Tambah Penerbit";
ob_start();
?>

<div class="nav-links">
    <a href="index.php"><i class="fas fa-home"></i> Kembali</a>
</div>

<form method="POST">
    <label>Kode Penerbit</label>
    <input type="text" name="kode" required>

    <label>Nama Penerbit</label>
    <input type="text" name="nama" required>

    <label>Kota Penerbit</label>
    <input type="text" name="kota" required>

    <button type="submit">Simpan</button>
</form>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
