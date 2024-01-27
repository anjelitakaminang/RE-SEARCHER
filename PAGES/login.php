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
                echo '<script>alert("Welcome, '.$data['nama'].'"); location.href="home.php";</script>';

            }else{
                echo '<script>alert("Email atau Password tidak ditemukan");</script>';
            }
        }
?>
        <div>
        <header>
            <img src="pic/LOGO_UNIVERSITAS_KLABAT.png"/>
            <h1>RESEARCH PROJECT TOPIC RECOMMENDATION SYSTEM</h1>
        </header>
        <div className="login-container">
            <Masuk />
        </div>

        <footer>
            <h3>© 2024 - Fakultas Ilmu Komputer - Universitas Klabat</h3>
        </footer>
        </div>

    <div id="root"></div>


    <div class="login-container">
    <form method="post">
      <label htmlFor="email">Email Mahasiswa</label>
      <input
        type="text"
        name="username"
        placeholder="Masukkan email mahasiswa"

      />

      <label htmlFor="password">Kata Sandi</label>
      <input
        type="password"
        name="password"
        placeholder="Masukkan kata sandi"
      />

      <td><button type="submit" name="login">Login</button></td>
    </form>
    </div> 

	<script src="masuk.js"></script>
 </body>
 </html>

