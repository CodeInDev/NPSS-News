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
<body id="settingsbody">
    <ul id="titlebar">
        <li class="titlebar" style="float:left"><img src="Logo.png" style="height:52px; display:block"></li>
        <li class="titlebar" style="float:left; margin-left:-15px" id="name"><a>NPSS Annnouncements</a></li>
        <li class="titlebar"><a href="settings.php" class="titlebutton active">Settings</a></li>
        <li class="titlebar"><a href="clubs.php" class="titlebutton">My Clubs</a></li>
        <li class="titlebar"><a href="home.php" class="titlebutton">Home</a></li>
    </ul>
    <div class="banner">
        <h1>My Settings</h1>
    </div>
    <div class="rows settings">
        <div class="col-8">
            <div style="border:1px solid rgb(200, 200, 200); width:220px; text-align:center">
                <img id="profile" src="">
                <br>
                <input type="file" value="Change" style="margin: 10px 20px" onchange="readURL(this)">
                <img src="" id="preview" style="display:none"></img>
            </div>
            <br><br>
            <a href="login.php?logout='1'" class="button" style="float:left">Logout</a>
        </div>
        <div class="col-12 createpost">
                <p>First name:</p>
                <input type="text" id="firstname" value="<?php echo $_SESSION['user']['firstname'] ?>">
                <p>Last name:</p>
                <input type="text" id="lastname" value="<?php echo $_SESSION['user']['lastname'] ?>">
                <p>Username:</p>
                <input type="text" id="username" value="<?php echo $_SESSION['user']['username'] ?>">
                <p>Gender:</p>
                <select id="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <p id="gradelabel">Grade:</p>
                <select id="grade">
                    <option value="Junior">Junior (9 & 10)</option>
                    <option value="Senior">Senior (11 & 12)</option>
                </select>
                <br><br>
            <a class="button" style="float:left" onclick="updateuserinfo()">Save</a>
        </div>
    </div>
</body>
</html>