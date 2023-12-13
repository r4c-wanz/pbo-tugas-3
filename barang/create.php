<?php
require '../config.php';
if(isset($_POST['create'])) {
    $nama_barang = $_POST['nama_barang'];
    $kuantitas_barang = $_POST['kuantitas_barang'];
    $harga = $_POST['harga'];

    if (!$_POST['kondisi']) {
        $kondisi = 'baru';
    } else {
        $kondisi = $_POST['kondisi'];
    }
    
    $query = mysqli_query($host,"insert into barang values(null,'$nama_barang','$kuantitas_barang','$harga','$kondisi')");

    $query ? header("location:../penjual/index.php") : header("location:create.php?m=fail");
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
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Tambah Data Barang</h5>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_barang" class="form-control" id="floatingInput" placeholder="Nama Barang" required>
                                <label for="floatingInput">Nama Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="kuantitas_barang" class="form-control" id="floatingKuantitasBarang" placeholder="Kuantitas Barang" required>
                                <label for="floatingKuantitasBarang">Kuantitas Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="harga" class="form-control" id="floatingHarga" placeholder="Harga" required>
                                <label for="floatingHarga">Harga</label>
                            </div>
                            <div class="mb-3">
                                <select name="kondisi" class="form-select" aria-label="Pilih kondisi barang">
                                    <option selected disabled>Pilih kondisi barang</option>
                                    <option value="bekas">Bekas</option>
                                    <option value="baru">Baru</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="create" class="btn btn-primary btn-login text-uppercase fw-bold mb-3">Tambah Data</button>
                                <button type="button" onclick="location.href='../admin/index.php'" class="btn btn-danger btn-login text-uppercase fw-bold">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include '../template/footer.php' ?>