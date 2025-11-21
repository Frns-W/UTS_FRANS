<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori']; 

    #3. Query Insert
    $query = "UPDATE uts SET judul_buku ='$judul_buku', pengarang='$pengarang', tahun_terbit='$tahun_terbit', 
    kategori='$kategori'WHERE id_buku='$id_buku''";

    $tambah = mysqli_query($koneksi,$query);

    #Jika Berhasil
    if($tambah){
        header("location:index.php");
    }else{
        echo "Data Gagal ditambah";
    }
?>