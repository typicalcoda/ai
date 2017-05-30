<?php
$server = "localhost";
$user = "root";
$pass = "";

try {$db = new PDO("mysql:host=$server;dbname=all_india", $user, $pass);$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);} catch (Exception $e) {echo "Connection failed: " . $e->getMessage();}

$order_id =  $_GET['order_id']; //set to accept

$result = $db->prepare("SELECT `status` FROM `orders` WHERE `id`=".$order_id); 
$result->execute();
$value = $result->fetchColumn();
echo $value;


?>