<?php
    require("api/api.php");
    
    if (isset($_POST['email'])) {
        if(setemail($_SESSION['username'], $_POST['email'])) {
            header("Location: success.php");
        } else {
            $_SESSION['error_type'] = "Unexpected Error!";
            header("Location: error.php");
        }
    }
    elseif (isset($_POST['apikey'])) {
        if (setapikey($_SESSION['username'], $_POST['apikey'])){
            header("Location: success.php");
        } else {
            $_SESSION['error_type'] = "Unexpected Error!";
            header("Location: error.php");
        }
    }
    elseif (isset($_POST['changepassword'])) {
        if(changepass($_SESSION['username'], $_POST['oldpassword'], $_POST['newpassword'])) {
            $_SESSION['change'] = "Please sign back in for changes to take place!";
            
            header("Location: success.php");

        } else {
            $_SESSION['error_type'] = "Incorrect Password!";
            header("Location: error.php");
        }
    }
    elseif (isset($_POST['deletesure'])) {
        if(login($_SESSION['username'], $_POST['password']))
        {
            deleteuser($_SESSION['username']);
            $_SESSION['change'] = "Your account has been permanently deleted.";
            
            header("Location: success.php");
            
        } else {
            $_SESSION['error_type'] = "Incorrect Password!";
            header("Location: error.php");
        }
    } else {
        $_SESSION['error_type'] = "Unexpected Error!";
        header("Location: error.php");
    }
    
    
?>
