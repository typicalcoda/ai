<?php
$server = "localhost";
$user = "root";
$pass = "";

try {$db = new PDO("mysql:host=$server;dbname=all_india", $user, $pass);$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);} catch (Exception $e) {echo "Connection failed: " . $e->getMessage();}

$result = $db->prepare("SELECT orders.id,orders.order_date,orders.status,orders.preferred_time,orders.items,CONCAT(customers.firstname, ' ', customers.lastname) AS 'customer_name' FROM orders LEFT JOIN customers ON orders.customer_id = customers.id WHERE orders.status = 'Pending'"); 
$result->execute();
$res = $result->fetchAll();
echo json_encode($res);

?>