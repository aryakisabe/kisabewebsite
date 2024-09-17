<?php
include("config.php");
$id_pembeli = $_GET['id'];

$sql = "DELETE FROM tbl_pembeli WHERE `id_pembeli` = '".$id_pembeli."'";
mysqli_query($db, $sql);

header('location:pembeli_read.php');
?>