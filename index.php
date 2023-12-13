<?php
session_start();
if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] == 'pembeli') {
        header("location:pembeli/index.php");
    } elseif ($_SESSION["role"] == 'penjual') {
        header("location:penjual/index.php");
    } elseif ($_SESSION["role"] == 'admin') {
        header("location:admin/index.php");
    }
}
include 'template/header.php'
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
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5" data-aos="fade-down">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                        <form action="proccess_login.php" method="post">
                            <?php
                            if (isset($_GET['m'])) :
                                if ($_GET['m'] == 'not-found') :
                            ?>

                            <div class="alert alert-danger" role="alert">
                                Akun tidak dapat ditemukan
                            </div>
                            <?php elseif ($_GET['m'] == 'fail') : ?>

                            <small class="text-danger d-block mb-2">Username atau Password salah</small>
                            <?php elseif ($_GET['m'] == 'not-allowed') : ?>

                            <div class="alert alert-danger" role="alert">
                                Anda tidak dapat mengakses halaman
                            </div>
                                <?php endif ?>
                            <?php endif ?>

                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign in</button>
                            </div>
                            <hr class="my-4">
                            <span>Not have account? <a href="register.php">Sign Up Now</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'template/footer.php' ?>