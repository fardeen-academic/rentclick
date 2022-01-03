<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../php/config.php';
if (isset($_SESSION['user-id'])) {
    header('Location: profile.php');
}
if (isset($_POST['loginemail']) and isset($_POST['loginpass'])) {
    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];
    $query = "SELECT * from user WHERE email='$email' AND password='$pass'";
    $select = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($select);
    if (is_array($row)) {
        $_SESSION['user'] = $row['name'];
        $_SESSION['user-id'] = $row['nid'];
        $_SESSION['user-email'] = $row['email'];
        header('Location: profile.php');
    } else {
        echo "<script type='text/javascript'>alert('Invalid Email or Password');
        window.location.href='index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | rentclick</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <div class="container main" id="main">
        <div class="title">
            <a href="../index.php">
                <h1>rentclick</h1>
            </a>
        </div>
        <div class="container" id="form-div">
            <form action="" method="POST" class="form">
                <h3 class="text-center">Log in</h3>
                <div class="mb-2">
                    <label for="email1" class="form-label">Email address</label>
                    <input class="form-control" type="email" name="loginemail" id="email1" placeholder="johndoe@example.com">
                    </label>
                </div>
                <div class="mb-4">
                    <label for="pass1" class="form-label">Password</label>
                    <div class="password-toggle">
                        <input class="form-control" type="password" name="loginpass" id="pass1" placeholder="Password">
                    </div>
                </div>
                <button class="btn btn-primary w-100" type="submit">Log in</button>
                <p class="text-center mt-4">Don't have an account? <a href="signup.php">Sign up</a></p>
            </form>
        </div>
    </div>

</body>

</html>