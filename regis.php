<?php
require 'koneksi.php';
$major = $_POST["major"];
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = md5($_POST["password"]);

$query_sql = "INSERT INTO user (major, fullname, username, email, password) VALUES ('$major', '$fullname', '$username', '$email', '$password') ";

if (mysqli_query($koneksi, $query_sql)){
    header("Location: login.php");
}else{
    echo "Registration failed : ". mysqli_error($koneksi);
}
?>

