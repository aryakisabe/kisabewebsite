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

    $id_adminn=$_GET['id'];

    $sql = "SELECT * FROM tbl_adminn where id_adminn='".$id_adminn."'";
    $query = mysqli_query($db, $sql);

    $data = mysqli_fetch_array($query);

    if (isset($_POST['namaa'])) {
        $namaa = $_POST['namaa'];
        $usernamee = $_POST['usernamee'];
        $passwordd = $_POST['passswordd'];

        $sql = "UPDATE `tbl_adminn` SET
        `namaa` = '".$namaa."',
        `usernamee` = '".$usernamee."',
        `passwordd` = '".$passwordd."'";

        mysqli_query($db, $sql);

        header('location:admin_read.php');

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

<h1>DATA RUMAH</h1>


<hr>

<form method="POST" action="admin_update.php?id=<?=$id_adminn?>">
    <table border=1>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="namaa" value="<?=$data['namaa']?>"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="usernamee" value="<?=$data['usernamee']?>">></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><textarea name="passwordd" rows="4" cols="50"><?=$data['passwordd']?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Simpan"></td>
        </tr>
    </table>
</form>
    
</body>
</html>