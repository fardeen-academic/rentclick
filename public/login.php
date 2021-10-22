<?php
session_start();
include 'php/config.php';
if (isset($_POST['loginemail']) and isset($_POST['loginpass'])){
    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];
    $query = "SELECT * from user WHERE email='$email' AND password='$pass'";
    $select = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($select);
    if (is_array($row)){
        $_SESSION['user'] = $row['name'];
        $_SESSION['user-id'] = $row['id'];
        $_SESSION['user-email'] = $row['email'];
        header('Location: /user/profile.php');
    }else{
        echo "<script type='text/javascript'>alert('Invalid Email or Password');
        window.location.href='index.php';
        </script>";
    }
}

if (isset($_POST['signupname']) and isset($_POST['signupemail']) and isset($_POST['signuppass'])){
    $name = $_POST['signupname'];
    $email = $_POST['signupemail'];
    $pass = $_POST['signuppass'];
    $query = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";
    
    if (mysqli_query($conn, $query)){
        $_SESSION['user'] = $email;
        $_SESSION['user-email'] = $email;
        header('Location: /user/profile.php');
    }else{
        echo "<script type='text/javascript'>alert('Error: " . $query . "<br>" . mysqli_error($conn);");
        window.location.href='index.php';
        </script>";
    }
}


?>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body" style="margin-top: 20px;">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#log-in" type="button" role="tab" aria-controls="home" aria-selected="true">Log in</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#sign-up" type="button" role="tab" aria-controls="profile" aria-selected="false">Sign up</button>
        </li>
        </ul>
            <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="log-in" role="tabpanel" aria-labelledby="home-tab">
                <form action="" method="POST" class="form">
                    <h3 class="text-center">Log in</h3>
                    <div class="mb-3">
                        <label for="email1" class="form-label">Email address</label>
                        <input class="form-control" type="email" name="loginemail" id="email1" placeholder="johndoe@example.com">
                    </label></div>
                    <div class="mb-3">
                        <label for="pass1" class="form-label">Password</label>
                        <div class="password-toggle">
                        <input class="form-control" type="password" name="loginpass" id="pass1">
                        </div>
                    </div>
                    <div class="mb-3 d-flex flex-wrap justify-content-between">
                        <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a class="fs-sm" href="#">Forgot password?</a>
                    </div>
                    <button class="btn btn-primary" type="submit">Log in</button>
                </form>
            </div>


            <div class="tab-pane fade" id="sign-up" role="tabpanel" aria-labelledby="profile-tab">
            <form action="" method="POST" class="form">
                    <h3 class="text-center">Sign Up</h3>
                    <div class="mb-3">
                        <label for="email1" class="form-label">Name</label>
                        <input class="form-control" name="signupname" type="name" id="name" placeholder="John Doe">
                    </label>
                    </div>

                    <div class="mb-3">
                        <label for="email1" class="form-label">Email address</label>
                        <input class="form-control" type="email" name="signupemail" id="email1" placeholder="johndoe@example.com">
                    </label>
                    </div>

                    <div class="mb-3">
                        <label for="pass1" class="form-label">Password</label>
                        <div class="password-toggle">
                        <input class="form-control" type="password" name="signuppass" id="pass1">
                        </div>
                    </div>

                    <div class="mb-3 d-flex flex-wrap justify-content-between">
                        <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a class="fs-sm" href="#">Forgot password?</a>
                    </div>
                    <button class="btn btn-primary d-block" type="submit">Sign Up</button>
                </form>
            </div>
      </div>
      
    
    </div>
  </div>
</div>
</div>