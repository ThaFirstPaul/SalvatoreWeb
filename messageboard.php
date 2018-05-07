<?php if (isset($_SESSION["username"])) { ?>

<br><hr><br>
<div class="container">
<h2>Messages:</h2>
<form autocomplete="off" id="form" method="post" action="message.php">
<input id="message" name="message" placeholder="Message" class="form-control">
<button id= "sendmessage" name="sendmessage" type="submit" class="btn btn-primary">Send</button>
</form>
</div>

<?php } else {
    echo "<br><h4>Sign in to send messages!</h4>";
} ?>

<br>

<div class="container">

<?php

/* If logged in as admin: */

if (getrank($_SESSION["username"]) === "administrator") { ?>

<script type="text/javascript">

function deleteMessage(element) {
   document.getElementById("maintable").deleteRow(element.parentNode.parentNode.rowIndex); 
}</script>

<table id="maintable" class="table table-bordered">
<tr>
<th>id</th>
<th>Time</th>
<th>Username</th>
<th>Message</th>
<th>Delete</th>
</tr>

<?php
    $messages = get_messages();
    while ($message = $messages->fetch_assoc()) { ?>
<tr>
<td><?php echo $message["Id"] ?></td>
<td><?php echo $message["time"] ?></td>
<td><?php echo $message["username"] ?></td>
<td><?php echo $message["message"] ?></td>
<td>
<!-- <form name=<?php echo $message["Id"] ?> id=<?php echo $message["Id"] ?> method="post" action="message.php"> -->
<button type="submit" id=<?php echo $message["Id"] ?> onClick="deleteMessage(this)" class="btn btn-danger">Delete</button>
<!--</form>-->
</td>

</tr>
<?php }; echo "</table>"; } else {

/* If not an admin: */

$messages = get_messages();
while ($message = $messages->fetch_assoc()) {
    echo "<span style='color:green;'>[" . $message["time"] . "]</spang><span style='color:black;'> " . $message["username"] . ": " . $message["message"] . "</span><br><br>"; }} ?>

</div>
