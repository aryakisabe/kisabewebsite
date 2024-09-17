<?php
include("config.php");
$id_unit = $_GET['id'];

$sql = "DELETE FROM tbl_jenis_unit WHERE `id_unit` = '".$id_unit."'";
mysqli_query($db, $sql);

header('location:unit_read.php');
?>