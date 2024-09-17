<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include("config.php"); ?>
    <?php

    $id_unit=$_GET['id'];

    $sql = "SELECT * FROM tbl_jenis_unit where id_unit='".$id_unit."'";
    $query = mysqli_query($db, $sql);

    $data = mysqli_fetch_array($query);

    if (isset($_POST['jenis_unit'])) {
        $jenis_unit = $_POST['jenis_unit'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];

        $sql = "UPDATE `tbl_jenis_unit` SET
        `jenis_unit` = '".$jenis_unit."',
        `harga` = '".$harga."',
        `keterangan` = '".$keterangan."'";

        mysqli_query($db, $sql);

        header('location:unit_read.php');

    }
    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="unit_read.php">Data Unit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_read.php">Data Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pembeli_read.php">Data Pembeli</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h1>DATA UNIT</h1>


<hr>

<form method="POST" action="unit_update.php?id=<?=$id_unit?>">
    <table border=1>
        <tr>
            <td>Jenis Unit</td>
            <td><input type="text" name="jenis_unit" value="<?=$data['jenis_unit']?>"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" value="<?=$data['harga']?>">></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><textarea name="keterangan" rows="4" cols="50"><?=$data['keterangan']?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Simpan"></td>
        </tr>
    </table>
</form>
    
</body>
</html>