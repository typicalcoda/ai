<?php include('helper.php'); ?>
<!DOCTYPE html>
<head>
	<title>All India Takeaway</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo assets('css/style.css');?>">
</head>
</head>
<body>

	<div class="container-fluid none">
		<div class="col-md-12 none">
			<div class="inside-mainimg">
				<div class="container-fluid top-banner">
					<div class="col-md-1"></div>
					<div class="col-md-3">
						<a href="<?php echo site_url(); ?>">
							<img class="logo" src="<?php echo assets('images/logo.png'); ?>">
						</a>
					</div>
					<div class="col-md-8">
						<div class="phone">
							<p><span>Call Us:</span> 01202 420951 | 01202 421884 
								<?php 

								if(isset($_SESSION['User'])) //if anyone is logged in
								{	
									$usr = unserialize($_SESSION['User']);
									echo " | <a href='".site_url()."logout.php'>Logout</a> (".$usr->firstname.")";
								}

								else {
									
									echo "<a href=".site_url()."login.php>";
									echo "<button class='btn btn-info'>Login</button>";
									echo "</a>";

								}


								?>

							</p>
						</div>
						<div class="nav">
							<ul class="navigation">
								<li><a href="<?php echo site_url()?>">Home</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Online Ordering</a></li>
								<li><a href="<?php echo site_url()?>login.php">Members</a></li>
								<li><a href="#">Testimonials</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>