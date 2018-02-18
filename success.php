<?php session_start(); if (!isset($_SESSION["username"])) { header("Location: index.php");} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  <link rel="stylesheet" href="css/bootstrap.min.css"><title>Salvatore Guild - Success</title></head><body>
<?php require("header.php"); ?>
<div class="jumbotron">
<div class="container">
<h1 id="title">Success!<br>
</h1>
<p><?php if(isset($_SESSION['change'])){echo $_SESSION['change']; session_destroy();} else { echo "Your changes have been successfully saved!";} ?>
<br>
</p>
</div>
</div>

<div class="container">

<?php $a = "window.location.href='/{$_SESSION['goto']}.php'"; ?>
<button onclick=<?php echo $a; ?> type="submit" class="btn btn-primary">
<?php if($_SESSION['goto'] === "index"){
    echo "To Homepage";
} else {
    echo "Back to "; echo $_SESSION['goto']; }?>
</button>
</div>
</body></html>
