<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Salvatore Guild</a>
        </div>
        <?php if (!isset($_SESSION["username"])) { ?>
            <div name="div" class="form-group">
            <form method="post" name="login" action="login.php" class="navbar-form navbar-right" onsubmit="return validateInput()">
                <input maxlength="10" type="text" name="username" placeholder="Username" class="form-control">
                <input maxlength="12" type="password" name="password" placeholder="Password" class="form-control">
            
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
                <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
            </form>
            </div>
        <?php } else { ?>
            <div class="navbar-right">
            <p class="navbar-text">Welcome, <?php
                echo $_SESSION["username"];
            ?>!</p>
            
        <form method="post" action="login.php" class="navbar-form navbar-right">
            <button type="submit" name="settings" class="btn btn-primary">Settings</button>
            <button type="submit" name="logout" class="btn btn-primary">Log Out</button>
        </form>
    </div>
    <?php } ?>
</div>
</nav>

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
