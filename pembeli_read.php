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
<div class="container mt-3">
        <h1>DATA UNIT</h1>
    <a href="pembeli_create.php" class="btn btn-primary mb-3">Tambah Data Pembeli</a>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>No Identitas</th>
                <th>No Hp</th>
                <th>Jenis Unit</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT tbl_pembeli.*, tbl_jenis_unit.*, tbl_adminn.namaa as namaa_adminn from tbl_pembeli
            join tbl_jenis_unit on tbl_pembeli.id_unit=tbl_jenis_unit.id_unit join tbl_adminn
            on tbl_pembeli.id_adminn=tbl_adminn.id_adminn";
            $query = mysqli_query($db, $sql);
            $no=1;

            while($data = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$no++."</td>";
                echo "<td>".$data['namaa']."</td>";
                echo "<td>".$data['no_identitas']."</td>";
                echo "<td>".$data['no_hp']."</td>";
                echo "<td>".$data['jenis_unit']."</td>";
                echo "<td>".$data['jumlah']."</td>";
                echo "<td>".$data['total']."</td>";
                echo "<td>";
                echo "<a href='pembeli_update.php?id=".$data['id_pembeli']."' class='btn btn-sm btn-primary'>Edit</a>";
                echo "<a href='pembeli_delete.php?id=".$data['id_pembeli']."' class='btn btn-sm btn-danger ms-1'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
