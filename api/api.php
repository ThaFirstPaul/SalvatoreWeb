<?php session_start();
    function get_mysql() {
        $mysql = new mysqli("127.0.0.1", "root", "password", "website");
        
        if ($mysql->connect_error) {
            die($mysql->connect_error);
        }
        
        return $mysql;
    }
    
    function get_users() {
        return get_mysql()->query("select * from logins");
    }
    
    function login($username, $password) {
        $password = hash("sha256", $password);
        return get_mysql()->query("select count(*) from logins where username = '$username' and password = '$password'")->fetch_assoc()["count(*)"] > 0;
    }
    
    function checkuser($username) {
        return get_mysql()->query("select count(*) from logins where username = '$username'")->fetch_assoc()["count(*)"] > 0;
    }
    
    function changepass($username, $oldpassword, $newpassword) {
        $oldpassword = hash("sha256", $oldpassword);
        
        if (get_mysql()->query("select count(*) from logins where username = '$username' and password = '$oldpassword'")->fetch_assoc()["count(*)"] > 0) {
            $newpassword = hash("sha256", $newpassword);
            return get_mysql()->query("update logins set password = '$newpassword' where username = '$username'");
        }
    }
    
    function changerank($username, $rank) {
        return get_mysql()->query("update logins set rank = '$rank' where username = '$username'");
    }
    
    function getrank($username) {
        return get_mysql()->query("select rank from logins where username = '$username'")->fetch_assoc()["rank"];
        
    }
    
    function register($username, $password) {
        if (!checkuser($username)) {
            $password = hash("sha256", $password);
            get_mysql()->query("insert into settings (username) values ('$username')");
            return get_mysql()->query("insert into logins (username, password) values ('$username', '$password')");
        } else {
            $_SESSION["error_type"] = "Username taken!";
            header("Location: error.php");
        }
        $_SESSION["error_type"] = "Failed to sign up!";
        header("Location: error.php");
    }
    
    function getsettings($username){
        return get_mysql()->query("select * from settings where username = '$username'")->fetch_assoc();
    }
    
    function setemail($username, $email){
        return get_mysql()->query("update settings set email = '$email'where username = '$username'");
    }
    
    function setapikey($username, $apikey){
        return get_mysql()->query("update settings set apikey='$apikey' where username = '$username'");
    }
    
    function deleteuser($username){
        get_mysql()->query("delete from settings where username = '$username'");
        return get_mysql()->query("delete from logins where username = '$username'");
    }
    
    function gethyp(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://api.hypixel.net/key?key=???&uuid=8f87171a-48f3-42c5-ab2d-ee7f18d8e8ff');
        $result = curl_exec($ch);
        curl_close($ch);
        
        $obj = json_decode($result);
        return $obj->record->queriesInPastMin;
    }
    
    
    function get_messages() {
        return get_mysql()->query("select * from messages order by id desc limit 20");
    }
    
    function send_message($username, $message) {
        
        
        return get_mysql()->query("insert into messages (username, message) values ('$username', '$message')");
    }
    
    
    ?>
