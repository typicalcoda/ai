<?php include('../header.php'); include('auth.php'); ?>


<style>
	.order{
		color:#fff;
		min-width: 354px;
		padding: 10px;
		border-radius: 11px;
		border: 1px solid #c7c7c7;
		margin: 10px 0;
		display: inline-block;
		background: #4e4e4e;
		vertical-align: top;
		height:520px;
	}
	.order .timestamp{
		background: #2b9898;
		font-size: 13px;
		border-radius: 15px;
		padding: 2px 5px;
		font-weight: bold;
		font-family: calibri;
		float:right;
	}

	.order .items{
		padding-top:15px;
	}
	.order .items table{
		width:100%;
		margin-bottom: 25px;
	}
	.order .items table thead{
		background:#353535;
	}
	.order .items table thead tr th {
		padding:5px 7px;
	}
	.order .items table tbody tr {
		color:#000;
	}
	.order .items table tbody tr td{
		padding: 10px;
		background: #d8d8d8;
		border-bottom: 1px solid #d0d0d0;
	}
	.order .items .total{
		float:right;
		font-size:23px;
		font-weight:bold;
	}
	.order .items .total:before{
		content: "Total £";
	}
</style>
<div class="container-fluid">
	<div class="container">
		<div class="page-header">
			<h2>Admin</h2>
		</div>

		<h4>Incoming orders</h4>
	<!-- 	<div class="well">
			<div class="order">
				<span class="customer-name">
					<a href="#">Mizan Rahman</a>
				</span>
				<div class="timestamp">ASAP</div>
				<div class="items">				
					<table class="table-hover">
						<thead>
							<tr><th>Qty</th>
								<th>Description</th>
								<th>Price</th>
							</tr></thead>
							<tbody><tr><td>1</td><td>Chicken Tikka (Biryani)</td><td>£8.50</td></tr><tr><td>1</td><td>King Prawn (Biryani)</td><td>£9.95</td></tr><tr><td>1</td><td>Bottle of Coke (Desserts and Drinks)</td><td>£2.50</td></tr><tr><td>1</td><td>Diet Coke (Can) (Desserts and Drinks)</td><td>£0.80</td></tr><tr><td>1</td><td>Coke (Can) (Desserts and Drinks)</td><td>£0.80</td></tr><tr><td>1</td><td>Coke (Can) (Desserts and Drinks)</td><td>£0.80</td></tr><tr><td>1</td><td>Coke (Can) (Desserts and Drinks)</td><td>£0.80</td></tr><tr><td>1</td><td>Coke (Can) (Desserts and Drinks)</td><td>£0.80</td></tr><tr><td>1</td><td>Fish (Murgh Chilli)</td><td>£7.95</td></tr></tbody>
						</table>
						<div class="total">32.90</div>
					</div>
					<div class="options">
						<button class="accept-order btn btn-success">Accept</button>
						<button class="reject-order btn btn-warning">Reject</button>
					</div>
				</div>
				<div class="order">
					<span class="customer-name">
						<a href="#">Jackson Moore</a>
					</span>
					<div class="timestamp">ASAP</div>
					<div class="items">				
						<table class="table-hover">
							<thead>
								<tr><th>Qty</th>
									<th>Description</th>
									<th>Price</th>
								</tr></thead>
								<tbody><tr><td>1</td><td>Vegetable Pakura (Starters)</td><td>£3.75</td></tr><tr><td>1</td><td>Vegetable Pakura (Starters)</td><td>£3.75</td></tr><tr><td>1</td><td>Onion Bhaji (Starters)</td><td>£2.95</td></tr><tr><td>1</td><td>Onion Bhaji (Starters)</td><td>£2.95</td></tr></tbody>
							</table>
							<div class="total">13.40</div>
						</div>
						<div class="options">
							<button class="accept-order btn btn-success">Accept</button>
							<button class="reject-order btn btn-warning">Reject</button>
						</div>
					</div>
					<div class="order">
						<span class="customer-name">
							<a href="#">Jackson Moore</a>
						</span>
						<div class="timestamp">45:00</div>
						<div class="items">				
							<table class="table-hover">
								<thead>
									<tr><th>Qty</th>
										<th>Description</th>
										<th>Price</th>
									</tr></thead>
									<tbody><tr><td>1</td><td>Chicken Tikka (Rezala)</td><td>£6.95</td></tr><tr><td>1</td><td>Mixed (Special Jalfreyzi)</td><td>£6.95</td></tr><tr><td>1</td><td>Peshuari Nan (Bread)</td><td>£2.50</td></tr><tr><td>1</td><td>Cheese Nan (Bread)</td><td>£2.50</td></tr><tr><td>1</td><td>Plain Nan (Bread)</td><td>£2.00</td></tr></tbody>
								</table>
								<div class="total">20.90</div>
							</div>
							<div class="options">
								<button class="accept-order btn btn-success">Accept</button>
								<button class="reject-order btn btn-warning">Reject</button>
							</div>
						</div></div> -->

						<div class="well">
							<h4 class="text-center" style="padding:45px 0;">Loading incoming orders...</h4>
						</div>				
					</div>
				</div>
			</div>

			<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
			<script>
				var siteUrl = "<?php echo site_url(); ?>";
				var orders = [];
				var timer = setInterval(function(){
					orders = [];
					$.ajax({
						type: 'GET',
						url: siteUrl  + 'api/get_active_orders.php',
						success: function(data){
							orders = JSON.parse(data);
							showOrders();
						},
					});
				}, 3000);
				function order_sum(items){
					var totalPrice = 0;
					for(var i = 0; i < items.length; i++){

						totalPrice = (totalPrice + (items[i].Price * 1));

					}
					return totalPrice.toFixed(2);
				}
				function hasNumber(myString) {
					return /\d/.test(myString);
				}

				function respondToOrder(order_id, bool){
					
					//accept the order

					$.ajax({
						type: 'POST',
						url: siteUrl + '/api/order_response.php',
						data: "order_id=" + order_id +"&accept=" + bool,
						success : function(data){
							if(bool){
								window.print();
							}
						}
					});
				}

				function getItems(items){
					var formattedItems = "";
					for(var i = 0; i < items.length; i++){

			//if item has modifier, apply relevant markup

			formattedItems += `<tr><td>` + items[i].Quantity + `</td><td>` + items[i].ProductName + `</td><td>£` + items[i].Price + `</td></tr>`;
		}
		return formattedItems;
	}
	function showOrders(){
		var output = "";
		for (var i = 0; i < orders.length; i++) {
			output +=  `
			<div class="order">
				<span class="customer-name">
					<a href="#">` + orders[i].customer_name + `</a>
				</span>
				<div class="timestamp">`
					+ (hasNumber(orders[i].preferred_time) ? orders[i].preferred_time + "M" : orders[i].preferred_time ) +	
					`</div>
					<div class="items">				
						<table class="table-hover">
							<thead>
								<th>Qty</th>
								<th>Description</th>
								<th>Price</th>
							</thead>
							<tbody>`+
								getItems(JSON.parse(orders[i].items))
								+`</tbody>
							</table>
							<div class="total">`+
								order_sum(JSON.parse(orders[i].items))
								+`</div>
							</div>
							<div class="options">
								<button onclick="respondToOrder(`+orders[i].id+`, true)" class="accept-order btn btn-success">Accept</button>
								<button onclick="respondToOrder(`+orders[i].id+`,false)" class="reject-order btn btn-warning">Reject</button>
							</div>
						</div>`;
					}
					$(".well").html(output);

				}


			</script>
		</body>
		</html>