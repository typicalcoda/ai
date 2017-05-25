<?php include('../header.php'); include('auth.php');?>

<div class="container-fluid">
	<div class="container">
		<h1>Checkout</h1>
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
				echo '<p style="padding: 16px 13px;background: #a5daac;display: inline-block;border-radius: 11px;font-family: segoe ui;border: 1px solid #a8ce9e;color: #5c6b68;">No order m8</p>';
			}
			?>
		</table>

		
		<button id="order-completed" type="button" class="btn btn-success">Confirm Order</button> 

		<a href="<?php echo site_url(); ?>members/?order=1">
			<button type="button" class="btn btn-default">Return</button> <!-- back with sesh restoration in cart-->
		</a>
	


	</div>
	


	<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script>
		var siteUrl = "<?php echo site_url(); ?>";
		var items = [];
		$(document).ready(function(){



			$("#order-completed").click(function(){

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
				
				
				$.ajax({

					url: siteUrl + "members/order_completed.php",
					type: 'POST',
					data: "items="+JSON.stringify(items),
					success: (data) => {

						$("body").html(data);

					}
				});
				
			});


		});

	</script>
	<script src="<?php echo assets('js/script.js'); ?>"></script>
	

</body>
</html>