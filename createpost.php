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
<body>
    <ul id="titlebar">
        <li class="titlebar" style="float:left"><img src="Logo.png" style="height:52px; display:block"></li>
        <li class="titlebar" style="float:left; margin-left:-15px" id="name"><a>NPSS Annnouncements</a></li>
        <li class="titlebar"><a href="settings.php" class="titlebutton">Settings</a></li>
        <li class="titlebar"><a href="clubs.php?retrieveclubs='1'" class="titlebutton active">My Clubs</a></li>
        <li class="titlebar"><a href="home.php" class="titlebutton">Home</a></li>
    </ul>
    <div class="banner">
        <h1>New Announcement</h1>
        <h4 id="subtitle">For <?php echo $_SESSION['currentclub']['name'] ?></h4>
    </div>
    <div class="rows createpost">
        <div class="col-20">
            <form method="post">
                <p>Title:</p>
                <input type="text" placeholder="Type your post title here..." name="title" autocomplete="off">
                <br>
                <p>Content:</p>
                <textarea rows="10" placeholder="Type your post content here..." name="content"></textarea>
                <br><br>
                <input type="submit" value="Create Post" name="createpost" id="submit">
            </form>
        </div>
    </div>
</body>
</html>