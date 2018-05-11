<?php
    require("api/api.php");
    
    if (!(getrank($_SESSION["username"])==="administrator")) {
        header("Location: error.php?error=Not signed in!&info=Please sign in to change ranks.");
    } else {
        if(isset($_POST['ranktoset'])) {
            if(setrank($_POST['username'], $_POST['ranktoset'])) {
                header("Location: success.php");
            } else {
                
                header("Location: error.php");
            }
        }
    }
?>
