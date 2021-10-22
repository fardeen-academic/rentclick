<?php
session_start();
if(isset($_POST['email'])){
    include '../php/config.php';
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $select = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password= '$pass'");
    $row = mysqli_fetch_array($select);
    if (is_array($row)){
        $_SESSION['admin-email'] = $row['email'];
        $_SESSION['admin-name'] = $row['name'];
        header('Location: dashboard.php');
    }else{
        echo "<script type='text/javascript'>alert('Invalid Email or Password');
        window.location.href='';
        </script>";
    }

    if(isset($_SESSION['email'])){
        header('Location: dashboard.php');
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <title>Admin Login</title>
</head>
<body style="padding: 8%; background-color: #1E212C">
    <div class="m-4 mx-5 text-center">
    <form action="login.php" method="POST">
        
        <div class="card text-center p-3 pb-0" style="margin: auto 37%;">
        <div class="card-header">
        <h2 class="card-title text-primary mt-3">RentClick</h2>
        <h4 class="card-title my-3">Admin Login</h4>
        </div>
        
        <div class="card-body mt-3">
            <div class="input-group mb-4">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>    
            <div class="input-group mb-4">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="pass" class="form-control" placeholder="Password">
            </div>
            <div class="d-grid">
            <button class="btn btn-primary" type="submit">Login</button>
            </div>
            <div class="card-footer text-muted mt-4">
                <p>Forgot password?</p>
            </div>
        </div>
        </div>
    </form>
    </div>
</body>
</html>