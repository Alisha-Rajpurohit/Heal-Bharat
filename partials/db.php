<?php
// INSERT INTO `user` (`srno.`, `username`, `password`, `dt`) VALUES ('1', 'ha', '123', '2024-07-02 11:20:50.000000');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn){
    die("Error". mysqli_connect_error());
}
// echo "successfully connected"
?>