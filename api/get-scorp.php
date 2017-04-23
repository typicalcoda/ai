<?php
include('../helper.php'); include('../members/auth.php');

$cat_id = $_POST['category_id'];

// Checking if it's a subcategory or a category
$stmt = $db->prepare("SELECT * FROM subcategories WHERE category_id=:cat");
$stmt->bindParam(':cat', $cat_id);
$stmt->execute();
$count = $stmt->rowCount();
$is_subcategory = $count > 0 ? true : false;


if($count == 0 ){

	$stmt = $db->prepare("SELECT * FROM products WHERE category_id=:cat");
	$stmt->bindParam(':cat', $cat_id);
	$stmt->execute();
}



$response = $stmt->fetchAll();
array_push($response, array("is_subcategory" => $is_subcategory));
echo json_encode($response);



?>