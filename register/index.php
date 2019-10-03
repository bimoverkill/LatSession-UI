<?php

$username = $_POST["username"];
$password = $_POST["password"];
$is_seller = $_POST["is_seller"];

$c = curl_init();

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost:5000/user/register/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "username=$username&password=$password&is_seller=$is_seller");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = json_decode(curl_exec($ch), true);

curl_close ($ch);

if( $server_output["content"]["registration_status"] == 1 || 
    $server_output["content"]["registration_status"] == "1") {
    header("Location: status/sukses.html");
} else {
    header("Location: status/gagal.html");
}

die();