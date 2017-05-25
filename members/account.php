<?php include('../header.php'); include('auth.php');?>

<div class="container-fluid">
	<div class="container">



		<h1>Profile of <?php $usr = unserialize($_SESSION['User']); echo $usr->firstname; ?></h1>
		<p>Your order history is displayed below</p>

		
			<table class="table table-striped table-hover">
			<thead >
				<tr>
				<th>Date</th>
				<th>Items</th>
				<th>Total</th>
			</thead>
				<tbody>
					
				</tbody>
			</table>


	</div>
	


	<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script>
		var siteUrl = "<?php echo site_url(); ?>";
	</script>

</body>
</html>