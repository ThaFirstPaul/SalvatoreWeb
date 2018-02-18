<?php session_start(); if (!isset($_SESSION["username"])) { header("Location: index.php"); require("api/api.php");

if ($_POST["message"] !== "") {
    if (!send_message($_SESSION["username"], $_POST["message"])){
        $_SESSION["error_type"] = "Could not send Message!";
        header("Location: error.php");
    } header("Location: index.php");
        
}
 ?>
