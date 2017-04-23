<?php





Very mild and sweet with coconut
Medium strength in a thick sauce
Medium Strength with pineapple
Medium Strength with banana
Fairly hot, sweet and sour (condensed)
Fairly hot, sweet and sour (with lentils)
Medium strength with extra onions
Faily hot, sweet and sour (with coconut)
Medium Strength, well garnished, a little dry
Fairly hot, topped with tomato and green pepper
Medium Strength with spinach
Medium Strength topped with fried potato
Faily hot, thick sauce
Very hot, thick sauce and potatoes
Cooked in a delicately flavoured rich cream
Mild, cooked in a creamy sauce
Medium, with onion, green peppers and tomatoes in a thick sauce
Faily hot with fresh green chilli, green peppers, onions and tomatoes
Slightly hot and sour with Chef's special recipe. Fairly dry
Faily hot, marinated in garlic sauce. Subtly flavoured with ginger, green chilli and capsicum

$subcats = array(
	array("Murgh Chilli","Faily hot with green chillies, special spice and a touch of mosala sauce"),
	array("Rezala","Medium with green chillies, green peppers and tomato"),
	array("Special Jalfreyzi", ""),
	array("Makhoni", "Cooked with butter and fresh cream"),
	array("Royal", ""),
	array("Butter",""),
	array("Ginger", ""),
	array("Peshuari","Sultana and Almonds"),
	array("Special", ""),
	array("Chat", "Main"),
	array("Special Rogan","Chef\'s special spice and a touch of mosala sauce"),
	array("Shalimar", "Medium topped with spicy mushrooms"),
	array("Mowchack","Mild and creamy"),
	array("Delight", "Very mild"),
	array("Garlic Zool", ""),
	array("Butter Mosala", ""),
	array("Bahar", "Cooked in Aubergine. Faily hot"),
	array("Methi", "Medium"),
	array("Bombay","Fairly Hot"),
	array("Bhuna Mosala", ""),
	array("Morisa", "Fairly Hot"),
	"Kurma",
	"Basic Curry",
	"Malaya",
	"Kashmir",
	"Pathia",
	"Dhansak",
	"Du-piaza",
	"Ceylon",
	"Bhuna",
	"Rogan",
	"Sag",
	"Salli",
	"Madras",
	"Vindaloo",
	"Mosala",
	"Pasanda",
	"Korai",
	"Jalfreyzi",
	"Achar",
	"Garlic Chilli");

foreach ($subcats as $sc)
{
	//trying to see if
	$stmt = $db->prepare("INSERT INTO subcategories(category_id,name,descripton,sort_order) VALUES(:cat,:name,:descr,:sort)");

	$stmt->bindParam(':cat', $cat_id);
	$stmt->bindParam(':name', $cat_id);
	$stmt->bindParam(':desc', $cat_id);
	$stmt->bindParam(':sort', $cat_id);

	$stmt->execute();

	$stmt->fetch


}

?>