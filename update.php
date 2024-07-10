<?php
include 'partials/db.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Id = $_POST['Id'];
    $sql = "SELECT * FROM `posts` WHERE Id = '$Id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}
echo '

<title>Edit Form</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 
<style>
    body{
     
        background: url("_7.jpg");
        background-size: cover;
    }
</style>

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

<div class="container my-4">
    <form action="/BlogSystem/edit.php" method="post">
            <input type="hidden" name="Id" value="'.$row['Id'].'">
            <div class="mb-3">
                <label for="Category" class="form-label">Category</label>
                <input type="text" class="form-control border-3 border-secondary" id="Category" name="Category" value="'.$row['Category'].'">
            </div>
            <div class="mb-3">
                <label for="Title" class="form-label">Title</label>
                <input type="text" class="form-control border-3 border-secondary" id="Title" name="Title" value="'.$row['Title'].'">
            </div>
            <div class="mb-3">
                <label for="Content" class="form-label">Content</label>
                <input type="textarea" class="form-control border-3 border-secondary" id="Content" name="Content" style="height : 200px" value="'.$row['Content'].'">
            </div>
            <button type="submit" class="btn btn-success">Update_Post</button>
            <button type="reset" class="btn btn-danger">Discard_Updates</button>
        </form>
        
    </div>';
?>

