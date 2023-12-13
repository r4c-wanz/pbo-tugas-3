<?php
session_start();
require '../config.php';
if ($_SESSION['role'] != "pembeli") {
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
                <p class="mb-0">Halo, Selamat datang <b><?= ucfirst($_SESSION['username']);?></b></p>
                <a href="../logout.php" class="text-danger text-decoration-none">Logout</a>
            </div>
            <?php
            if ($cek != null) :
            foreach ($datas as $data) :
            ?>
            <div class="card" style="width: 18rem;" data-aos="fade-right">
                <div class="card-body">
                    <h5 class="card-title"><?= ucfirst($data['nama_barang']) ?></h5>
                    <h6 class="card-subtitle mb-3">Rp <?= $data['harga'] ?></h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Stok <?= $data['kuantitas_barang'] ?></h6>
                    <p class="card-text">Kondisi barang <?= $data['kondisi'] ?></p>
                </div>
            </div>
            <?php
            endforeach;
            else :
            ?>

            <b class="">Barang Kosong</b>
            <?php endif ?>

        </div>
        <?php include '../assets/wave-footer.svg' ?>

    </div>
<?php include '../template/footer.php' ?>