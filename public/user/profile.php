<?php
session_start();
include '../php/config.php';
if (!isset($_SESSION['user-id'])) {
    header('Location: login.php');
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="user.css">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container-fluid header-div px-0">
        <header id="header" class="navbar navbar-expand-lg navbar-dark bg-dark navbar-shadow">
            <a id="logotitle" class="head-text text-light title logotitle navbar-brand order-lg-1 me-0 pe-lg-3 me-lg-4" href="/">
                RentClick
            </a>
            <div class=" d-flex justify-content-end order-lg-3" style="width: 100%;">
                <ul class="navbar-nav ms-auto text-dark">
                    <li class="nav-item">
                        <a id="head-text" class="head-text nav-link active" href="house.php">Welcome, <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                                                                                                            echo $_SESSION['user'];
                                                                                                        } ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="head-text nav-link btn btn-light text-dark active" style="margin-left: 20px;">Log out</a>
                    </li>
                </ul>


                </nav>
                <button class="navbar-toggler ms-2 me-n3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse1" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

    </div>
    </header>

    <div class="card-main card card-shadow-lg">
        <div class="card-header">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-booking" type="button" role="tab" aria-controls="nav-boooking" aria-selected="true">My Bookings</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                </div>
            </nav>
        </div>



        <div class="card-body">
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-booking" role="tabpanel" aria-labelledby="nav-booking-tab">
                    <h3 class="text-center m-4">My Bookings</h3>
                    <table class="table display table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Description
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = $_SESSION['user-id'];
                            $sql = mysqli_query($conn, "SELECT * FROM bookings WHERE user='$id'");
                            while ($pid = mysqli_fetch_assoc($sql)['content']) {
                                $content = mysqli_query($conn, "SELECT * FROM content WHERE id = $pid");
                                while ($row = mysqli_fetch_assoc($content)) {
                                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>" . $row['description'] . "</td></tr>";
                                }
                            }


                            ?>
                        </tbody>
                    </table>
                </div>





                <div class="tab-pane fade text-center" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <img class="profile-pic" src="profile.svg" alt="Profile Picture">
                    <h2><?php echo $_SESSION['user']; ?></h2>
                    <p><?php echo $_SESSION['user-email']; ?></p>
                    <a href="logout.php">Log out</a>

                </div>

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

</body>

</html>