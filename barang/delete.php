<?php
require '../config.php';
$id_barang = $_GET['id'];
mysqli_query($host,"delete from barang where id_barang='$id_barang'");
header('location:../admin/index.php')
?>