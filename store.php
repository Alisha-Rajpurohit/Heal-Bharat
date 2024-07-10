<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/db.php';

    $category = $_POST['post_category'];
    $title = $_POST['post_title'];
    $content = $_POST['post_content'];


    $sql = "INSERT INTO `posts` (`Category`, `Title`, `Content`, `Created_at`) VALUES ('$category', '$title', '$content', current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: welcome.php");
    }
    else{
        header("location: add_post.php");
        $showError = "Due to some problems faced, not posted right now. Try Again Later!";
    }

    $posts_sql = "SELECT * FROM `posts`";
    $posts_result = mysqli_query($conn, $posts_sql);

    $num = mysqli_num_rows($posts_result);
    if ($num > 0) {
        while($row = mysqli_fetch_assoc($posts_result)){

        };
    }
}
?>