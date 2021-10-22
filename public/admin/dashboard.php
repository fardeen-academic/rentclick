<?php
    session_start();
    include '../php/config.php';
    if(!isset($_SESSION['admin-name'])){
        header('Location: login.php');
    }

    if(isset($_POST['u-name']) and isset($_POST['u-price']) and isset($_POST['u-description'])){
        $target = "../content/".basename($_FILES['image']['name']);
        $name = $_POST['u-name'];
        $price = $_POST['u-price'];
        $type = $_POST['u-type'];
        $desc = $_POST['u-description'];
        $file = $_FILES['image']['name'];
        $save = "INSERT INTO `content`(`name`, `type`, `image`, `description`, `price`) VALUES ('$name', '$type', '$file', '$desc', '$price')";
        mysqli_query($conn, $save);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg = "Content Uploaded Successfully";
        }else{
            $msg = "Something bad happened.";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">   
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>
<body>
<?php include 'header.php'?>

    <div class="card-main card card-shadow-lg">
        <div class="card-header">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-booking" type="button" role="tab" aria-controls="nav-boooking" aria-selected="true">Bookings</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="false">Users</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contents" type="button" role="tab" aria-controls="nav-contents" aria-selected="false">Contents</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-new-content" type="button" role="tab" aria-controls="nav-new-content" aria-selected="false">Add New Content</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button> 
            </div>
            </nav>
        </div>



        <div class="card-body">
        <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-booking" role="tabpanel" aria-labelledby="nav-booking-tab">
    <h3 class="text-center m-4">All Bookings</h3>
        <table class="table display table-hover" id="datatable">
            <thead>
                <tr>
                    <th>
                        Booking ID
                    </th>
                    <th>
                        Content Name
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Booked By
                    </th>
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            $sql = mysqli_query($conn, "SELECT * FROM bookings");
            
            while($row = mysqli_fetch_assoc($sql)){
                $pid = $row['content'];
                $uid = $row['user'];
                $content = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM content WHERE id = $pid"));
                $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $uid"));
                echo "<tr><td>".$row['id']."</td><td>".$content['name']."</td><td>".$content['type']."</td><td>".$content['price']."</td><td>".$user['name']."</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    
    <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
    <h3 class="text-center m-4">All Users</h3>
        <table class="table display table-hover" id="usertable">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $sql = mysqli_query($conn, "SELECT * FROM user");
            while($row = mysqli_fetch_assoc($sql)){
                echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    
    
    <!--############### Contents tab ###############-->
    <div class="tab-pane fade" id="nav-contents" role="tabpanel" aria-labelledby="nav-contents-tab">
        <h3 class="text-center m-4">All Contents</h3>
        <table class="table display table-hover" id="datatable">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Description
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $sql = mysqli_query($conn, "SELECT * FROM content");
            while($row = mysqli_fetch_assoc($sql)){
                echo "<tr><td>".$row['name']."</td><td>".$row['price']."</td><td>".$row['type']."</td><td>".$row['description']."</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>


    <!--############### New Content tab ###############-->
    <div class="tab-pane fade text-center" id="nav-new-content" role="tabpanel" aria-labelledby="nav-new-content-tab">
        <form action="" method="POST" enctype="multipart/form-data">
        <h3 class="m-4">Add New Content</h3>
        <div class="form-floating mb-4">
            <input class="form-control" name="u-name" type="text" id="fl-text" placeholder="Your name">
            <label for="fl-text">Content Name</label>
        </div>
        <div class="form-floating mb-4">
            <input class="form-control" name="u-price" type="number" id="fl-text" placeholder="Price">
            <label for="fl-text">Price</label>
        </div>
        <div class="form-floating mb-4">
            <select class="form-select" name="u-type" id="fl-select">
                <option selected>Choose..</option>
                <option>House</option>
                <option>Car</option>
            </select>
            <label for="fl-select">Type</label>
        </div>

        <div class="form-floating mb-4">
        <textarea class="form-control" name="u-description" id="fl-textarea" style="height: 150px;" placeholder="Description"></textarea>
        <label for="fl-textarea">Description</label>
        </div>
        <div class="mb-4">
            <input class="form-control" name="image" type="file" id="formFile">
        </div>
        <button class="btn btn-primary" name="upload" type="submit" style="width: 100%;">Add Content</button>
        </form>
        <P><?php echo $msg; ?></p>
    </div>
    

    <div class="tab-pane fade text-center" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <img class="profile-pic" src="profile.svg" alt="Profile Picture">    
        <h2><?php echo $_SESSION['admin-name'];?></h2>
        <p><?php echo $_SESSION['admin-email'];?></p>
        <a href="logout.php">Log out</a>
            
    </div>
    
    </div>
        </div>
    </div>

   
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
            $('#usertable').DataTable();
        } );
    </script>
    
</body>
</html>


