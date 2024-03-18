
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
    <link rel="stylesheet" href="/RE-SEARCHER/css/profile.css">
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

    <div class="container">
        <h1>User Profile</h1>
        <div class="profile">
        <?php include 'C:/xampp/htdocs/RE-SEARCHER/showprofile.php'; ?>
    </div>
</div>

    <!-- Scripts -->

    <script src="./js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="RE-SERACHER/js/rec.js"></script>
	<script src="RE-SEARCHERjs/scroll.js"></script>
	
</body>
</html>

