<?php
include "../config/koneksi.php";

$kode = $_GET['kode'] ?? '';

if ($kode) {
    mysqli_query($koneksi, "DELETE FROM pengarang WHERE kode_pengarang = '$kode'");
}

header("Location: index.php");
exit;
