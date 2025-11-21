<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Edit (simple handling as requested)
    $id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : '';
    $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
    $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';

    #3. Query Update (using provided values directly)
    $query = "UPDATE uts SET judul_buku = '$judul_buku', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit', kategori = '$kategori' WHERE id_buku = '$id_buku'";

    $update = mysqli_query($koneksi, $query);

    #Jika Berhasil
    if($update){
        header("Location: ../index.php");
        exit;
    }else{
        header("Location: ../index.php?error=update_failed");
        exit;
    }
?>