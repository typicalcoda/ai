<?php
include('Models/Query.php');include('Models/Customer.php');

// SESSION
session_start();

if(!isset($_SESSION['User'])){
	header("location:".site_url());
} 

// DB INFO
$server = "localhost";
$user = "root";
$pass = "";

try {$db = new PDO("mysql:host=$server;dbname=all_india", $user, $pass);$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);} catch (Exception $e) {echo "Connection failed: " . $e->getMessage();}



// UTILITIES
$site_url = 'http://localhost/all_india/';
 function assets($uri){
	global $site_url;
	return $site_url. "public/".$uri;
}

function site_url (){
	global $site_url;
	return $site_url;
}

function error ($msg){
	echo "<div class='error'>".$msg."</div>";
}

function set($param){
	return (isset($_POST["$param"]) && strlen($_POST["$param"]));
}

function qb(){
	return $qb = new \Query;
}

?>