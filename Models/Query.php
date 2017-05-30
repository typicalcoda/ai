<?php
class Query{
	
	public function getAll ($table, $order, $asc){
		global $db;

		$sort = null;
		$sort == $asc ? "ASC" : "DESC";

		if(strlen($order) > 0)
			$order = "ORDER BY $order";
		
		$result = $db->prepare("SELECT * FROM $table $order $sort"); 
		$result->execute();
		return $result->fetchAll();
	}
}
?>