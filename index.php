<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>


  
  <link rel="stylesheet" href="css/bootstrap.min.css"><title>Salvatore Guild - Home</title></head><body>

<script>
function changeit(title) {
    document.getElementById(title).innerHTML = "<h3>Work in progress!</h3>";
   window.alert("Work in progress! :P")
}
</script>

<?php require("api/api.php");
require("header.php");
?>
<div class="jumbotron">
<div class="container">
<h1 id="title">Salvatore Guild Website<br>
</h1>
<p>The online hub for Salvatore Guild Members.<br>
</p>
</div>
</div>

<div class="container">
<table style="text-align: left; table-layout:fixed; width: 100%;" border="0" cellpadding="5"
cellspacing="10">
<tbody><tr>
<th><h3>List of all Users:</h3></th>
<th id="gtitle"><h3>Friends:</h3></th>
<th id="mtitle"><h3>Members online:</h3></th>
</tr>
<tr>
<th><button onclick="window.location.href='/users.php'" type="submit" class="btn btn-primary">All Users</button>
</th><th><button onclick="window.location.href='/friends.php'" type="submit" class="btn btn-primary">Work in progress!</button>
</th><th><button onclick=changeit("mtitle") type="submit" class="btn btn-primary">Work in progress!</button>
</th>
</tr>
</tbody></table>
<?php require("messageboard.php"); ?>
</div>
</body></html>
