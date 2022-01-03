<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up | rentclick</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <div class="container main" id="main2">
        <div class="title">
            <a href="../index.php">
                <h1>rentclick</h1>
            </a>
        </div>
        <div class="container" id="form-div">
            <form class="needs-validation" onsubmit="return validation();" id="register-form" action="signup-driver.php" method="POST">
                <h3 class="text-center">Sign Up</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" name="name" type="name" id="name" placeholder="John Doe">
                    <div class="invalid-feedback" id="name-error">Name can only contain characters, dot(.) and space( ).</div>
                    </label>
                </div>

                <div class="mb-3">
                    <label for="nid" class="form-label">NID</label>
                    <input class="form-control" name="nid" type="number" id="nid" placeholder="0101010101">
                    <div class="invalid-feedback" id="nid-error">NID should be 10/13/17 digits.</div>
                </div>

                <label for="phone" class="form-label">Phone Number</label>

                <div class="input-group mb-3">
                    <span class="input-group-text">+880</span>
                    <input class="form-control" type="number" name="phone" id="phone" placeholder="17XXXXXXXX">
                    <div class="invalid-feedback" id="phone-error">Enter the number without 0</div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="johndoe@example.com">
                    <div class="invalid-feedback" id="email-error">Enter a valid email</div>
                </div>

                <div class="mb-3">
                    <label for="pass1" class="form-label">Password</label>
                    <div class="password-toggle">
                        <input class="form-control" type="password" name="pass" id="pass" placeholder="Password">
                        <div class="invalid-feedback" id="pass-error">Password should be minimum 6 digits.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pass2" class="form-label">Retype Password</label>
                    <div class="password-toggle">
                        <input class="form-control" type="password" name="pass2" id="pass2" placeholder="Password">
                        <div class="invalid-feedback" id="pass2-error">Password didn't match.</div>
                    </div>
                </div>
                <button class="btn btn-primary d-block w-100" type="submit">Sign Up</button>
                <p class="text-center mt-4">Already signed up? <a href="login.php">Log in</a></p>
            </form>
        </div>
    </div>


    <script type='text/javascript' src="../js/validation.js"></script>

</body>

</html>