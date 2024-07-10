<?php 
include 'partials/db.php';

session_start();
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
  }
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome - <?php echo $_SESSION['username'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                  <a class="nav-link active" aria-current="page" href="/BlogSystem/welcome.php">Home</a>
                </li>
                <li><a class="nav-link" href="/BlogSystem/create.php">Add Post</a></li>
                <li><a class="nav-link" href="/BlogSystem/edit.php">Update/Delete Post</a></li>
              </ul>
                <div class="mx-2">
                  <a class="btn btn-primary" href="/BlogSystem/logout.php" role="button">Logout</a>
                </div>
            </div>
          </div>
        </nav>
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="3.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h2>Welcome to BlogMania...</h2>
            <p>Create, Connect and inspire with our seamless blogging experience</p>
            <button class="btn btn-danger">Technology</button>
            <button class="btn btn-primary">Sports</button>
            <button class="btn btn-success">Travel</button>
          </div>
        </div>
        <div class="carousel-item">
          <img src="2.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h2>Code With Fun</h2>
            <p>Create, Connect and inspire with our seamless blogging experience</p>
            <button class="btn btn-danger">Technology</button>
            <button class="btn btn-primary">Sports</button>
            <button class="btn btn-success">Travel</button>
          </div>
        </div>
        <div class="carousel-item">
          <img src="1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block text-secondary-emphasis">
            <h2>It's Blog time ..</h2>
            <p>Create, Connect and inspire with our seamless blogging experience</p>
            <button class="btn btn-danger">Technology</button>
            <button class="btn btn-primary">Sports</button>
            <button class="btn btn-success">Travel</button>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container my-4">
    <div class="row mb-2">
    <?php
    $posts_sql = "SELECT * FROM `posts`
                  ORDER BY Created_at DESC";
    $posts_result = mysqli_query($conn, $posts_sql);

    $num = mysqli_num_rows($posts_result);
    if ($num > 0) {
      while($row = mysqli_fetch_assoc($posts_result)){
          echo ' <div class="col-md-6">
                    <div class="row g-0 border border-2 bg-secondary bg-opacity-10 rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                      <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">'. $row['Category'] .'</strong>
                        <h3 class="mb-0">'.$row['Title'].'</h3>
                        <p class="card-text my-4">'.$row['Content'].'</p>
                        </div>
                        <div class="mb-1 mx-4 text-body-secondary">'.$row['Created_at'].'</div>      
                    </div>
                  </div>';
      };
    };
    ?>

    </div>
    </div>
    
    <footer class="container">
      <p class="float-end"><a href="#">Back to top</a></p>
      <p>© 2023–2024 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>