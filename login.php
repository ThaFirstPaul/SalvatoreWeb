<?php
    require("api/api.php");
    session_start();
    
    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
    }
    elseif (isset($_POST['settings'])) {
        header("Location: settings.php");
    }
    elseif (isset($_POST['login'])) {
        if ($_POST['login'] === ""){
            $_SESSION["error_type"] = "Login blank!";
            $_SESSION["goto"] = "index";
            header("Location: error.php");}
        if (login($_POST["username"], $_POST["password"])) {
            $_SESSION["username"] = $_POST["username"];
            header("Location: index.php");
        } else {
            $_SESSION["error_type"] = "Failed to log in!";
            $_SESSION["goto"] = "index";
            header("Location: error.php");
        }
    }
    elseif (isset($_POST['signup'])) {
        if ($_POST['username'] !== "" and $_POST['password'] !== "" and register($_POST["username"], $_POST["password"])) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION['goto'] = "index";
            $_SESSION['change'] = "You hve successfully signed up!";
            header("Location: success.php");
        } else {
            header("Location: index.php");

        }
    }
    
    
    ?>
