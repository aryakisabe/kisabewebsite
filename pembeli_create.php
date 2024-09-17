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
   
<?php
    include("config.php");
    // Periksa apakah pengguna sudah login dan memiliki status admin
    if (!isset($_SESSION['id_adminn'])){
        die("Anda harus menjadi admin untuk menambah data");
    }

    if (isset($_POST['namaa'])) {
        $namaa = $_POST['namaa'];
        $no_identitas = $_POST['no_identitas'];
        $no_hp = $_POST['no_hp'];
        $id_unit = $_POST['id_unit'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];

        // Ambil id_admin dari sesi login
        $id_adminn = $_SESSION['id_adminn'];

        $sql = "INSERT INTO `tbl_pembeli`(`id_unit`, `namaa`, `checkin`, `checkout`, `no_identitas`, `no_hp`, `id_adminn`, `jumlah`, `total`)
                VALUES ('$id_unit', '$namaa', '$checkin', '$checkout', '$no_identitas', '$no_hp', '$id_adminn', '$jumlah', '$total')";

        mysqli_query($db, $sql);
       
        header("Location: pembeli_read.php");
        exit();
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
    <h1>Data Unit</h1>

    
    <hr>

    <div class="row">
        <div class="col">
            <h3>Form Pemmesanan</h3>
        </div>
    </div>
    <form method="POST">
        <table class="table">
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="namaa" class="form-control"></td>
            </tr>
            <tr>
                <td>No Identitas</td>
                <td><input type="text" name="no_identitas" class="form-control"></td>
            </tr>
            <tr>
                <td>No HandPhone</td>
                <td><input type="text" name="no_hp" class="form-control"></td>
            </tr>
            <tr>
                <td>Jenis Unit</td>
                <td>
                    <select name="id_unit" id="jenis_unit" class="form-select">
                        <?php
                            $sql ="SELECT * FROM tbl_jenis_unit";
                            $query = mysqli_query($db, $sql);
                            while ($unit = mysqli_fetch_array($query)) {
                                echo "<option value=".$unit['id_unit']." data-harga='".$unit['harga']."'>
                                ".$unit['jenis_unit']." - RP ".$unit['harga']."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Check In</td>
                <td><input type="date" name="checkin" class="form-control"></td>
            </tr>
            <tr>
                <td>Check Out</td>
                <td><input type="date" name="checkout" class="form-control"></td>
            </tr>
            <tr>
                <td>Jumlah Unit</td>
                <td><input type="text" name="jumlah" id="jumlah_unit" class="form-control"></td>
            </tr>
            <tr>
                <td>Total Pembayaran</td>
                <td><input type="text" name="total" id="total_bayar" readonly class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="button" id="btn_hitung" onclick="hitungtotal()" class="btn btn-primary">Hitung Total Bayar</button>
                    <input type="submit" value="Simpan Transaksi" class="btn btn-success"></input>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    function hitungtotal() {
        var jk = document.getElementById("jenis_unit");
        var harga = jk.options[jk.selectedIndex].dataset.harga;
        var jumlah_unit = document.getElementById("jumlah_unit").value;
        var total = harga * jumlah_unit;
        document.getElementById("total_bayar").value = total;
    }
</script>

</body>

</html>