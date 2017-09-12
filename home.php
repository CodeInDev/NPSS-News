<?php
    $_POST['retrieveposts'] = 1;
    require 'server.php';
    if (!isset($_SESSION['user'])) {
        header('location: login.php');
    }
    if (isset($_SESSION['success'])) {
        require 'modal.php';
        unset($_SESSION['success']);
    }
?> 
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="Favicon.png">
    <title>NPSS News</title>
    <link href="rename3.css" type="text/css" rel="stylesheet">
    <script>
        function closemodal() {
            document.getElementById("modal").style.display = "none";
        }

        function toggledropdown(target) {
            document.getElementById("dropdown" + target.id.slice(6)).classList.toggle("show");
            target.classList.toggle("dropdownbuttonactive");
        }
    </script>
</head>
<body>
    <ul id="titlebar">
        <li class="titlebar" style="float:left"><img src="Logo.png" style="height:52px; display:block"></li>
        <li class="titlebar" style="float:left; margin-left:-15px" id="name"><a>NPSS Annnouncements</a></li>
        <li class="titlebar"><a href="settings.php" class="titlebutton">Settings</a></li>
        <li class="titlebar"><a href="clubs.php" class="titlebutton">My Clubs</a></li>
        <li class="titlebar"><a href="home.php" class="titlebutton active">Home</a></li>
    </ul>
    <div class="banner">
        <h1>View Announcements</h1>
        <h4 id="count"><?php echo count($posts) . " Posts Found" ?></h4>
    </div>
    <div class="rows home">
        <div class="col-5">
            <ul id="leftbar">
                <li>
                    <div class="content" id="calendar">
                        <p class="boxtitle">Calendar</p>
                    </div>
                </li>
                <li>
                    <div class="content" id="search">
                        <p class="boxtitle">Search Posts</p>
                        <span id="searchbar">
                            <input type="text" id="searchinput" placeholder="Search...">
                            <span id="searchbutton" onclick=""><img src="Search Icon.png"></span>
                        </span>
                        <a class="button" onclick="">Filter</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-15" id="posts">
            <?php require 'loadposts.php' ?>
        </div>
    </div>
</body>
</html>