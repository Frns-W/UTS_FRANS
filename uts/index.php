<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biodata Siswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
                crossorigin="anonymous">

        <link rel="stylesheet" href="../css/all.css">
</head>

<body style="background-color: #d1e6d4">
        <?php
        include_once("navbar.php");
        ?>

        <div class="container">
                <div class="row my-5">
                        <div class="col-10 m-auto">
                                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                                        <div class="card-header">
                                                <b>Library Manager</b>
                                                
                                        </div>
                                        <div class="card-body">
                                                <table class="table">
                                                        <thead>
                                                                <tr>
                                                                        <th scope="row">No</th>
                                                                        <th scope="col">Judul Buku</th>
                                                                        <th scope="col">Pengarang</th>
                                                                        <th scope="col">Tahun Terbit</th>
                                                                        <th scope="col">Kategori</th>
                                                                        <th scope="col">Opsi</th>
                                                                </tr>

                                                        </thead>
                                                        <tbody>

                                                                <?php
                                                                # koneksi
                                                                include("koneksi.php");
                                                                # menuliskan query menampilkan data
                                                                $qry = "SELECT * FROM uts ";
                                                                # menjalankan query
                                                                $tampil = mysqli_query($koneksi, $qry);
                                                                # looping hasil query
                                                                $nomor = 1;
                                                                foreach ($tampil as $data) {

                                                                        ?>
                                                                        <tr>
                                                                                <th scope="row"><?= $nomor++ ?></th>
                                                                                <td><?= $data['judul_buku'] ?></td>
                                                                                <td><?= $data['pengarang'] ?></td>
                                                                                <td><?= $data['tahun_terbit'] ?></td>
                                                                                <td><?= $data['kategori'] ?></td>
                                                                                <td>
                                                                                        <button class="btn btn-warning btn-sm"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#exampleModal<?= $data['id_buku'] ?>">
                                                                                                <i
                                                                                                        class="fa-solid fa-magnifying-glass"></i>
                                                                                        </button>

                                                                                        <a href="proses/form_edit.php?id_buku=<?= $data['id_buku'] ?>" class="btn btn-info btn-sm">
                                                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                                        </a>

                                                                                        <button class="btn btn-danger btn-sm"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modalhapus<?= $data['id_buku'] ?>">
                                                                                                <i
                                                                                                        class="fa-solid fa-trash"></i>
                                                                                        </button>



                                                                                        <div class="modal fade"
                                                                                                id="exampleModal<?= $data['id_buku'] ?>"
                                                                                                tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                        <div
                                                                                                                class="modal-content">
                                                                                                                <div
                                                                                                                        class="modal-header bg-warning">
                                                                                                                        <h5
                                                                                                                                class="modal-title">
                                                                                                                                Detail
                                                                                                                                Data
                                                                                                                        </h5>
                                                                                                                        <button type="button"
                                                                                                                                class="btn-close"
                                                                                                                                data-bs-dismiss="modal"></button>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                        class="modal-body">
                                                                                                                        <table
                                                                                                                                class="table">
                                                                                                                                <tbody>
                                                                                                                                        <tr>
                                                                                                                                                <td>Nama
                                                                                                                                                </td>
                                                                                                                                                <th
                                                                                                                                                        scope="row">
                                                                                                                                                        <?= $data['judul_buku'] ?>
                                                                                                                                                </th>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                                <td>Pengarang
                                                                                                                                                </td>
                                                                                                                                                <th
                                                                                                                                                        scope="row">
                                                                                                                                                        <?= $data['pengarang'] ?>
                                                                                                                                                </th>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                                <td>Tahun
                                                                                                                                                        Terbit
                                                                                                                                                </td>
                                                                                                                                                <th
                                                                                                                                                        scope="row">
                                                                                                                                                        <?= $data['tahun_terbit'] ?>
                                                                                                                                                </th>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                                <td>Kategori
                                                                                                                                                </td>
                                                                                                                                                <th
                                                                                                                                                        scope="row">
                                                                                                                                                        <?= $data['kategori'] ?>
                                                                                                                                                </th>
                                                                                                                                        </tr>
                                                                                                                                </tbody>
                                                                                                                        </table>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                        class="modal-footer">
                                                                                                                        <button class="btn btn-secondary"
                                                                                                                                data-bs-dismiss="modal">Close</button>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        
                                                                                        <div class="modal fade" id="modalEdit"
                                                                                                tabindex="-1">
                                                                                                <div class="modal-dialog">
                                                                                                        <form 
                                                                                                                class="modal-content">
                                                                                                                <div
                                                                                                                        class="modal-header bg-info">
                                                                                                                        <h5
                                                                                                                                class="modal-title">
                                                                                                                                Edit
                                                                                                                                Data
                                                                                                                        </h5>

                                                                                                                        <button type="button"
                                                                                                                                class="btn-close"
                                                                                                                                data-bs-dismiss="modal"></button>
                                                                                                                </div>



                                                                                                        </form>
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="modal fade"
                                                                                                id="modalhapus<?= $data['id_buku'] ?>"
                                                                                                tabindex="-1"
                                                                                                aria-labelledby="exampleModalLabel"
                                                                                                aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                        <div
                                                                                                                class="modal-content">
                                                                                                                <div
                                                                                                                        class="modal-header">
                                                                                                                        <h1 class="modal-title fs-5"
                                                                                                                                id="exampleModalLabel">
                                                                                                                                Warning
                                                                                                                        </h1>
                                                                                                                        <button type="button"
                                                                                                                                class="btn-close"
                                                                                                                                data-bs-dismiss="modal"
                                                                                                                                aria-label="Close"></button>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                        class="modal-body">
                                                                                                                        Yakin
                                                                                                                        Data
                                                                                                                        Buku
                                                                                                                        <?= $data['judul_buku'] ?>
                                                                                                                        Ingin
                                                                                                                        Dihapus?
                                                                                                                </div>
                                                                                                                <div
                                                                                                                        class="modal-footer">
                                                                                                                        <button type="button"
                                                                                                                                class="btn btn-secondary"
                                                                                                                                data-bs-dismiss="modal">Close</button>
                                                                                                                        <a href="proses/proses_hapus.php?id_buku=<?= $data['id_buku'] ?>"
                                                                                                                                class="btn btn-danger">Hapus</a>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </td>
                                                                        </tr>

                                                                        <?php
                                                                }
                                                                ?>


                                                        </tbody>
                                                </table>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
                crossorigin="anonymous"></script>

        <script src="../js/all.js"></script>
</body>

</html>