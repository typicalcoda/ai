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
					<?php
					$result = $db->prepare("SELECT * FROM orders WHERE customer_id=".$usr->id); 
					$result->execute();
					$orders = $result->fetchAll();
					foreach($orders as $order): ?>

					<tr>
						<?php $order_total = 0;?>
						<!-- Order Date-->
						<td><?php echo $order['order_date']; ?></td>

						<!-- Orer Items -->
						<td>
							<ul>

								<?php 

								$items = json_decode($order['items']);

								
								foreach($items as $item): ?>
								<li>
									<!-- Main Item -->
									<?php 

									echo $item->ProductName ."  |  £".  $item->Price;
									$order_total += $item->Price;

									if(count($item->Modifiers) > 0)
									{
										echo "<ul>";
										foreach($item->Modifiers as $mod){
											echo "<li>&nbsp&nbsp•<small>".$mod->ModifierName ."  |  £".  $mod->ModifierPrice."</small></li>";

											$order_total += $mod->ModifierPrice;
										}
										echo "</ul>";

									}



									?>

								</li>


								<?php 
								endforeach;
								?>
							</ul></td>


							<!-- Order Total -->
							<td>

								<?php 
								echo "£".number_format($order_total, 2);
								?>

							</td>

						</tr>
						<?php
						endforeach; 
						?>






					</tbody>
				</table>


			</div>



			<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
			<script>
				var siteUrl = "<?php echo site_url(); ?>";
			</script>

		</body>
		</html>