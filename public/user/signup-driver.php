<?php

session_start();
include '../php/config.php';

if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['pass'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $nid = $_POST['nid'];
    $phone = $_POST['phone'];
    $query = "INSERT INTO `user`(`name`, `email`, `password`, `nid`, `phone`) VALUES ('$name', '$email', '$pass', '$nid', '$phone')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['user'] = $email;
        $_SESSION['user-email'] = $email;
        header('Location: profile.php');
    } else {
        echo "<script type='text/javascript'>alert('Error: " . $query . "<br>" . mysqli_error($conn);
        ");
        </script>";
        header('Location: signup.php');
    }
}
