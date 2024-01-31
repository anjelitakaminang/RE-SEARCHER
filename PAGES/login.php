<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login ke Website</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
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
    <h1>RE.SEARCHER</h1>

    <form method="post">
      <input
        type="text"
        name="username"
        placeholder="Email"

      />
      <input
        type="password"
        name="password"
        placeholder="Password"
      />

      <td><button type="submit" name="login">Login</button></td>
    </form>
  </div> 
  <div id="root"></div>
 </body>
 </html>

