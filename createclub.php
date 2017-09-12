<?php
    require 'server.php';
    if (!isset($_SESSION['user'])) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="Favicon.png">
    <title>NPSS News</title>
    <link href="rename3.css" type="text/css" rel="stylesheet">
</head>
<body id="createclubbody">
    <ul id="titlebar">
        <li class="titlebar" style="float:left"><img src="Logo.png" style="height:52px; display:block"></li>
        <li class="titlebar" style="float:left; margin-left:-15px" id="name"><a>NPSS Annnouncements</a></li>
        <li class="titlebar"><a href="settings.php" class="titlebutton">Settings</a></li>
        <li class="titlebar"><a href="clubs.php?retrieveclubs='1'" class="titlebutton active">My Clubs</a></li>
        <li class="titlebar"><a href="home.php" class="titlebutton">Home</a></li>
    </ul>
    <div class="banner">
        <h1>New Club</h1>
    </div>
    <div class="rows createpost">
        <div class="col-20">
            <?php require 'errors.php' ?>
            <form method="post" enctype="multipart/form-data">
                <p>Club Name:</p>
                <input type="text" placeholder="Type your club name here..." name="clubname" autocomplete="off">
                <br>
                <p>Gender:</p>
                <select name="gender">
                    <option>Male</option>
                    <option>Female</option>
                    <option>All</option>
                </select>
                <br>
                <p>Grade:</p>
                <select name="grade">
                    <option>Junior</option>
                    <option>Senior</option>
                    <option>All</option>
                </select>
                <br>
                <p>Description:</p>
                <textarea rows="8" placeholder="Type your club description here..." name="clubdesc"></textarea>
                <br>
                <p>Club Banner:</p>
                <input type="file" name="image">
                <br><br>
                <input type="submit" value="Create Club" name="createclub" id="submit">
            </form>
        </div>
    </div>
</body>
</html>