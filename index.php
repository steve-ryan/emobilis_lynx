<?php
session_start();
require_once ('./config.php');

// if (isset($_SESSION["firstname"])) {
//     # code...
//     header("location:dashboard.php");
// }


$email = mysqli_real_escape_string($conn,$_POST["email"]);
$password = mysqli_real_escape_string($conn,$_POST["password"]);
$password = md5($password);

if (isset($_POST["login"])) {
    # code...
    if (empty($_POST["email"]) && empty($_POST["password"])) {
        # code...
        echo '<script>alert("Fill all fields")</script>';
    } else {
        # code...
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0) {
            # code...
             $firstname = $_SESSION['firstname'];
            echo "$firstname";
            // header("location:dashboard.php");
        } else {
            # code...
            echo '<script>alert("Wrong credentials!")</script>';
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
                <h3 class="text-center">Login form</h3>
                <form action="" method="post">
                    <label for="">Email address</label>
                    <input type="text" name="email" id="" placeholder="Type your email address" class="form-control">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" placeholder="Type your password" class="form-control">
                    <input type="submit" value="Login" name="login" class="btn btn-success btn-block mt-2">
                    <a href="./register.php" class="btn btn-warning btn-block mt-2"> Register</a>
                </form>
            </div>
        </div>
    </div>

    <script src="" async defer></script>
</body>

</html>