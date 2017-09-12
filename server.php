<?php
    session_start();
    $errors = array();
    $posts = array();
    $clubs = array();
    $accounts = array();
    $members = array();
    $availaccounts = array();
    $conn = new mysqli("localhost", "root", "", "test");
    
    if (isset($_POST['register'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $grade = $_POST['grade'];
        $acctype = $_POST['acctype'];
        $clubs = json_encode(array());
        
        $check = "SELECT * FROM accounts WHERE username = '$username'";
        $result = $conn->query($check);

        if ($result->num_rows == 0) {
            if (strlen($username) > 3 and strlen($password) > 3) {
                $hash = md5($password);
                $sql = "INSERT INTO accounts (firstname, lastname, username, password, gender, grade, acctype, clubs) VALUES ('$firstname', '$lastname', '$username', '$hash', '$gender', '$grade', '$acctype', '$clubs')";
                $conn->query($sql);
                $_SESSION['user'] = array('firstname' => $firstname, 'lastname' =>  $lastname, 'username' => $username);
                $_SESSION['success'] = "Welcome to the open Alpha, " . $username . "!";
                header('location: home.php');
            } else {
                $errors[] = "Username and password must be at least 4 characters";
            }
        } else {
            $errors[] = "Username has already been taken";
        }
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash = md5($password);

        $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$hash'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['user'] = $result->fetch_assoc();
            $_SESSION['success'] = "Welcome back, " . $username . "!";
            header('location: home.php');
        } else {
            $errors[] = "Username or password is incorrect";
        }
    }

    if(isset($_POST['createclub'])) {
        $name = $_POST['clubname'];
        $gender = $_POST['gender'];
        $grade = $_POST['grade'];
        $desc = $_POST['clubdesc'];
        $image = addslashes($_FILES['image']['tmp_name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        $sql = "INSERT INTO clubs (name, gender, grade, description, image) VALUES ('$name', '$gender', '$grade', '$desc', '$image')";

        if (strlen($name) > 3 and strlen($desc) > 3) {
            $conn->query($sql);

            $user = $_SESSION['user']['username'];
            $sql2 = "SELECT clubs FROM accounts WHERE username='$user'";
            $result = $conn->query($sql2);
            $clubs = json_decode($result->fetch_assoc()['clubs']);
            $clubs[] = $name;
            $clubs = json_encode($clubs);

            $sql3 = "UPDATE accounts SET clubs='$clubs' WHERE username='$user'";
            $conn->query($sql3);

            $_SESSION['success'] = "Club successfully created";
            header("location: clubs.php");
        } else {
            $errors[] = "Clubname and description must be at least 4 characters";
        }
    }

    if (isset($_POST['retrieveclubs'])) {
        $sql = "SELECT * FROM clubs";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $clubs[] = $row;
        }
    }
    
    if (isset($_GET['club'])) {
        $id = $_GET['club'];
        $sql = "SELECT * FROM clubs WHERE id='$id'";
        $result = $conn->query($sql);
        
        $_SESSION['currentclub'] = $result->fetch_assoc();

        $sql2 = "SELECT * FROM accounts";
        $result2 = $conn->query($sql2);
        
        while ($row = $result2->fetch_assoc()) {
            $accounts[] = $row;
        }
        
        for ($i = 0; $i < count($accounts); $i++) {
            if (in_array($_SESSION['currentclub']['name'], json_decode($accounts[$i]['clubs'], TRUE))) {
                $members[] = $accounts[$i];
            }
        }
    }

    if (isset($_POST['deleteclub'])) {
        $name = $_SESSION['currentclub']['name'];
        $sql = "DELETE FROM clubs WHERE name='$name'";
        
        $conn->query($sql);
        $_SESSION['success'] = "Club successfully deleted";
        header("location: clubs.php");
    }

    if (isset($_POST['loadaccounts'])) {
        
    }

    if (isset($_POST['createpost'])) {
        $club = json_encode(array('id' => $_SESSION['currentclub']['id'], 'name' => $_SESSION['currentclub']['name']));
        $title = $_POST['title'];
        $content = $_POST['content'];
        $sql = "INSERT INTO posts (club, title, content) VALUES ('$club', '$title', '$content')";

        if (strlen($title) > 0 and strlen($content) > 0) {
            $conn->query($sql);
            $_SESSION['success'] = "Post successful";
            header('location: home.php');
        } else {
            $errors[] = "Title and content must be at least 1 character";
        }
    }

    if (isset($_POST['deletepost'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM posts WHERE id='$id'";

        $conn->query($sql);
        header('location: home.php');
    }

    if (isset($_POST['retrieveposts'])) {
        if ($_POST['retrieveposts'] == 1) {
            $sql = "SELECT * FROM posts";
        } else {
            $club = json_encode(array('id' => $_SESSION['currentclub']['id'], 'name' => $_SESSION['currentclub']['name']));
            $sql = "SELECT * FROM posts WHERE club='$club'";
        }
        $result = $conn->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
        $posts = array_reverse($posts);
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['success']);
        //header('location: login.php');
    }
?>