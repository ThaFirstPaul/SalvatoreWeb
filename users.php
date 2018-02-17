<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Salvatore Guild - All Users</title>

  
</head><body>
<?php require("api/api.php");
require("header.php");
?>
<div class="jumbotron">
<div class="container">
<h1>All Users<br>
</h1>
<p>A list of all users<?php if (getrank($_SESSION["username"])==="administrator") { echo ", their rank and settings.";} else {echo " and their rank.";} ?> <br>
</p>
</div>
</div>
<div class="container">
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Username</th>
<th>Rank</th>
<?php if (getrank($_SESSION["username"])==="administrator") { echo "<th>API-Key</th><th>Email</th>"; } ?>

</tr>

<?php
    $users = get_users();
    while ($user = $users->fetch_assoc()) {
?>
<tr>
<td><a href="user.php?id=<?php echo $user["id"] ?>"><?php echo $user["id"] ?></a></td>
<td><?php echo $user["username"] ?></td>
<td><?php echo $user["rank"] ?></td>

<?php if (getrank($_SESSION["username"])==="administrator") {
    $settings = getsettings($user["username"]);
    
    echo "<td>"; if ($settings["apikey"] == "") {
        echo "Not Given";
    } else {
        echo $settings["apikey"];
    }echo "</td><td>"; if ($settings["email"] == "") {
        echo "Not Given";
    } else {
        echo $settings["email"];
    }
}?>

</td>
</tr>
<?php } ?>
</table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body></html>
