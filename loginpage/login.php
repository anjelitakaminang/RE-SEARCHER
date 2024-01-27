<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login ke Website</title>
</head>
<body>

    <?php
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $query = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");
            
            if (mysqli_num_rows($query) > 0){
                $data = mysqli_fetch_array($query);
                $_SESSION['user'] = $data;
                echo '<script>alert("Welcome, '.$data['nama'].'"); location.href="home.php";</script>';

            }else{
                echo '<script>alert("Email atau Password tidak ditemukan");</script>';
            }
        }
?>

    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" style="text-align:center">
                    <h3>Universitas Klabat</h3>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="login">Login</button></td>
            </tr>
            
        </table>
    </form>
 </body>
 </html>

