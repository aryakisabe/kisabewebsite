<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_rumah";

$db = mysqli_connect($server, $user, $password, $nama_database);

if(!$db){
    die("gagal terhubung:" . mysqli_connect_error());
}

session_start();