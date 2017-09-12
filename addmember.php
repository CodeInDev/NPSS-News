<?php
    $_POST['loadaccounts'] = 1;
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
    <script>
    var selected = [];

    function updatemembers() {
        var output = document.getElementById("addedmembers");
        if (selected.indexOf(document.getElementById("members").value) == -1 && document.getElementById("members").value != 0) {
            selected.push(document.getElementById("members").value);
            var box = document.createElement("div");
            output.appendChild(box);
            box.setAttribute("class", "content");
            box.style.padding = "10px 0";
            box.style.margin = "15px 0";
            box.style.fontSize = "14px";
            box.innerHTML = document.getElementById("members").value;
        }
    }
    </script>
</head>
<body id="createclubbody">
    <ul id="titlebar">
        <li class="titlebar" style="float:left"><img src="Logo.png" style="height:52px; display:block"></li>
        <li class="titlebar" style="float:left; margin-left:-15px" id="name"><a>NPSS Annnouncements</a></li>
        <li class="titlebar"><a href="settings.php" class="titlebutton">Settings</a></li>
        <li class="titlebar"><a href="clubs.php" class="titlebutton active">My Clubs</a></li>
        <li class="titlebar"><a href="home.php" class="titlebutton">Home</a></li>
    </ul>
    <div class="banner">
        <h1>Add Member</h1>
        <h4 id="subtitle">For <?php echo $_SESSION['currentclub']['name'] ?></h4>
    </div>
    <div class="rows addmember createpost">
        <div class="col-20">
            <form method="post">
                <p>Add a Member:</p>
                <select id="members" onchange="updatemembers();">
                    <?php if (count($availaccounts) > 0) { ?>
                        <option value="0">Choose a member...</option>
                    <?php } else { ?>
                        <option value="0">None Available</option>
                    <?php } ?>
                    <?php foreach ($availaccounts as $account): ?>
                        <option value="<?php echo $account['username'] ?>"><?php echo $account['firstname'] . " " . $account['lastname']
                                        . " (" . $account['username'] . ")" ?></option>
                    <?php endforeach ?>
                </select>
                <br>
                <p>Members to Add:</p>
                <div id="addedmembers"></div>
                <br>
                <input type="submit" value="Add Members" name="addmembers" id="submit">
            </form>
        </div>
    </div>
</body>
</html>