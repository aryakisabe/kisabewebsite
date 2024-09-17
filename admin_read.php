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
        <a href="admin_create.php" class="btn btn-primary mb-3">Tambah Data Admin</a>

        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_adminn";
                $query = mysqli_query($db, $sql);
                while($data = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$data['namaa']."</td>";
                    echo "<td>".$data['usernamee']."</td>";
                    echo "<td>";
                    echo "<a href='admin_update.php?id=".$data['id_adminn']."' class='btn btn-sm btn-primary'>Edit</a>";
                    echo "<a href='admin_delete.php?id=".$data['id_adminn']."' class='btn btn-sm btn-danger ms-1'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
