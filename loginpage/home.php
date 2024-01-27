<?php
session_start();

//mengecek apakah ada session user yang aktif
if(!isset($_SESSION['user'])) {
        header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>System Recommendation</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body align="center">
	<h1>RE-SEARCHER</h1>
	<h3>You're in!</h3>
    <a href="logout.php">Logout</a>
    <hr>
	<div class="container">
		<h4> Input your grade and interest:</h4>
		<tr>
			<form id="recommendation-form">
			<div class="form-row">
				<label for="major">Major:</label>
				<select id="major" name="major">
					<option value="CS">Computer Science</option>
					<option value="ECE">Electrical and Computer Engineering</option>
					<option value="ME">Mechanical Engineering</option>
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
</body>
</html>