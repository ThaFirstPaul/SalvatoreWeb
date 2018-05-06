<?php session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
    }
    require("api/api.php");
    
    if (isset($_POST['sendmessage'])){
        header("Location: settings.php");
        if ($_POST["message"] !== "") {
            if (!send_message($_SESSION["username"], $_POST["message"])){
                $_SESSION["error_type"] = "Could not send Message!";
                header("Location: error.php");
            } header("Location: index.php");
        }
    } elseif (isset($_POST['deletemessage'])){
        if (!delete_message($_SESSION["username"], $_POST["id"])){
            $_SESSION["error_type"] = "Could not send Message!";
            header("Location: error.php");
        } header("Location: index.php");
    }
    ?>
