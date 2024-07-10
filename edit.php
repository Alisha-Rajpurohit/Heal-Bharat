<?php include 'partials/db.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Category = $_POST['Category'];
    $Title = $_POST['Title'];
    $Content = $_POST['Content'];
    $Id = $_POST['Id'];

    $updateSql = "UPDATE `posts` SET `Category` = '$Category', `Title` = '$Title', `Content` = '$Content' WHERE `posts`.`Id` = $Id;";

    $result = mysqli_query($conn,$updateSql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit/Delete post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body{
        background: url("_7.jpg");
        background-size: cover;
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="/BlogSystem/welcome.php">BlogMania</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="/BlogSystem/welcome.php">Home</a>
                </li>
                <li><a class="nav-link" href="/BlogSystem/create.php">Add Post</a></li>
                <li><a class="nav-link active" href="/BlogSystem/edit.php">Update/Delete Post</a></li>
              </ul>
                <div class="mx-2">
                  <a class="btn btn-primary" href="/BlogSystem/logout.php" role="button">Logout</a>
                </div>
            </div>
          </div>
        </nav>
    <div class="container my-5">
        <table class="table table-responsive table-bordered table-hover">
        <thead class="table-dark text-dark">
            <tr>
            <th scope="col">Sr_no.</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider border-white table-info">
            <?php 
                $edit_sql = "SELECT * FROM `posts`
                             ORDER BY Created_at DESC";
                $edit_result = mysqli_query($conn, $edit_sql);
                $num = mysqli_num_rows($edit_result);
                if ($num > 0) {
                    $i = 1;
                    while($row = mysqli_fetch_assoc($edit_result)){
                    echo '<tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$row['Title'].'</td>
                            <td>'.$row['Content'].'</td>
                            <td> <form action="/BlogSystem/update.php" method="post">
                            <input type="hidden" name="Id" id="" value="'.$row['Id'].'">
                            <button class="btn btn-success" type="submit">Edit</button></form></td>
                            <td> <form action="/BlogSystem/delete.php" method="post">
                            <input type="hidden" name="Id" id="" value="'.$row['Id'].'">
                            <button class="btn btn-danger" type="submit">Delete</button></form> </td>
                        </tr>';
                        $i++;
                    };
                };
            ?>
            
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</html>
