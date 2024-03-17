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
    <title>Researcher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
</head>

<body class="body">
    <div class="sidebar">
        <div class="header">
            <div class="list-item">
                <a href="#">
                    <img src="./pic/recommended.png" alt="" class="iconz">
                    <span class="description-header">RE.SEARCHER</span>
                </a>
            </div>
            <div class="illustration">
                <img src="./pic/logo.png" alt="" class="icons">
            </div>
            <div class="main">
                <div class="list-item">
                    <a href="page_si.php">
                        <img src="./pic/home.png" alt="" class="icon">
                        <span class="description">Home</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="PAGE_SI/profile.php">
                        <img src="./pic/user.png" alt="" class="icon">
                        <span class="description">Profile</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="PAGE_SI/grading.php">
                        <img src="./pic/table.png" alt="" class="icon">
                        <span class="description">Grading Standard</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
  
    <div class="main-content">
        <div id="menu-button">
            <input type="checkbox" id="menu-checkbox">
            <label for="menu-checkbox" id="menu-label">
                <div id="humberger"></div>
            </label>
        </div>
        <div class="headbar">
            <div class="menu-profile">
                <ul>
                    <li></li><a  href="PAGE_SI/about.html" role="button" lt=""><img src="./pic/about.png" alt="" class="icon"></a></li>
                </ul>
            </div>
            <div class="menu-profile">
                <ul>
                    <li></li><a  href="logout.php" role="button" lt=""><img src="./pic/logout.png" alt="" class="icon"></a></li>
                </ul>
            </div>
        </div>
        


        <div class="container">
            <h3> Input your grade and interest:</h3>
                <form id="recommendation-form">
                    <div class="form-row0">
                        <label for="major">Major:</label>
                        <select id="major" name="major">
                            <option>Choose Subject (Sistem Informasi) : </option>
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
                        <input type="text" id="input-rec" placeholder="e.g. I interested in Machine Learning...">
                    </div>
                    <div class="input-group-append">
                        <button id="btn-rec" type="button">Get Recommendation</button>
                    </div>
                    <div class="result-box"  id="content-rec-feed">
                        <label>Recommended Topic:</label>
                        <p id="content-chat-feed"></p>
                    </div>
                </form>
        </div>

    <!-- Scripts -->

    <script src="./js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="RE-SEARCHER/js/rec.js"></script>
	<script src="RE-SEARCHER/js/scroll.js"></script>
	
</body>
</html>