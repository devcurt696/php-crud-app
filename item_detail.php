<?php

$item_id=$_GET['id'];

require( "config.php" );
$sql_get_details = "SELECT * FROM crud_tbl WHERE item_id = $item_id";
$result = $makeconnection->query( $sql_get_details );

$row = $result->fetch_assoc()
	


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
	<meta content="width=device-width,initial-scale=1.0" name="viewport">
<title>Item details</title>	
<link href="style.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	<div id="container">
	<header>
		<h1>Item Details</h1>
		<p><a href="index.php">Back to full catalog</a></p>
		</header>

		<main>
		<div id="item_catalog">
		
			
		<div class="item_big">
			
				<div class="big_img_holder">
					<img src="item_images/<?php echo $row["item_img"];?>" alt="<?php echo $row["item_name"]; ?>">
				</div>
			
				<div class="big_info_holder">
					
					<p class="item_id">Item ID: <?php echo $row["item_id"]; ?></p>
					<h3 class="item_name">Item name: <?php echo $row["item_name"]; ?></h3>
					<p class="item_price">Item price: $<?php echo $row["item_price"]; ?></p>
					<p class="item_brand">Item brand: <?php echo $row["item_brand"]; ?></p>
					<p class="item_desc">Item description:</p>
					<pre><?php echo $row["item_desc"]; ?></pre>
                	<br/>
                	<p class="item_country">Item country: <?php echo $row["item_country"]; ?></p>

				</div>
				<!--end item info-->
			</div>
		
			<!--end item big-->
		
					
		
	
			
			</div>
		<!--end item catalog-->
		
				<div class="myclear"></div>
		
		</main>
		<!--end main-->
	
	
	</div>
	<!--end container-->
	
	
	
</body>
</html>