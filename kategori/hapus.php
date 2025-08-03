<?php
include "../config/koneksi.php";

$kode = $_GET['kode'] ?? '';

if ($kode) {
    mysqli_query($koneksi, "DELETE FROM kategori WHERE kode_kategori = '$kode'");
}

header("Location: index.php");
exit;
