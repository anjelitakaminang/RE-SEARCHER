<?php
session_start();

//mengecek apakah ada session user yang aktif
if(!isset($_SESSION['user'])) {
        header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>System Recommendation</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body align="center">

	<div class="header">
	<h2>RE-SEARCHER</h2>
	<h6>You're in!</h6>
	</div>
    <hr>
	<h5><a href="logout.php">Logout</a></5>
	<div class="container">
		<h4> Input your grade and interest:</h4>
		<tr>
			<form id="recommendation-form">
			<div class="form-row">
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
	
			<div class="form-row">
				<label for="grade">Grade:</label>
				<input type="number" id="grade" name="grade" min="0" max="100">
			</div>
			<div class="form-row">
				<label for="interest">Interest:</label>
				<input type="text" id="interest" name="interest" placeholder="e.g. I interested in Machine Learning..." style="width: 50%">
			</div>
			</div>
				<button type="submit">Generate</button>
			</form>

			<div class="sidebar">
					<h2>Search History</h2>
					<ul id="search-history">
						<!-- Previous searches will be displayed here -->
					</ul>
				</div>
			</div>
		<script src="js/home.js"></script>

		<div id="app"></div>
</body>
</html>