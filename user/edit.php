<?php
require '../config.php';
$id_user = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($host, "select * from user where id_user='$id_user'"));
if(isset($_POST['edit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = mysqli_query($host,"update user set username='$username',password='$password',role='$role' where id_user='$id_user'");

    $query ? header("location:../admin/index.php") : header("location:edit.php?m=fail");
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
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Edit Data User</h5>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" value="<?= $data['username'] ?>" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Password" value="<?= $data['password'] ?>" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="mb-3">
                                <select name="role" class="form-select" aria-label="Pilih role">
                                    <option selected disabled>Pilih role</option>
                                    <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="penjual" <?= $data['role'] == 'penjual' ? 'selected' : '' ?>>Penjual</option>
                                    <option value="pembeli" <?= $data['role'] == 'pembeli' ? 'selected' : '' ?>>Pembeli</option>
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