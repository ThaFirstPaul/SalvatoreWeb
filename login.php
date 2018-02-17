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
        if ($_POST['login'] !== "" and login($_POST["username"], $_POST["password"])) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["rank"] = $_POST["rank"];
            header("Location: index.php");
        } else {
            $_SESSION["error_type"] = "Failed to log in!";
            header("Location: error.php");
        }
    }
    elseif (isset($_POST['signup'])) {
        if ($_POST['login'] !== "" and register($_POST["username"], $_POST["password"])) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["rank"] = "member";
            header("Location: new.php");
        }
    }
    
    
    ?>
