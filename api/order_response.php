<?php
$server = "localhost";
$user = "root";
$pass = "";

try {$db = new PDO("mysql:host=$server;dbname=all_india", $user, $pass);$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);} catch (Exception $e) {echo "Connection failed: " . $e->getMessage();}

$order_id =  $_POST['order_id']; //set to accept
$accept_order =  ($_POST['accept']); //set to accept
$val = ($accept_order == 'true' ? 'Accepted' : 'Rejected');

$result = $db->prepare("UPDATE orders SET status='$val' WHERE id=" . $order_id); 
$result->execute();


?>