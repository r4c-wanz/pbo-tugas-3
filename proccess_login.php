<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($host, "select * from user where username='$username' and password='$password'");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['role'] == "pembeli") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "pembeli";
        header("location:pembeli/index.php");
    } elseif ($data['role'] == "penjual"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "penjual";
        header("location:penjual/index.php");
    } elseif ($data['role'] == "admin"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        header("location:admin/index.php");
    } else{
        header("location:index.php?m=fail");
    }
} else{
    header("location:index.php?m=not-found");
}