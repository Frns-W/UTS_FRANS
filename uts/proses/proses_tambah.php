<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    #3. Query Insert
    $query = "INSERT INTO uts (judul_buku,pengarang,tahun_terbit,kategori) 
    VALUES ('$judul_buku','$pengarang','$tahun_terbit','$kategori')";

    $tambah = mysqli_query($koneksi,$query);

    #4. Jika Berhasil
    if($tambah){
        header("location:index.php");
    }else{
        echo "Data Gagal ditambah";
    }
?>