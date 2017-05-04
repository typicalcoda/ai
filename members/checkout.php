<?php include('../header.php'); include('auth.php');?>

<div id="modal">
	<div class="content">
		<h3>Select Product</h3>

		<div class="products">
			
			<div class="product">
				<ul id="modal-content" class="list-products">
					
					<!-- This is where all of our products are loaded into, in the modal -->

				</ul>
			</div>

		</div>
	</div>

</div>


<div class="container-fluid">


	<div class="container">
		<h1>Checkout</h1>
		<p>Below is a summary of your order for your review.</p>

		<table class="table table-condensed product-basket order-list">

			<?php
			if(isset($_SESSION['order'])){
				echo $_SESSION['order'];
			} else {
				echo '<p style="padding: 16px 13px;background: #a5daac;display: inline-block;border-radius: 11px;font-family: segoe ui;border: 1px solid #a8ce9e;color: #5c6b68;">No order m8</p>';
			}
			?>
		</table>

		<button class="btn btn-success">Confirm Order</button> <!-- no payment gateway necessary, just output a conclusive msg.-->
		<a href="<?php echo site_url(); ?>members/?order=1">
			<button class="btn btn-default">Return</button> <!-- back with sesh restoration in cart-->
		</a>

	</div>
	



	<script>
		var siteUrl = "<?php echo site_url(); ?>";
	</script>
	<script src="<?php echo assets('js/script.js'); ?>"></script>

</body>
</html>