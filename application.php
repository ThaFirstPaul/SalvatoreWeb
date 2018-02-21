<?php session_start(); if (!isset($_SESSION["username"])) { header("Location: index.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Salvatore Guild - Apply</title>

  
</head><body>
<?php require("api/api.php");
require("header.php");
?>

  
</body></html>
