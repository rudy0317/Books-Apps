<?php
include "../config/koneksi.php";

$kode = $_GET['kode'] ?? '';

if ($kode) {
    mysqli_query($koneksi, "DELETE FROM penerbit WHERE kode_penerbit = '$kode'");
}

header("Location: index.php");
exit;
