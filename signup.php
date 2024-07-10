<?php 
$showSuccess = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $existSql = "SELECT * FROM `user` WHERE `username` LIKE '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRow = mysqli_num_rows($result);
    if($numExistRow > 0){
        $showError = "Username Already Exists! ";
       
    }
    else{
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                $showSuccess = true;
            }
        }
        else {
            $showError = "Password doesn't matched";
           
        }
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

    <title>SignUp</title>
    <style>
        body{
            background: url("_7.jpg") no-repeat;
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
        if ($showSuccess) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login, Want to login?
            <a href="/BlogSystem/login.php">Click here</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            
            </div>
            ';
        }
        if ($showError) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>' . $showError .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <div class="container my-5 ">
    <div class="container mt-4 bg-body">
    <img src="_1.jpg" alt="loading..." class="mt-4 rounded-circle">
    <h2 class="text-center mt-2">SignUp to continue...</h2>
        <form action="/BlogSystem/signup.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="11" class="form-control border-3 border-secondary" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="23" class="form-control border-3 border-secondary" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" maxlength="23" class="form-control border-3 border-secondary" id="cpassword" name="cpassword">
                <div id="emailHelp" class="form-text">Confirm Password and Password must be same.</div>
            </div>
            <button type="submit" class="btn btn-primary col-md-12">SignUp</button>
            <p class="mt-2">Already have an account? <a href="/BlogSystem/login.php">Click here</a> to Login</p>
        </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>
