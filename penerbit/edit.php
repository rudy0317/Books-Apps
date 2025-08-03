<?php
include "../config/koneksi.php";

$kode = $_GET['kode'] ?? '';
$data = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE kode_penerbit = '$kode'");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kota = $_POST['kota'];

    mysqli_query($koneksi, "UPDATE penerbit SET nama_penerbit = '$nama', kota_penerbit = '$kota' WHERE kode_penerbit = '$kode'");
    header("Location: index.php");
    exit;
}

$title = "Edit Penerbit";
ob_start();
?>

<div class="nav-links">
    <a href="index.php"><i class="fas fa-home"></i> Kembali</a>
</div>

<form method="post">
    <label>Kode Penerbit</label>
    <input type="text" name="kode" value="<?= htmlspecialchars($row['kode_penerbit']) ?>" readonly>

    <label>Nama Penerbit</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($row['nama_penerbit']) ?>" required>

    <label>Kota Penerbit</label>
    <input type="text" name="kota" value="<?= htmlspecialchars($row['kota_penerbit']) ?>" required>

    <button type="submit">Simpan Perubahan</button>
</form>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
