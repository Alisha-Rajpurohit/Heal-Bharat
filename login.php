<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/db.php';
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  

    $sql = "select * from user where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
            }
            else {
                $showError = "Invalid Credentials";
                
            }
        }
    }
    else{
        $showError = "Invalid Credentials";
    
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
    <style>
        body{
            background: url("images/_7.jpg") no-repeat;
            background-size: cover;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30vw;
            height: 80vh;
        }
        img{
            height: 10vh;
            width: 5vw;
            padding: 11px;
        }
        .bg{
            
            background: #e9c1e3;
        }
    </style>
</head>

<body>
    <?php 
        if ($login) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if ($showError) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>' . $showError .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <div class="container my-5">
        <div class="container mt-5 bg-body">
            <img src="images/_1.jpg" alt="loading..." class="mt-4 rounded-circle">
        <h2 class="text-center mt-2">Login to our website</h2>
        <form action="/BlogSystem/login.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="11" class="form-control border-3 border-secondary" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="23" class="form-control border-3 border-secondary" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary mt-3 col-md-12">Login</button>
            <p class="mt-2">Don't have an account? <a href="/BlogSystem/signup.php">Click here</a> to SignUp</p>
        </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>