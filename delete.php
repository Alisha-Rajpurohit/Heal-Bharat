<?php
    include 'partials/db.php';

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $Id = $_POST['Id'];

        $deleteSql = "DELETE FROM `posts` 
                      WHERE `posts`.`Id` = '$Id';";
        $result = mysqli_query($conn, $deleteSql);
        header("location: edit.php");
    }
?>