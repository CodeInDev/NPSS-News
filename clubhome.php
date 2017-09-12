<?php
    $_POST['retrieveposts'] = 2;
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
        //Switch tab function on clubhome page
        function switchtab(target) {
            //Hide all tabs
            document.getElementById("clubhome").style.display = "none";
            document.getElementById("members").style.display = "none";
            document.getElementById("manage").style.display = "none";
            //Show target tab
            document.getElementById(target).style.display = "block";
        }

        //Change tab colour function
        function tabcolour(target) {
            //Remove class from all tabs
            document.getElementById("poststab").classList.remove("activetab");
            document.getElementById("memberstab").classList.remove("activetab");
            document.getElementById("managetab").classList.remove("activetab");
            //Add class to target tab
            document.getElementById(target).classList.add("activetab");
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
    <a href="clubs.php" style="position:absolute; margin:10px"><img src="Arrow.png" style="height:30px"></a>
    <div>
        <?php if (strlen($_SESSION['currentclub']['image']) > 18) { ?>
            <img src="data:image;base64,<?php echo $_SESSION['currentclub']['image'] ?>" id="img">
        <?php } else { ?>
            <img src="Mosaic Background.png" id="img">
        <?php } ?>
    </div>
    <ul id="menubar">
        <li class="menubar"><a id="poststab" class="activetab" onclick="switchtab('clubhome'); tabcolour('poststab')">Posts</a></li>
        <li class="menubar"><a id="memberstab" onclick="switchtab('members'); tabcolour('memberstab')">Members</a></li>
        <li class="menubar"><a id="managetab" onclick="switchtab('manage'); tabcolour('managetab')">Manage</a></li>
    </ul>
    <div class="rows" id="clubhome">
        <div class="col-5">
            <div class="content">
                <p id="club"><?php echo $_SESSION['currentclub']['name'] ?></p>
                <p id="info">
                    Gender: <?php echo $_SESSION['currentclub']['gender'] ?>
                    <br>
                    Grade: <?php echo $_SESSION['currentclub']['grade'] ?>
                    <br>
                    <br>
                    <?php echo $_SESSION['currentclub']['description'] ?>
                </p>
            </div>
        </div>
        <div class="col-11" id="posts">
            <?php require 'loadposts.php' ?>
        </div>
        <div class="col-4">
            <div class="content" id="search">
                <p class="boxtitle">Search Posts</p>
                <span id="searchbar">
                    <input type="text" id="searchinput" placeholder="Search...">
                    <span id="searchbutton" onclick=""><img src="Search Icon.png"></span>
                </span>
                <a class="button" id="newpost" href="createpost.php?club=<?php echo $_SESSION['currentclub']['id'] ?>">New Post</a>
            </div>
        </div>
    </div>
    <div class="rows" id="members" style="display:none">
        <div class="col-5">
            <div class="content">
                <p id="club2"><?php echo $_SESSION['currentclub']['name'] ?></p>
                <p id="info2">
                    Gender: <?php echo $_SESSION['currentclub']['gender'] ?>
                    <br>
                    Grade: <?php echo $_SESSION['currentclub']['grade'] ?>
                    <br>
                    <br>
                    <?php echo $_SESSION['currentclub']['description'] ?>
                </p>
            </div>
        </div>
        <div class="col-11" id="people">
            <?php foreach ($members as $account): ?>
                <div class="content" style="margin-bottom: 15px">
                    <p class="name"><?php echo $account['firstname'] . " " . $account['lastname'] ?></p>
                    <p class="username"><?php echo $account['username'] ?></p>
                </div>
            <?php endforeach ?>
        </div>
        <div class="col-4">
            <div class="content" id="search">
                <p class="boxtitle">Search People</p>
                <span id="searchbar">
                    <input type="text" id="searchinput" placeholder="Search...">
                    <span id="searchbutton"><img src="Search Icon.png"></span>
                </span>
                <a class="button" href="addmember.php?club=<?php echo $_SESSION['currentclub']['id'] ?>">Add</a>
            </div>
        </div>
    </div>
    <div class="rows" id="manage" style="display:none">
        <form method="post"><input type="submit" style="width:110px" class="button" name="deleteclub" value="Delete Club"></form>
    </div>
</body>
</html>