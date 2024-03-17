<?php
session_start();
include "C:/xampp/htdocs/RE-SEARCHER/koneksi.php";
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
    <link rel="stylesheet" href="/RE-SEARCHER/css/grading.css">
</head>

<body class="body">
    <div class="sidebar">
        <div class="header">
            <div class="list-item">
                <a href="#">
                    <img src="/RE-SEARCHER/pic/recommended.png" alt="" class="iconz">
                    <span class="description-header">RE.SEARCHER</span>
                </a>
            </div>
            <div class="illustration">
                <img src="/RE-SEARCHER/pic/logo.png" alt="" class="icons">
            </div>
            <div class="main">
                <div class="list-item">
                    <a href="/RE-SEARCHER/page_i.php">
                        <img src="/RE-SEARCHER/pic/home.png" alt="" class="icon">
                        <span class="description">Home</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="/RE-SEARCHER/PAGE_I/profile.php">
                        <img src="/RE-SEARCHER/pic/user.png" alt="" class="icon">
                        <span class="description">Profile</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="/RE-SEARCHER/PAGE_I/grading.php">
                        <img src="/RE-SEARCHER/pic/table.png" alt="" class="icon">
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
                    <li></li><a  href="/RE-SEARCHER/PAGE_I/about.html" role="button" lt=""><img src="/RE-SEARCHER/pic/about.png" alt="" class="icon"></a></li>
                </ul>
            </div>
            <div class="menu-profile">
                <ul>
                    <li></li><a  href="/RE-SEARCHER/logout.php" role="button" lt=""><img src="/RE-SEARCHER/pic/logout.png" alt="" class="icon"></a></li>
                </ul>
            </div>
        </div>
        
        <div class=container>
        <div class="center-box">
        <h2 style="font-size: 1em;">Grading System</h2>
        <p>
            This system provides recommendations for research topics that suit the user's wishes based on the input of major course grades and the user's preferences or interests. The value entered by the user into the system will be validated whether it has reached the standard requirements for a good value, so that later the analysis results that will be provided will also be in accordance with the user's needs. The standard grades used are the assessment standards applied by Klabat - Airmadidi University.
        </p>
        <table id="myTable">
            <thead>
                <tr>
                    <th colspan="3" style="font-size: 0.9em;">Grade</th>
                </tr>
                <tr>
                    <th style="font-size: 0.8em;">Number</th>
                    <th style="font-size: 0.8em;">Letter</th>
                    <th style="font-size: 0.8em;">Weight</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-size: 0.8em;">100 - 91</td>
                    <td style="font-size: 0.8em;">A</td>
                    <td style="font-size: 0.8em;">4.0</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">90 - 85</td>
                    <td style="font-size: 0.8em;">A-</td>
                    <td style="font-size: 0.8em;">3.7</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">84 - 82</td>
                    <td style="font-size: 0.8em;">B+</td>
                    <td style="font-size: 0.8em;">3.3</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">81 - 78</td>
                    <td style="font-size: 0.8em;">B</td>
                    <td style="font-size: 0.8em;">3.0</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">77 - 75</td>
                    <td style="font-size: 0.8em;">B-</td>
                    <td style="font-size: 0.8em;">2.7</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">74 - 70</td>
                    <td style="font-size: 0.8em;">C+</td>
                    <td style="font-size: 0.8em;">2.3</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">69 - 67</td>
                    <td style="font-size: 0.8em;">C</td>
                    <td style="font-size: 0.8em;">2.0</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">66 - 60</td>
                    <td style="font-size: 0.8em;">C-</td>
                    <td style="font-size: 0.8em;">1.7</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">59 - 40</td>
                    <td style="font-size: 0.8em;">D</td>
                    <td style="font-size: 0.8em;">1.0</td>
                </tr>
                <tr>
                    <td style="font-size: 0.8em;">39 - 0</td>
                    <td style="font-size: 0.8em;">F</td>
                    <td style="font-size: 0.8em;">0.0</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
    <div id="root"></div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Scripts -->

    <script src="./js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="RE-SEARCHER/js/rec.js"></script>
	<script src="RE-SEARCHER/js/scroll.js"></script>
	
</body>
</html>