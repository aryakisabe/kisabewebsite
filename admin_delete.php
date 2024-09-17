<?php
include("config.php");
$id_adminn = $_GET['id'];

$sql = "DELETE FROM tbl_adminn WHERE `id_adminn` = '".$id_adminn."'";
mysqli_query($db, $sql);

header('location:admin_read.php');
?>