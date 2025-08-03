<?php
include "../config/koneksi.php";

// Ambil data untuk combo box
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
$pengarang = mysqli_query($koneksi, "SELECT * FROM pengarang");
$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $kategori_kode = $_POST['kategori'];
    $pengarang_kode = $_POST['pengarang'];
    $penerbit_kode = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi, "INSERT INTO master_buku 
        (kode_buku, judul_buku, kategori, pengarang, penerbit, tahun, deskripsi, harga)
        VALUES ('$kode', '$judul', '$kategori_kode', '$pengarang_kode', '$penerbit_kode', '$tahun', '$deskripsi', '$harga')");

    header("Location: index.php");
    exit;
}

$title = "Tambah Master Buku";
ob_start();
?>

<div class="nav-links">
    <a href="index.php"><i class="fas fa-home"></i> Kembali</a>
</div>

<form method="POST">
    <label>Kode Buku</label>
    <input type="text" name="kode" required>

    <label>Judul Buku</label>
    <input type="text" name="judul" required>

    <label>Kategori</label>
    <select name="kategori" required>
        <option value="">-- Pilih --</option>
        <?php while ($row = mysqli_fetch_assoc($kategori)) { ?>
            <option value="<?= $row['kode_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
        <?php } ?>
    </select>

    <label>Pengarang</label>
    <select name="pengarang" required>
        <option value="">-- Pilih --</option>
        <?php while ($row = mysqli_fetch_assoc($pengarang)) { ?>
            <option value="<?= $row['kode_pengarang'] ?>"><?= $row['nama_pengarang'] ?></option>
        <?php } ?>
    </select>

    <label>Penerbit</label>
    <select name="penerbit" required>
        <option value="">-- Pilih --</option>
        <?php while ($row = mysqli_fetch_assoc($penerbit)) { ?>
            <option value="<?= $row['kode_penerbit'] ?>"><?= $row['nama_penerbit'] ?></option>
        <?php } ?>
    </select>

    <label>Tahun</label>
    <input type="text" name="tahun" maxlength="4" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi"></textarea>

    <label>Harga</label>
    <input type="number" name="harga" required>

    <button type="submit">Simpan</button>
</form>

<?php
$content = ob_get_clean();
include "../config/layout.php";
?>
