<?php
require '../config.php';
$id_barang = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($host, "select * from barang where id_barang='$id_barang'"));
if(isset($_POST['edit'])) {
    $nama_barang = $_POST['nama_barang'];
    $kuantitas_barang = $_POST['kuantitas_barang'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];

    $query = mysqli_query($host,"update barang set nama_barang='$nama_barang',kuantitas_barang='$kuantitas_barang',harga='$harga',kondisi='$kondisi' where id_barang='$id_barang'");

    $query ? header("location:../penjual/index.php") : header("location:edit.php?m=fail");
}
include '../template/header.php'
?>
    <style>
        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .form-select {
            height: 48px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Edit Data Barang</h5>
                        <form action="" method="post">
                        <div class="form-floating mb-3">
                                <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder="Nama Barang" value="<?= $data['nama_barang'] ?>" required>
                                <label for="floatingInput">Nama Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="kuantitas_barang" class="form-control" id="floatingKuantitasBarang" placeholder="Kuantitas Barang" value="<?= $data['kuantitas_barang'] ?>" required>
                                <label for="floatingKuantitasBarang">Kuantitas Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="harga" class="form-control" id="floatingHarga" placeholder="Harga" value="<?= $data['harga'] ?>" required>
                                <label for="floatingHarga">Harga</label>
                            </div>
                            <div class="mb-3">
                                <select name="kondisi" class="form-select" aria-label="Pilih kondisi barang">
                                    <option selected disabled>Pilih kondisi barang</option>
                                    <option value="bekas" <?= $data['kondisi'] == 'bekas' ? 'selected' : '' ?>>Bekas</option>
                                    <option value="baru" <?= $data['kondisi'] == 'baru' ? 'selected' : '' ?>>Baru</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="edit" class="btn btn-primary btn-login text-uppercase fw-bold mb-3">Edit Data</button>
                                <button type="button" onclick="location.href='../admin/index.php'" class="btn btn-danger btn-login text-uppercase fw-bold">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include '../template/footer.php' ?>