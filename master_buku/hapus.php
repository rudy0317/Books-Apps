<?php
include "../config/koneksi.php";

$kode = $_GET['kode'] ?? '';

if ($kode) {
    mysqli_query($koneksi, "DELETE FROM master_buku WHERE kode_buku = '$kode'");
}

header("Location: index.php");
exit;
