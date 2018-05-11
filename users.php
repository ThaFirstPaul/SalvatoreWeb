<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Salvatore Guild - All Users</title>
        </head>
<body>
    <?php require("api/api.php");
        require("header.php");
        $admin = getrank($_SESSION["username"])==="administrator";
        if (admin) {?>
    <script>
        function editRank(str) {
            var xhttp;
            if (str.length == 0) { return; }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "gethint.php?q="+str, true);
            xhttp.send();
        }
    </script>
    
    <?php } ?>


    <div class="jumbotron">
        <div class="container">
            <h1>All Users<br>
            </h1>
            <p>A list of all users<?php if ($admin) { echo ", their rank and settings.";} else {echo " and their rank.";} ?> <br>
            </p>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 15%;">Username</th>
                <th style="width: 15%;">Rank</th>
                <?php if ($admin) { echo "<th style='width: 30%;'>API-Key</th><th style='width: 30%;'>Email</th>"; } ?>

            </tr>
            
            <?php
                $users = get_users();
                while ($user = $users->fetch_assoc()) {
                ?>
            <tr>
                <td><?php echo $user["id"] ?></a></td>
                <td><?php echo $user["username"] ?></td>

                
                <?php if (!$admin) {
                    echo '<td>' . $user["rank"] . '</td>';
                } else {
                    
                    ?>
                <td><select name="rank">
                        <option value="member" <?php if($user["rank"]==="member"){echo "selected";}?>>Member</option>
                        <option value="administrator" <?php if($user["rank"]==="administrator"){echo "selected";}?>>Administrator</option>
                    </select>
                    
                    <?php
                    
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
</body></html>
