<?php
include "../config/koneksi.php";

$kode = $_GET['kode'] ?? '';
$data = mysqli_query($koneksi, "SELECT * FROM pengarang WHERE kode_pengarang = '$kode'");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];

    mysqli_query($koneksi, "UPDATE pengarang SET nama_pengarang = '$nama' WHERE kode_pengarang = '$kode'");
    header("Location: index.php");
    exit;
}

$title = "Edit Pengarang";
ob_start();
?>

<div class="nav-links">
    <a href="index.php"><i class="fas fa-home"></i> Kembali</a>
</div>

<form method="post">
    <label>Kode Pengarang</label>
    <input type="text" name="kode" value="<?= htmlspecialchars($row['kode_pengarang']) ?>" readonly>

    <label>Nama Pengarang</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($row['nama_pengarang']) ?>" required>

    <button type="submit">Simpan Perubahan</button>
</form>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
