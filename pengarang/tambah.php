<?php
include "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    mysqli_query($koneksi, "INSERT INTO pengarang (kode_pengarang, nama_pengarang) VALUES ('$kode', '$nama')");

    header("Location: index.php");
    exit;
}

$title = "Tambah Pengarang";
ob_start();
?>

<div class="nav-links">
    <a href="index.php"><i class="fas fa-home"></i> Kembali</a>
</div>

<form method="POST">
    <label>Kode Pengarang</label>
    <input type="text" name="kode" required>

    <label>Nama Pengarang</label>
    <input type="text" name="nama" required>

    <button type="submit">Simpan</button>
</form>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
