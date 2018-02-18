<?php if (isset($_SESSION["username"])) { ?>

<br><hr><br>
    <div class="container">
<h2>Messages:</h2>
<form id="form" method="post" action="sendmessage.php">
<input id="message" name="message" placeholder="Message" class="form-control">
<button id= "sendmessage" name="deletesure" type="submit" class="btn btn-primary">Send</button>
</form>
</div>
<?php } else {
    echo "<h4>Sign in to send messages!</h4>";
}?>

<br>

<div class="container">
<table class="table table-bordered">
<tr>
<th>Username</th>
<th>Message</th>
</tr>

<?php
    $messages = get_messages();
    while ($message = $messages->fetch_assoc()) {
        ?>
<td><?php echo $message["username"] ?></td>
<td><?php echo $message["message"] ?></td>


</tr>
<?php } ?>
</table>
</div>
</div>
