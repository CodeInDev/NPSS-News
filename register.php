<?php require 'server.php' ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="Favicon.png">
    <title>NPSS News</title>
    <link href="rename3.css" type="text/css" rel="stylesheet">
</head>
<body id="registerbody">
    <ul id="titlebar">
        <li class="titlebar" style="float:left"><img src="Logo.png" style="height:52px; display:block"></li>
        <li class="titlebar" style="float:left; margin-left:-15px" id="name"><a>NPSS Annnouncements</a></li>
        <li class="titlebar"><a href="register.php" class="titlebutton active">Register</a></li>
        <li class="titlebar"><a href="login.php" class="titlebutton">Login</a></li>
    </ul>
    <div class="banner">
        <h1>Register</h1>
    </div>
    <div class="rows register createpost">
        <?php require 'errors.php' ?>
        <div class="col-20">
            <form method="post">
                <p>First name:</p>
                <input type="text" name="firstname" autocomplete="off">
                <p>Last name:</p>
                <input type="text" name="lastname" autocomplete="off">
                <p>Username:</p>
                <input type="text" name="username" autocomplete="off">
                <p>Password:</p>
                <input type="password" name="password">
                <p>Gender:</p>
                <select name="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <p>Grade:</p>
                <select name="grade">
                    <option value="Junior">Junior (9 & 10)</option>
                    <option value="Senior">Senior (11 & 12)</option>
                </select>
                <p>I am a:</p>
                <select name="acctype">
                    <option>Student</option>
                    <option>Teacher</option>
                </select>
                <br><br>
                <input type="submit" value="Register" name="register" id="submit">
                <br>
            </form>
            <a href="login.php" class="link">Already have an account?</a>
            <br>
        </div>
    </div>
</body>
</html>