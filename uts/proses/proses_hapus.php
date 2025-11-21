<?php
#1. Meng-koneksikan Ke Database
include_once("../koneksi.php");

#2.ID Hapus
$dihapus = $_GET['id_buku'];

#3.menulis Query
$query = "DELETE FROM uts WHERE id='$dihapus'";   

#4.Menjalankan Query
$hapus = mysqli_query($koneksi, $query);

#5.Kembali ke index.php
if ($hapus) {
    header("location:index.php");
}

?>