<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>RentClick</title>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <script>
    var myNav = document.getElementById('header');
    window.onscroll = function() {
      "use strict";
      if (document.body.scrollTop >= 200) {
        myNav.classList.add("bg-light");
        myNav.classList.remove("nav-transparent");
      } else {
        myNav.classList.add("nav-transparent");
        myNav.classList.remove("nav-colored");
      }
    };
  </script>
</head>

<body>

  <div class="container-fluid header-div px-0">
    <header id="header" class="navbar navbar-expand-lg navbar-transparent navbar-shadow">
      <a id="logotitle" class="head-text text-light title logotitle navbar-brand order-lg-1 me-0 pe-lg-3 me-lg-4" href="/">
        RentClick
      </a>
      <div class=" d-flex justify-content-end order-lg-3" style="width: 100%;">
        <ul class="navbar-nav ms-auto text-dark">
          <li class="nav-item">
            <a id="head-text" class="head-text nav-link active" href="house.php">House</a>
          </li>
          <li class="nav-item">
            <a id="head-text2" class="head-text nav-link active" href="cars.php">Cars</a>
          </li>


          <?php
          if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            echo '<li class="nav-item"><a class="head-text nav-link active" href="user/profile.php">Profile</a></li>
          </ul>
                    <a class="head-text btn btn-dark d-sm-inline-block d-none ms-3" href="user/logout.php">Logout</a>';
          } else {
            echo '</ul><a class="head-text btn btn-dark d-sm-inline-block d-none ms-3" href="user/login.php">Login</a>';
          }
          ?>
          </nav>
          <button class="navbar-toggler ms-2 me-n3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse1" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
          </button>
      </div>

  </div>
  </header>

  <?php include 'login.php' ?>