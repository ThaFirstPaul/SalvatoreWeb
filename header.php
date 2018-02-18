<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            
            <a class="navbar-brand" href="/">Salvatore Guild</a>
        </div>
        <?php if (!isset($_SESSION["username"])) { ?>
            <form method="post" action="login.php" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username" class="form-control">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
                <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
            </form>
        <?php } else { ?>
            <div class="navbar-right">

<p class="navbar-text">Welcome, <?php
    echo $_SESSION["username"]; ?>!</p>
                <form method="post" action="login.php" class="navbar-form navbar-right">
                    <button type="submit" name="settings" class="btn btn-primary">Settings</button>
                    <button type="submit" name="logout" class="btn btn-primary">Log Out</button>
                </form>
            </div>
        <?php } ?>
    </div><!-- /.container-fluid -->
</nav>
