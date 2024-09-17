<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include("config.php");?>
    <?php
    if (isset($_POST['usernamee'])) {
        $usernamee = $_POST['usernamee'];
        $passwordd = $_POST['passwordd'];

        $sql = "SELECT * FROM `tbl_adminn` WHERE `usernamee` = '".$usernamee."' AND `passwordd` = '".$passwordd."'";
        $query = mysqli_query($db, $sql);
        $data = mysqli_fetch_array($query);

        if (mysqli_num_rows($query)>0) {
            session_start();
            $_SESSION['status']=$data['login'];
            $_SESSION['id_adminn']=$data['id_adminn'];
            $_SESSION['namaa']=$data['namaa'];
            $_SESSION['usernamee']=$data['usernamee'];
            header('location:index.php');
        } else {
            echo "Password Salah";
        }
    }
    ?>
    <div class="container mt-5">
        <h1 class="text-center">Kisabe Showroom</h1>
        <form method="POST">
            <div class="mb-3 row">
                <label for="usernamee" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="usernamee" name="usernamee" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="passwordd" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordd" name="passwordd" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-10 offset-sm-2">
                    <input type="submit" class="btn btn-primary" value="Login" style="width:100%;">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
