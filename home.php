<?php
session_start();
include "koneksi.php";
//mengecek apakah ada session user yang aktif
if(!isset($_SESSION['user'])) {
        header('location:login.php');
}
date_default_timezone_set('Asia/Makassar');
		$jam_sekarang = date("h:i A");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Sistem Rekomendasi Topik Research Project berbasis AI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/home.css">
	<!--Font Google-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>	
<nav>     
		<div>
			<header>
				<img src="pic/logo.png" alt="Logo">
				<h1>RE.SEARCHER</h1>
			</header>
    	</div>
    	<ul>
            <li><a href="html/profile.html">Profile</a></li>
            <li><a href="html/about.html">About</a></li>
            <li><a href="html/grading.html">Grading Standard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <div class="menu-toggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
        </div>
    </nav>
		<footer>
			<h5>© 2024 - Fakultas Ilmu Komputer - Universitas Klabat</h5>
		</footer>
    </div>
    <div id="root"></div>

	<div class="container">
		<h3> Input your grade and interest:</h3>
			<form id="recommendation-form">
				<div class="form-row0">
					<label for="major">Major:</label>
					<select id="major" name="major">
						<option>Choose Subject : </option>
						<option value="WD">Computer Programming</option>
						<option value="DM">Discrete Mathematics</option>
						<option value="DSA">Data Structure and Algorithms</option>
						<option value="MIS">Managememt Information System</option>
						<option value="WD">Web Desgin</option>
						<option value="IDB">Introduction to Database</option>
						<option value="DBMS">Database Management System</option>
						<option value="EPC">Enntrepreneur - Project Capstone</option>
						<option value="OOP">Object Oriented Programming</option>
						<option value="WD">Computer Ethics and Profession</option>
						<option value="WD">Scientific Writing</option>
						<option value="WD">Front-end Web Development</option>
						<option value="WD">System Analysis and Design</option>
						<option value="WD">Information System Security</option>
						<option value="WD">Data Mining and Warehousing</option>
						<option value="WD"></option>
						<!-- Add more options for different majors -->
					</select>
				</div>
		
				<div class="form-row1" id="grades">
					<label for="grade">Grade:</label>
					<input type="number" id="grade" name="grade" min="0" max="100">
					<button type="submit">Add</button>
				</div>
				<div class="form-row2" id="interests">
					<label for="interest">Interest:</label>
					<input type="text" id="recommend" placeholder="e.g. I interested in Machine Learning...">
				</div>
				<div class="input-group-append">
					<button class="btn btn-primary" type="button" id="generate">Get Recommendation</button>
				</div>
				<div class="result-box">
					<label for="result">Recommended Topic:</label>
					<div id="content-feed"></div>
				</div>
			</form>
			<script src="baru.js"></script>
		
		</div>
	</div>
			<script src="js/script.js"></script>
			<script src="js/new.js"></script>
			<div id="app"></div>
	</div>	
</body>
</html>