<?php

include('../helper.php');

try{
	$order 			= json_decode($_POST['order']);
	$items 			= json_encode($order->order_items);
	$current_date 	= date('Y-m-d');
	$preferred_time = $order->preferred_time;

	$stmt 			= $db->prepare("INSERT INTO orders(customer_id,items,order_date,preferred_time) VALUES(:customer_id,:items,:order_date,:preferred_time)");

	$stmt->bindParam(':customer_id', $order->order_customer_id);
	$stmt->bindParam(':items', $items);
	$stmt->bindParam(':order_date', $current_date);
	$stmt->bindParam(':preferred_time', $preferred_time);

	$stmt->execute();
	echo json_encode(array("message" => "Order inserted successfully!","order_id" => $db->lastInsertId()));
} catch(Exception $e){

	echo $e->getMessage();

}


?>
