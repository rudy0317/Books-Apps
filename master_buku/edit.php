<?php
include "../config/koneksi.php";

$kode = $_GET['kode'] ?? '';
$data = mysqli_query($koneksi, "SELECT * FROM master_buku WHERE kode_buku = '$kode'");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    header("Location: index.php");
    exit;
}

// Ambil data untuk combo box
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
$pengarang = mysqli_query($koneksi, "SELECT * FROM pengarang");
$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $kategori_kode = $_POST['kategori'];
    $pengarang_kode = $_POST['pengarang'];
    $penerbit_kode = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi, "UPDATE master_buku SET 
        judul_buku = '$judul',
        kategori = '$kategori_kode',
        pengarang = '$pengarang_kode',
        penerbit = '$penerbit_kode',
        tahun = '$tahun',
        deskripsi = '$deskripsi',
        harga = '$harga'
        WHERE kode_buku = '$kode'");

    header("Location: index.php");
    exit;
}

$title = "Edit Master Buku";
ob_start();
?>

<div class="nav-links">
    <a href="index.php"><i class="fas fa-home"></i> Kembali</a>
</div>

<form method="POST">
    <label>Kode Buku</label>
    <input type="text" name="kode" value="<?= htmlspecialchars($row['kode_buku']) ?>" readonly>

    <label>Judul Buku</label>
    <input type="text" name="judul" value="<?= htmlspecialchars($row['judul_buku']) ?>" required>

    <label>Kategori</label>
    <select name="kategori" required>
        <?php while ($kat = mysqli_fetch_assoc($kategori)) { ?>
            <option value="<?= $kat['kode_kategori'] ?>" <?= $kat['kode_kategori'] == $row['kategori'] ? 'selected' : '' ?>>
                <?= $kat['nama_kategori'] ?>
            </option>
        <?php } ?>
    </select>

    <label>Pengarang</label>
    <select name="pengarang" required>
        <?php while ($pg = mysqli_fetch_assoc($pengarang)) { ?>
            <option value="<?= $pg['kode_pengarang'] ?>" <?= $pg['kode_pengarang'] == $row['pengarang'] ? 'selected' : '' ?>>
                <?= $pg['nama_pengarang'] ?>
            </option>
        <?php } ?>
    </select>

    <label>Penerbit</label>
    <select name="penerbit" required>
        <?php while ($pn = mysqli_fetch_assoc($penerbit)) { ?>
            <option value="<?= $pn['kode_penerbit'] ?>" <?= $pn['kode_penerbit'] == $row['penerbit'] ? 'selected' : '' ?>>
                <?= $pn['nama_penerbit'] ?>
            </option>
        <?php } ?>
    </select>

    <label>Tahun</label>
    <input type="text" name="tahun" maxlength="4" value="<?= htmlspecialchars($row['tahun']) ?>" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi"><?= htmlspecialchars($row['deskripsi']) ?></textarea>

    <label>Harga</label>
    <input type="number" name="harga" value="<?= htmlspecialchars($row['harga']) ?>" required>

    <button type="submit">Simpan Perubahan</button>
</form>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
