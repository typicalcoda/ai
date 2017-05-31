<?php include('../header.php'); include('auth.php'); ?>

<div class="container-fluid">
	<div class="container">
		<div class="page-header">
			<h2>Order Reporting</h2>
		</div>
		<?php

		$server = "localhost";
		$user = "root";
		$pass = "";
		try {
			$db = new PDO("mysql:host=$server;dbname=all_india", $user, $pass);$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);} catch (Exception $e) {echo "Connection failed: " . $e->getMessage();
		}
		$result = $db->prepare("select distinct order_date from orders"); 
		$result->execute();
		$dates = $result->fetchAll();
		
		foreach($dates as $date) {
			$price = 0;
			$date = $date['order_date'];
			echo "<br><Br><h4>".$date."</h4><hr>";
			$result = $db->prepare("select * FROM orders WHERE order_date='".$date."'"); 
			$result->execute();
			$orders = $result->fetchAll();
			foreach($orders as $order){
				echo "<div style='margin:10px 0;background:#dcdbdb;padding: 12px;border-radius: 20px;'>";
				echo "<h5> <b>Order #" .$order['id']. "</b> - ". $order['order_date']." </h5><hr>";
				$items = json_decode($order['items']);
				
				$orderTotal = 0;
				foreach($items as $item){

					$price = (($price * 1) + $item->Price);
					$orderTotal = (($orderTotal * 1) + $item->Price);
					echo "• <i>(£". $item->Price .")</i> ".$item->ProductName."<br>";
				}
				echo "<br><b>Order Total: £".number_format((float)$orderTotal, 2, '.', '')."</b>";

				echo "</div>";
			}
			echo "<h2>Daily Total: £".number_format((float)$price, 2, '.', ''). "</h2>";

		}	
		?>
	</div>
</body>
</html>