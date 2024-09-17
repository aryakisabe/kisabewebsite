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

    $id_pembeli = $_GET['id'];

    $sql = "SELECT * FROM tbl_pembeli WHERE id_pembeli='".$id_pembeli."'";
    $query = mysqli_query($db, $sql);

    // Check if data is fetched successfully
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
    } else {
        echo "Data not found.";
        exit; // Stop further execution if data is not found
    }

    if (isset($_POST['namaa'])) {
        $namaa = $_POST['namaa'];
        $no_identitas = $_POST['no_identitas'];
        $no_hp = $_POST['no_hp'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];

        // Assuming `jenis_kamar` is the correct column name
        $sql = "UPDATE `tbl_pembeli` SET
        `namaa` = '".$namaa."',
        `no_identitas` = '".$no_identitas."',
        `no_hp` = '".$no_hp."',
        `jumlah` = '".$jumlah."',
        `total` = '".$total."'
        WHERE id_pembeli='".$id_pembeli."'";

        mysqli_query($db, $sql);

        header('location:pembeli_read.php');
        exit; // Stop further execution after redirection

    }
    ?>
<div class="container">
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
<h1 class="mt-3">DATA UNIT</h1>

<hr>

<form method="POST" action="penyewa_update.php?id=<?=$id_sewa?>">
    <table class="table table-bordered">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="namaa" class="form-control" value="<?= isset($data['namaa']) ? $data['namaa'] : '' ?>"></td>
        </tr>
        <tr>
            <td>No Identitas</td>
            <td><input type="text" name="no_identitas" class="form-control" value="<?= isset($data['no_identitas']) ? $data['no_identitas'] : '' ?>"></td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td><input type="text" name="no_hp" class="form-control" value="<?= isset($data['no_hp']) ? $data['no_hp'] : '' ?>"></td>
        </tr>
        <!-- Ensure that the column name is correct -->
        <tr>
            <td>Jenis Unit</td>
            <td><input type="text" name="jenis_unit" class="form-control" value="<?= isset($data['jenis_unit']) ? $data['jenis_unit'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" class="form-control" value="<?= isset($data['jumlah']) ? $data['jumlah'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><input type="text" name="total" class="form-control" value="<?= isset($data['total']) ? $data['total'] : '' ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="btn btn-primary" value="Simpan"></td>
        </tr>
    </table>
</form>
    
</body>
</html>
