<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
header("location: login.php");
exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body{
     
        background: url("images/_7.jpg");
        background-size: cover;
    }
</style>
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
                <li><a class="nav-link active" href="/BlogSystem/create.php">Add Post</a></li>
                <li><a class="nav-link" href="/BlogSystem/edit.php">Update/Delete Post</a></li>
              </ul>
                <div class="mx-2">
                  <a class="btn btn-primary" href="/BlogSystem/logout.php" role="button">Logout</a>
                </div>
            </div>
          </div>
        </nav>
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb mx-15">
                <li class="breadcrumb-item"><a href="#">Topics</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add_Post</li>
            </ol>
        </nav>
        <div class="container my-4">
        <form action="store.php" method="post">
            <div class="mb-3">
                <label for="post_category" class="form-label">Category</label>
                <input type="text" class="form-control border-3 border-secondary" id="post_category" name="post_category">
            </div>
            <div class="mb-3">
                <label for="post_title" class="form-label">Title</label>
                <span style="color: red; font-weight: bolder">  *  </span>
                <input type="text" class="form-control border-3 border-secondary" id="post_title" name="post_title" required>
            </div>
            <div class="mb-3">
                <label for="post_content" class="form-label">Content</label>
                <span style="color: red; font-weight: bolder">  *  </span>
                <textarea class="form-control border-3 border-secondary" id="post_content" name="post_content" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-success">Add_Post</button>
            <button type="reset" class="btn btn-danger">Discard_Post</button>
            </form>
    
        </div>
    </div>
   
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</html>
