<?php include 'template/header.php' ?>
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
                <div class="card border-0 shadow rounded-3 my-5" data-aos="fade-down">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h5>
                        <form action="proccess_register.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="mb-3">
                                <select name="role" class="form-select" aria-label="Pilih role" required>
                                    <option selected disabled>Pilih role</option>
                                    <option value="penjual">Penjual</option>
                                    <option value="pembeli">Pembeli</option>
                                </select>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                                <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign up</button>
                            </div>
                            <hr class="my-4">
                            <span>Already have an account? <a href="index.php">Sign In Now</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'template/footer.php' ?>