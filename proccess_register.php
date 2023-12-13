<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (!$_POST['role']) {
    $role = 'pembeli';
} else {
    $role = $_POST['role'];
}

$register = mysqli_query($host, "insert into user values(null,'$username','$password','pembeli')");

if ($register) {
    if ($role == "pembeli") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "pembeli";
        header("location:pembeli/index.php");
    } elseif  ($role == "penjual") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "penjual";
        header("location:penjual/index.php");
    } else {
        header("location:register.php?m=fail");
    }
} else {
    header("location:register.php?m=fail");
}