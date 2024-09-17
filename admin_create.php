<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <?php include("config.php"); ?>
    
    <?php
    if(isset($_POST['namaa'])){
        $namaa = $_POST['namaa'];
        $usernamee = $_POST['usernamee'];
        $passwordd = $_POST['passwordd'];

        $sql = "INSERT INTO `tbl_adminn` (`namaa`, `usernamee`, `passwordd`)
        VALUES ('".$namaa."','".$usernamee."','".$passwordd."')";

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

    <div class="container mt-3">
        <h1>DATA ADMIN</h1>

        <hr>

        <form method="POST" class="mb-3">
            <div class="mb-3">
                <label for="namaa" class="form-label">Nama</label>
                <input type="text" name="namaa" class="form-control" id="namaa">
            </div>
            <div class="mb-3">
                <label for="usernamee" class="form-label">Username</label>
                <input type="text" name="usernamee" class="form-control" id="usernamee">
            </div>
            <div class="mb-3">
                <label for="passwordd" class="form-label">Password</label>
                <input type="password" name="passwordd" class="form-control" id="passwordd">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>
</html>
