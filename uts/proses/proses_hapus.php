<?php
#1. Meng-koneksikan Ke Database
include_once("../koneksi.php");

// 2. Ambil ID yang dikirim lewat GET (sederhana)
$dihapus = isset($_GET['id_buku']) ? $_GET['id_buku'] : '';

// jika id kosong, kembali ke index
if (empty($dihapus)) {
    header("Location: ../index.php");
    exit;
}

// 3. Menulis query (string-based)
$query = "DELETE FROM uts WHERE id_buku = '$dihapus'";

// 4. Menjalankan query
$hapus = mysqli_query($koneksi, $query);

// 5. Kembali ke index.php
if ($hapus) {
    header("Location: ../index.php");
    exit;
} else {
    header("Location: ../index.php?error=delete_failed");
    exit;
}

?>