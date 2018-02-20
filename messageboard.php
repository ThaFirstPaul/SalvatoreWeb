<?php if (isset($_SESSION["username"])) { ?>

<br><hr><br>
<div class="container">
<h2>Messages:</h2>
<form id="form" method="post" action="message.php">
<input id="message" name="message" placeholder="Message" class="form-control">
<button id= "sendmessage" name="deletesure" type="submit" class="btn btn-primary">Send</button>
</form>
</div>

<?php } else {
    echo "<h4>Sign in to send messages!</h4>";
} ?>

<br>

<div class="container">
<table class="table table-bordered">
<tr>
<th>Username</th>
<th>Message</th>
<?php if (getrank($_SESSION["username"]) === "administrator") { echo "<th>Delete</th>";} ?>
</tr>

<?php
    $messages = get_messages();
    while ($message = $messages->fetch_assoc()) { ?>
<tr>
<td><?php echo $message["username"] ?></td>
<td><?php echo $message["message"] ?></td>
<?php if (getrank($_SESSION["username"]) === "administrator") { ?>
<td>
<form id="form" method="post" action="message.php">
<button type="submit" name="deletemessage" class="btn btn-danger">Delete</button>
</form>
</td>
<?php } ?>

</tr>

<?php } ?>

</table>
</div>
