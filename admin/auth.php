<?php
if(!isset($_SESSION['Admin'])){
	header("location:".site_url()."admin_login.php");
} else {
	$usr = serialize($_SESSION['Admin']);
}
?>