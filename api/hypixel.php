<?php
function gethyp(){
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://api.hypixel.net/session?key=ab407917-7e54-4dfe-a1f4-1d43d509be26&uuid=8f87171a-48f3-42c5-ab2d-ee7f18d8e8ff');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);
return $obj->success;
}
?>