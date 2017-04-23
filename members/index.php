<?php include('../header.php'); include('auth.php'); ?>


<div class="modifier-modal">

	<h6 class="title">Add modifier to {{item}}</h6>
	<div class="well">
		<ul>
			<?php

			$q = new Query();
			foreach($q->getAll('modifiers', 'sort_order', true) as $m)
				echo "<li><span>$m[price]</span><span>$m[name]</span></li>";


			?>
		</ul>

	</div>

	<button class="btn btn-info apply">OK</button>
	<button class="btn btn-danger exit-modifier">Cancel</button>
</div>

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
		<div class="col-md-7">
			<div class="method">
				<h2>You are ordering for Collection</h2>
			</div>
			<div class="selection-category">
				<h3 id='category_title'>Starters</h3>
			</div>
			<div class="container-fluid none">
				<div class="col-md-4 none">
					<ul class="food-categories">
						<?php

						$q = new Query();
						foreach($q->getAll('categories', 'sort_order', true) as $c)
							echo "<li class=\"food-cat\"><a id=$c[id] href=\"#\">$c[name]</a></li>";


						?>

					</ul>
				</div>
				<div class="col-md-8 none">
					<ul class="list-products"  id="content">



						<!--<p class="text-center">Please select a category</p>-->
					<!--<li><div class="product"><span>Cocoa Dú</span><span>£1.49</span></div></li>
			
						^ the display:inline-block will add a margin-right of 4px, make sure you fix it ;D

					-->

				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="order-summary">
			<h3>Your Order</h3>
			<table id="order" class="table table-condensed product-basket order-list">
				<thead>
					<tr>
						<th width="5">Qty</th>
						<th width=85>Product</th>
						<th width="5">Total</th>
						<th width="5"></th>
					</tr>
				</thead>
				<tbody id="cart">
					
					<!-- This is where our items will be listed as cart items-->




				</tbody>
				<tfoot>
					<tr>
						<th></th>
						<th>Total:</th>
						<th class="price">£<span class="basket-subtotal">0.00</span></th>
						<th></th>
					</tr>
				</tfoot>
			</table>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" onclick="clearCart()" class="btn btn-danger clear-btn"><i class="fa fa-trash" aria-hidden="true"></i>Clear All</button>
					<button id="checkout" type="submit" class="btn btn-success checkout-btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Checkout</button>
				</div>
			</div>
		</div>


		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

		<script>
			var siteUrl = "<?php echo site_url(); ?>";
		</script>
		<script src="<?php echo assets('js/script.js'); ?>"></script>

	</body>
	</html>