<?php
    $_POST['retrieveclubs'] = 1;
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
    </script>
</head>
<body>
    <ul id="titlebar">
        <li class="titlebar" style="float:left"><img src="Logo.png" style="height:52px; display:block"></li>
        <li class="titlebar" style="float:left; margin-left:-15px" id="name"><a>NPSS Annnouncements</a></li>
        <li class="titlebar"><a href="settings.php" class="titlebutton">Settings</a></li>
        <li class="titlebar"><a href="clubs.php" class="titlebutton active">My Clubs</a></li>
        <li class="titlebar"><a href="home.php" class="titlebutton">Home</a></li>
    </ul>
    <div class="banner">
        <h1>My Clubs</h1>
        <h4 id="count"><?php echo "In " . count($clubs) . " Clubs" ?></h4>
    </div>
    <div class="rows myclubs">
        <div class="col-5">
            <ul id="leftbar">
                <li>
                    <div class="content" id="calendar">
                        <p class="boxtitle">Calendar</p>
                    </div>
                </li>
                <li>
                    <div class="content" id="newclubdiv" style="padding:0px 15px">
                        <a href="createclub.php" class="button">New Club</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-15" id="clubs">
            <?php require 'loadclubs.php' ?>
        </div>
    </div>
</body>
</html>