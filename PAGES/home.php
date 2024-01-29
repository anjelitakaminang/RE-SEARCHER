<?php
session_start();
include "koneksi.php";
//mengecek apakah ada session user yang aktif
if(!isset($_SESSION['user'])) {
        header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman HOME</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <nav>
        <div class="header">
				<img src="../PAGES/pic/logo.png" alt="myphoto">
                <h1>RE-SEARCHER</h1>
        </div>
        <ul>
            <li><a href="">Profile</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Grading Standard</a></li>
            <li><a href="">Setting</a></li>
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
        <h6>© 2024 - Fakultas Ilmu Komputer - Universitas Klabat</h6>
    </footer>
    </div>
    <div id="root"></div>

	<div class="container">
		<h4> Input your grade and interest:</h4>
		<tr>
			<form id="recommendation-form">
			<div class="form-row0">
				<label for="major">Major:</label>
				<select id="major" name="major">
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
	
			<div class="form-row1">
				<label for="grade">Grade:</label>
				<input type="number" id="grade" name="grade" min="0" max="100">
				<button type="submit">Add</button>
			</div>
			<div class="form-row2">
				<label for="interest">Interest:</label>
				<input type="text" id="interest" name="interest" placeholder="e.g. I interested in Machine Learning...">
			</div>
			</div>
				<button type="submit">Generate</button>
			</form>

			<div class="sidebar">
					<h3>Search History</h3>
					<ul id="searchHistory">
						<!-- Previous searches will be displayed here -->
					</ul>
				</div>
			</div>
			<script src="js/side.js"></script>
		      
		<script src="js/script.js"></script>
		<div id="app"></div>
</body>
</html>