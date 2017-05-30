<?php
die("index");
require_once('helper.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>All India Takeaway</title>
</head>
<style>
	@import url('https://fonts.googleapis.com/css?family=Roboto');


	body,html{
		background: url('public/images/bg.jpg') no-repeat center center fixed;
		background-size:cover;
		height:100vh;
		overflow:hidden;
	}
	.dropback{
		background:rgba(0, 0, 0, 0.38);
		top:0;
		left:0;
		right:0;
		bottom:0;
		position:fixed;
		z-index:10;
	}

	.box{
		text-align:center;
		height:100vh;
		position:absolute;
		top:30%;
		left:50%;
		transform:translateX(-50%);
		z-index:1000;
	}

	.menu{
		padding:0; margin:0; list-style:none;
		padding-top:30px;
	}

	.menu li {
		display:inline-block;
		font-family: 'Roboto', sans-serif;
		font-size:17px;
	}

	.menu li a{
		color:white;
		
		text-transform:uppercase;
		padding:5px 15px;
		transition:.3s ease-in-out;
	}

	.menu li a, .menu li a:active, .menu li a:focus{
		text-decoration: none;
	}

	.menu li:not(:last-child){
		border-right:2px solid #500c0c;
	}

	.menu li a:hover{
		cursor:pointer;
		color:#c19f9f;
	}

}



</style>
<body>

	


	<div class="box">
		<div class="logo">
			<img src="public/images/logo.png" alt="">
		</div>

		<ul class="menu">
			<li><a href="<?php echo site_url()?>">Home</a></li>
			<li><a href="<?php echo site_url()?>about.php">About Us</a></li>
			<li><a href="<?php echo site_url()?>login.php">Online Ordering</a></li>
			<!--<li><a href="<?php echo site_url()?>login.php">Members</a></li>-->
			<li><a href="<?php echo site_url()?>testimonials.php">Testimonials</a></li>
			<li><a href="<?php echo site_url()?>contact.php">Contact Us</a></li>
		</ul>
	</div>


	<div class="dropback"></div>
</body>
</html>