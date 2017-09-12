<?php require 'server.php' ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="Favicon.png">
    <title>NPSS News</title>
	<link href="rename3.css" type="text/css" rel="stylesheet">
    <script>
    function drawline(x) {
		document.getElementById(x).style.animation = "line";
		document.getElementById(x).style.animationDuration = "0.3s";
		document.getElementById(x).style.borderBottom = "2px solid dodgerblue";
	}
	
	function hideline(x) {
		document.getElementById(x).style.animation = "none";
		document.getElementById(x).style.borderBottom = "2px solid transparent";
	}
	
	function inputfocus(x) {
		document.getElementById(x).focus();
	}
    </script>
</head>
<body id="loginbody" class="outer" style="overflow:hidden">
<svg width="1100px" height="600px" style="position:absolute; z-index:-1; display:block; transform:scale(1.3); top:60; left:154">
    <polygon points="0,0 0,600 440, 0"
    style="fill:rgb(200, 200, 200)" />
    <polygon points="132,420 440,0 660, 600"
    style="fill:rgb(230, 230, 230)" />
    <polygon points="0,600 132,420 660, 600"
    style="fill:whitesmoke" />
    <polygon points="660,600 557,320 1100, 600"
    style="fill:rgb(220, 220, 220)" />
    <polygon points="440,0 557,320 1100, 0"
    style="fill:whitesmoke" />
    <polygon points="557,320 880,128 1100, 600"
    style="fill:ghostwhite" />
    <polygon points="880,128 1100,0 1100, 600"
    style="fill:rgb(220, 220, 220)" />
    Sorry, your browser does not support inline SVG.
</svg>
	<div class="middle">
		<div class="inner">
			<h2>NPSS News</h2>
			<h3>Login</h3>
            <?php require 'errors.php' ?>
            <form method="post" action="login.php" style="padding-top:40px">
                <input type="text" onfocus="drawline('one')" onblur="hideline('one')" id="userinput" name="username" autocomplete="off" required>
                <div class="bhavay" onclick="inputfocus('userinput')">Username</div>
                <hr id="one">
                <br><br>
                <input type="password" onfocus="drawline('two')" onblur="hideline('two')" id="passinput" name="password" autocomplete="off" required>
                <div class="bhavay" onclick="inputfocus('passinput')">Password</div>
                <hr id="two">
                <br><br>
                <input type="submit" class="button" name="login" value="Login">
                <a class="button" name="register" style="margin-right: 15px" href="register.php">Register</a>
            </form>
		<div>
	</div>
</body>
</html>