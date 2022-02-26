<?php
session_start();
require_once ('./config.php');

$firstname =mysqli_real_escape_string($conn,$_POST["firstname"]);
$surname = mysqli_real_escape_string($conn,$_POST["surname"]);
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$password = mysqli_real_escape_string($conn,$_POST["password"]);
$password = md5($password);

if (isset($_POST["register"])) {
    # code...
    if (empty($_POST["firstname"]) && empty($_POST["surname"])&& empty($_POST["password"]) ) {
        # code...
        echo '<script>alert("All fields should be filled")</script>';
    } else {
        # code...
        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($duplicate)>0) {
            # code...
            echo '<script>alert("Email already exist!")</script>';
        } else {
            # code...
            $query = "INSERT INTO `users`(`firstname`,`surname`,`email`,`password`) VALUES('$firstname','$surname','$email','$password')";
            if (mysqli_query($conn,$query)) {
                # code...
                echo '<script>alert("Registered successfully!")</script>';
            } else {
                # code...
                echo '<script>alert("oops! something happened!")</script>';
            }
            
        }
        
    }
    
}

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/main.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-2 form ">
                <h3 class="text-center">Register form</h3>
                <form action="" method="post">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" id="" class="form-control" placeholder="first name">
                    <label for="">Surname</label>
                    <input type="text" name="surname" id="" class="form-control" placeholder="first name">
                    <label for="">Email address</label>
                    <input type="text" name="email" id="" placeholder="Type your email address" class="form-control">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" placeholder="Type your password" class="form-control">
                    <input type="submit" value="Register" name="register" class="btn btn-success btn-block mt-2">
                    <a href="index.php" class="btn btn-warning btn-block mt-2"> Login</a>
                </form>
            </div>
        </div>
    </div>

    <script src="" async defer></script>
</body>

</html>