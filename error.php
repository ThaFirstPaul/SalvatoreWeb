<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Salvatore Guild - Error!</title>

  
</head><body>
<?php require("api/api.php");
require("header.php");
?>
<div class="jumbotron">
<div class="container">
<h1>Error: <?php echo $_SESSION["error_type"]; ?><br>
</h1>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body></html>