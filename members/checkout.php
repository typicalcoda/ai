<?php include('../header.php'); include('auth.php');?>

<div class="container-fluid">
	<div class="container">
		<h1>Checkout</h1>
		<div class="wrapper">
			<p>Below is a summary of your order for your review.</p>

			<table class="table table-condensed product-basket order-list">

				<?php
				function sieve($string){


					$string = str_replace(
						'<button data-qty="plus" class="qty"><i class="fa fa-plus fa-fw"></i></button>', 
						'', 
						$string);

					$string = str_replace(
						'<button data-qty="minus" class="qty"><i class="fa fa-minus fa-fw"></i></button>',
						'',
						$string);

					$string = str_replace(
						'<button class="remove"><i class="fa fa-remove"></i></button>',
						'',
						$string);

					$string = str_replace(
						'<button class="leaf"><i class="fa fa-leaf fa-fw"></i></button>',
						'',
						$string);





					echo $string;
				}

				if(isset($_SESSION['order'])){
					sieve($_SESSION['order']);


				} else {
					echo '<p style="padding: 16px 13px;background: #a5daac;display: inline-block;border-radius: 11px;font-family: segoe ui;border: 1px solid #a8ce9e;color: #5c6b68;">No orders</p>';
				}
				?>
			</table>

			<h4>Preferred time:</h4>
			<select id="order-time" class="form-control">
				<option value="ASAP">As soon as possible</option>
				<option value="15:00">in 15:00 minutes</option>
				<option value="30:00">in 30:00 minutes</option>
				<option value="45:00">in 45:00 minutes</option>
				<option value="2">in 1 hour</option>
				<option value="1">in 2 hours</option>
			</select>

			<div style="padding-top:25px;"">
				<button id="order-completed" type="button" class="btn btn-success">Confirm Order</button> 

				<a href="<?php echo site_url(); ?>members/?order=1">
					<button type="button" class="btn btn-default">Return</button> <!-- back with sesh restoration in cart-->
				</a>
			</div>
		</div>

	</div>
	


	<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script>
		function startListening(order_id){
			setInterval(() => {

				$.ajax({
					type: 'GET',
					url: siteUrl + '/api/order_accepted.php',
					data: "order_id=" + order_id,
					success: function(data){

						if(data == "Accepted"){
							$(".wrapper").fadeOut(400, function(){

								$("h1").text("Success!");
								$(this).html("<p>Your order has been accepted, please expect it to arrive soon...</p>");

								$(this).fadeIn();
							});
						} else if(data == "Rejected") {
							$(".wrapper").fadeOut(400, function(){
								$("h1").text("Order not accepted...");
								$(this).html("<p>Unfortunately, the restaurant could not accept your order at this time. :(</p>");
								$(this).fadeIn();
							});
						}
					}
				});
			}, 3000);
		}

		var siteUrl = "<?php echo site_url(); ?>";
		var items = [];
		var preferredTime = $("#order-time").val();

		$(document).ready(function(){

			$("#order-completed").click(function(){
				var preferredTime = $("#order-time").val();
				//Serialize order -> JSON format
				$("#cart tr td").each(function(i){

					var row = $("#cart tr")[i];

					$(row).each(function(x){
						
						// Extract values using DOM with string manipulation
						var productQty = $(row).children()[x].innerText.substr(1);
						var productName = $($(row).children()[x + 1]).clone().children().remove().end().text();
						var productPrice = $(row).children()[x + 2].innerText.split('\n')[0].substr(1);
						
						// Declare an array to store modifiers
						var productModifiers  = [];

						// Extract modifier names 
						var modifierColumn = $(row).children()[x + 1];
						var modifierPriceColumn = $(row).children()[x + 2];
						
						// Extract modifier prices
						var parts = modifierColumn.innerText.replace(productName, '').split('\n');
						var parts2 = modifierPriceColumn.innerText.split('\n');

						// Extract modifier names
						var mNames = []; 
						for(var i = 0; i < parts.length; i++)
							if(parts[i] != "")
								mNames.push(parts[i].substr(1));
							
							var mPrices = []; 
							for(var i = 0; i < parts2.length; i++)
								if(parts2[i] != "" && i > 0)
									mPrices.push(parts2[i].substr(1));


								for(var i = 0; i < mNames.length; i++)
								{
									var modifier = {
										ModifierName : mNames[i],
										ModifierPrice : mPrices[i]
									};

									productModifiers.push(modifier);
								}


								var item = {
									Quantity : productQty,
									ProductName : productName,
									Price: productPrice,
									Modifiers : productModifiers
								};

								items.push(item);


							});	
				});
				
				
				var customer_id = "<?php echo unserialize($_SESSION['User'])->id; ?>";
				

				var order = {
					order_customer_id: customer_id,
					order_items: items,
					preferred_time : preferredTime
				}

				$.ajax({

					url: siteUrl + "members/order_completed.php",
					type: 'POST',
					data: "order="+JSON.stringify(order),
					success: (data) => {
						var response = JSON.parse(data);
						console.log(response);
						if(response.message == "Order inserted successfully!"){
							
							//Listen for the restaurants response
							startListening(response.order_id);


							$(".wrapper").fadeOut(400, function(){

								$(this).html("<p>Your order has been placed, please wait a moment while the restuarant responds...</p>");

								$(this).fadeIn();
							});

							//window.location.href = siteUrl;
						} else {
							alert("Something went wrong.");
						}

					}
				});
			});
		});
	</script>
	<script src="<?php echo assets('js/script.js'); ?>"></script>
</body>
</html>