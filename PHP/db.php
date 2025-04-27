<?php

$serverName = "local_db";
$userName = "root";
$password = "";
$dbName = "test";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to Connect";
    exit();
}
echo "Connection Success!"
?>