<?php session_start(); if (!isset($_SESSION["username"])) { header("Location: index.php"); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Salvatore Guild - Apply</title>

  
</head><body>
<?php require("api/api.php");
require("header.php");
?>
<div class="jumbotron">
<div class="container">
<h1 id="title">Application Form<br></h1>
<p>Apply for a guild rank or promotion.</p>
</div>
</div>

<div class="container">
<form method="post" name="apply" action="apply.php" onsubmit="return validateInput()" class="form-inline">
    <h3>Your Ingame Name:</h3>
    <input maxlength="16" type="name" name="name" placeholder="IGN" class="form-control"><br>

<h3>Your current Rank:</h3>
<select name="rank">
    <option value="officer">Guild Member</option>
    <option value="officer">Guild Officer</option>
    <option value="hofficer">Head Officer</option>
    <option value="admin">Admin</option>
    <option value="hadmin">Head Admin</option>
</select>

<br><h3>Rank you are applying for:</h3>
<select name="rank">
    <option value="officer">Guild Officer</option>
    <option value="hofficer">Head Officer</option>
    <option value="admin">Admin</option>
    <option value="hadmin">Head Admin</option>
</select>

<br><h3>Why do you think this role suits you?</h3>
<textarea name="message" placeholder="Write as much as you want." rows="10" cols="60"></textarea>
<br><br>

<button type="submit" name="apply" class="btn btn-primary">Submit</button>

</form>
</div>
<br><br><br>
</body></html>

<script>
function validateInput() {
    var user = document.forms["login"]["username"];
    var pass = document.forms["login"]["password"];
    if (user.value === "") {
        alert("Please enter a Username!");
        user.style.backgroundColor = "red"
        return false;
    }
    else if (pass.value === "") {
        alert("Please enter a Password!");
        pass.style.backgroundColor = "red"
        return false;
    }
}
</script>

