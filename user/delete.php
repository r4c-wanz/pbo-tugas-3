<?php
require '../config.php';
$id_user = $_GET['id'];
mysqli_query($host,"delete from user where id_user='$id_user'");
header('location:../admin/index.php')
?>