<?php
include "../config/koneksi.php";

$kode = $_GET['kode'] ?? '';
$data = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kode_kategori = '$kode'");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    header("Location: index.php");
    exit;
}

$title = "Edit Kategori";
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];

    mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '$nama' WHERE kode_kategori = '$kode'");
    header("Location: index.php");
    exit;
}
?>

<div class="nav-links">
    <a href="index.php"><i class="fas fa-home"></i> Kembali</a>
</div>

<form method="post">
    <label>Kode</label>
    <input type="text" name="kode" value="<?= htmlspecialchars($row['kode_kategori']) ?>" readonly>

    <label>Nama</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($row['nama_kategori']) ?>" required>

    <button type="submit">Simpan Perubahan</button>
</form>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
