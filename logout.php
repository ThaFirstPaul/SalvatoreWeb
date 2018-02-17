<?php
    session_start();
    require("api/api.php");
    

    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
    }
    elseif (isset($_POST['settings'])) {
        header("Location: settings.php");
    }
?>