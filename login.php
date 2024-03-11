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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php


if(isset($_POST['major']) && isset($_POST['email']) && isset($_POST['password'])) {
    $major = $_POST['major'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Gunakan hashing yang lebih aman seperti bcrypt atau argon2id

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE major='$major' AND email='$email' AND password='$password'");
    
    if(mysqli_num_rows($query) > 0) {
        // Jika user ditemukan, lanjutkan dengan verifikasi major
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;

        echo '<script>location.href="home.php";</script>';
        exit(); // Hentikan eksekusi skrip setelah melakukan redirect
    } else {
        echo '<script>alert("Data yang anda masukan salah.");</script>';
    }
}
?>

     <div class="login-container">
    <h1>Sign In</h1>
        <form method="post">
            <div class="majoring">
					<select id="major" name="major" >
                        <option>-- Select Major --</option>
						<option value="Sistem Informasi" >Sistem Informasi</option>
						<option value="Informatika">Informatika</option>
                    </select>
            </div> 
            <div class="inputbox">
                <input
                    type="text"
                    name="email"
                    placeholder="Email"
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
                <label><input type="checkbox" id="rememberMe">Remember me</label>
                <a href="html/setting.html">Forgot password?</a> 
            </div>
            <td><button type="submit" name="login">Login</button></td>
            <div class="registerlink">
                <p>Don't have an account? <a href="html/regis.html">Register</a></p>
            </div>
        </form>
  </div> 
    <div>
        <script src="../js/login.js"></script>
    </div>
  <div id="root"></div>
 </body>
 </html>
