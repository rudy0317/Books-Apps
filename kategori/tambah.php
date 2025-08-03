<?php
include "../config/koneksi.php";
$title = "Tambah Kategori";
ob_start();

// Proses simpan data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    mysqli_query($koneksi, "INSERT INTO kategori (kode_kategori, nama_kategori) VALUES('$kode', '$nama')");

    header("Location: index.php");
    exit;
}
?>

<div class="nav-links">
    <a href="index.php"><i class="fas fa-home"></i> Kembali</a>
</div>

<form method="post">
    <label>Kode</label>
    <input type="text" name="kode" required><br>

    <label>Nama</label>
    <input type="text" name="nama" required><br>

    <button type="submit">Simpan</button>
</form>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
