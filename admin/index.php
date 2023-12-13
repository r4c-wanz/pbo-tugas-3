<?php
session_start();
require '../config.php';
if ($_SESSION['role'] != "admin") {
    header("location:../index.php?m=not-allowed");
}
$datas = mysqli_query($host, "select * from user");

$cek = mysqli_num_rows($datas);

include '../template/header.php'
?>
    <style>
        .link-tambah-data {
            text-decoration: none!important;
        }
        .link-tambah-data:hover {
            text-decoration: underline!important;
        }
    </style>
    <div class="min-vh-100 h-max d-flex flex-column justify-content-between">
        <?php include '../assets/wave-header.svg' ?>

        <div class="container">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <p class="mb-0">Halo, Selamat datang <b><?php echo ucfirst($_SESSION['username']);?></b></p>
                <a href="../logout.php" class="text-danger text-decoration-none">Logout</a>
            </div>
            <a href="../user/create.php" class="link-tambah-data">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
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
                        <td><?= $data['username'] ?></td>
                        <td><?= $data['password'] ?></td>
                        <td><?= $data['role'] ?></td>
                        <td>
                            <a href="../user/edit.php?id=<?= $data['id_user'] ?>" class="btn btn-primary">Edit</a>
                            <a href="../user/delete.php?id=<?= $data['id_user'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    else :
                    ?>

                    <tr>
                        <th scope="row" colspan="5" class="text-center">Data Kosong</th>
                    </tr>
                    <?php endif ?>

                </tbody>
            </table>
        </div>
        <?php include '../assets/wave-footer.svg' ?>

    </div>
<?php include '../template/footer.php' ?>