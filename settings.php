<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>


  
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
        <h3>Email:<?php if($settings["email"] !== "") {echo "✓";} ?></h3>
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
<h3>API-Key:<?php if($settings["akikey"] !== "") {echo "✓";} ?></h3>
<input id="apikey" name="apikey" placeholder=<?php
    if ($settings["akikey"] !== "") {
        echo $settings["apikey"];
    } else {
        echo "1a2b3c4d-5e6f-7g8h-9i0j-1k2l3m4n5o6p" ;} ?> type="text" class="form-control">
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

</div>

</body></html>
