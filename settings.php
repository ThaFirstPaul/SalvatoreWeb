<?php session_start(); if (!isset($_SESSION["username"])) { header("Location: index.php"); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>


<script>
function showStuff() {
    document.getElementById("delete").style.display = 'none';
    document.getElementById("deletesure").style.display = 'block';
}
</script>
  
  <link rel="stylesheet" href="css/bootstrap.min.css"><title>Salvatore Guild - Personal Settings</title></head><body>
<?php require("api/api.php");
require("header.php");
?>

<div class="jumbotron">
<div class="container">
<h1>Personal Settings<br>
</h1>
<p>Change your personal settings.<br>
</p>
</div></div>

<?php $settings = getsettings($_SESSION["username"]) ?>

<div class="modal-body">

<form id="form" method="post" action="save.php">
    <div class="container">
        <h3>Email:</h3><?php if($settings["email"] !== "") {echo "<p  style='color:green;'> (✓Already added)</p>";} ?>
        <input id="email" name="email" placeholder=<?php
            if ($settings["email"] !== "") {
                echo $settings["email"];
            } else {
                echo "example@example.com" ;} ?> type="text" class="form-control">
    <button onclick=save("email") type="submit" name="saveemail" class="btn btn-primary">Save</button>
</div>
</form>


<form id="form" method="post" action="save.php">
<div class="container">
<h3>API-Key:</h3>
<?php if($settings["apikey"] !== "") {
    echo "<p style='color:green;' (✓Already added, Thank you!)</p>";
} else {
    echo "<p> The API-Key is used to get Players, Guilds and Friends from Hypixel's API. </p>";}
?>

<input id="apikey" name="apikey" placeholder=<?php if ($settings["apikey"] !== "") {echo $settings["apikey"]; } else {echo "1a2b3c4d-5e6f-7g8h-9i0j-1k2l3m4n5o6p";} ?> type="text"
class="form-control">
<button type="submit" name="saveapikey" class="btn btn-primary">Save</button>
</div>
</form>


<form id="form" method="post" action="save.php">
<div class="container">
<h3>Change your Password:</h3>
<input id="newpassword" name="newpassword" placeholder="New Password" type="password" class="form-control">
<input id="oldpassword" name="oldpassword" placeholder="Old Password" type="password" class="form-control">

<button type="submit" name="changepassword" class="btn btn-primary">Save</button>
</div>
</form>

<div class="container">

<form id="form" method="post" action="save.php">
<h3>Delete your account:</h3>
<input id="password" name="password" placeholder="Password" type="password" class="form-control">
<button style="display: none;" id= "deletesure" type="submit" name="deletesure" class="btn btn-danger">Are You Sure?</button>
</form>

<button id="delete" onclick="showStuff()" type="submit" name="delete" class="btn btn-warning">Delete</button>
</div>



</div>

</body></html>
