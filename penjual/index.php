<?php
session_start();
require '../config.php';
if ($_SESSION['role'] != "penjual") {
    header("location:../index.php?m=not-allowed");
}
$datas = mysqli_query($host, "select * from barang");

$cek = mysqli_num_rows($datas);

include '../template/header.php'
?>
    <div class="min-vh-100 h-max d-flex flex-column justify-content-between">
        <?php include '../assets/wave-header.svg' ?>

        <div class="container">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <p class="mb-0">Halo, Selamat datang <b><?php echo ucfirst($_SESSION['username']);?></b></p>
                <a href="../logout.php" class="text-danger text-decoration-none">Logout</a>
            </div>
            <a href="../barang/create.php" class="link-tambah-data">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kuantitas Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($cek != null) :
                    $no = 1;
                    foreach ($datas as $data) :
                    ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data['nama_barang'] ?></td>
                        <td><?= $data['kuantitas_barang'] ?></td>
                        <td><?= $data['harga'] ?></td>
                        <td><?= $data['kondisi'] ?></td>
                        <td>
                            <a href="../barang/edit.php?id=<?= $data['id_barang'] ?>" class="btn btn-primary">Edit</a>
                            <a href="../barang/delete.php?id=<?= $data['id_barang'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    else :
                    ?>

                    <tr>
                        <th scope="row" colspan="6" class="text-center">Data Kosong</th>
                    </tr>
                    <?php endif ?>

                </tbody>
            </table>
        </div>
        <?php include '../assets/wave-footer.svg' ?>

    </div>
<?php include '../template/footer.php' ?>