<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login ke Website</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!--Font Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
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
                echo '<script>location.href="home.php";</script>';

            }else{
                echo '<script>alert("Email atau Password tidak ditemukan");</script>';
            }
        }
    ?>
      
      <div class="login-container">
    <h1>Login</h1>
        <form method="post">
            <div class="inputbox">
                <input
                    type="text"
                    name="username"
                    placeholder="Username"
                    required
                />
                <i class='bx bx-user'></i>
            </div>
            <div class="inputbox">
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                />
                <i class='bx bx-lock-alt' ></i>
            </div>
             <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a> 
            </div>
            <td><button type="submit" name="login">Login</button></td>
            <div class="registerlink">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
  </div> 
  <div id="root"></div>
 </body>
 </html>

