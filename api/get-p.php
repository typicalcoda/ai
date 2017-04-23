<?php
include('../helper.php'); include('../members/auth.php');


$subcategory_id = $_GET['sID'];
$response = '';


$sth = $db->prepare("SELECT * FROM products WHERE subcategory_id=:sid");
$sth->execute(array(':sid' => $subcategory_id));

$response = $sth->fetchAll();

echo json_encode($response);




?>