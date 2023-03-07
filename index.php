<?php

if (isset($_GET['orderby'])&& $_GET['orderby']!=""){//when we first load
$orderby=$_GET['orderby'];
}else{
		$orderby=1;
	}

function mark_selected($opt){//when page reloads , user chose different order
	if (isset($_GET['orderby'])&& $_GET['orderby']!=""){
	$orderby=$_GET['orderby'];
	}else{
		$orderby=1;
	}
	
	if ($orderby==$opt){
	echo 'selected="selected" ' ;
	}
}


switch($orderby){
	/*case "1":
		$sql_order='item_id';
		break;*/
		
		case "1":
		$sql_order='item_name';
		break;
		
		case "2":
		$sql_order='item_price ASC';
		break;
		
		case "3":
		$sql_order='item_price DESC';
		break;
		
	default:
			$sql_order='item_id';
}

require( "config.php" );
$sql_get_all = "SELECT * FROM crud_tbl ORDER BY $sql_order";
$result = $makeconnection->query( $sql_get_all );


	


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
	<meta content="width=device-width,initial-scale=1.0" name="viewport">
<title>Items</title>	
<link href="style.css" rel="stylesheet" type="text/css">
	
	<script>


function JS_delete_item(item_id){
	if (confirm('Are you sure you want to delete this item?')) {
		window.location.href = 'delete.php?id='+item_id;
	}
}
		
	function jumpMenu(selObj){ 
  window.location.href =selObj.options[selObj.selectedIndex].value;
 
}	

</script>
	
	
	
</head>

<body>
	<div id="container">
	<header>
		<h1>Item Catalog</h1>
		<p><a href="add.php">Add Item</a></p>
		</header>

		<main>
			<p>Order by:</p>
		<select onChange="jumpMenu(this)">	
			<option <?php mark_selected('1'); ?> value="index.php?orderby=1" >item name</option>	
			<option <?php mark_selected('2'); ?>  value="index.php?orderby=2">item Price low to high</option>
			<option <?php mark_selected('3'); ?>  value="index.php?orderby=3">item Price high to low</option>	
		</select>
		<div id="item_catalog">
			<?php while ($row = $result->fetch_assoc()) { ?>
			
		<div class="item_small">
			<a href="item_detail.php?id=<?php echo $row["item_id"]; ?>">
				<div class="small_img_holder">
			<img src="item_images/<?php echo $row["item_img"];?>" alt="<?php echo $row["item_name"]; ?>">
					</div>
				
			<h3 class="item_name"><?php echo $row["item_name"]; ?></h3>
			<p class="item_price">$<?php echo $row["item_price"]; ?></p>
            <p class="item_country">Country: <?php echo $row["item_country"]; ?></p>

		</a>
				
						<p class="modify_link"><a href="modify.php?id=<?php echo $row["item_id"]; ?>">Modify</a></p>
	<p class="delete_link"><a href="javascript:JS_delete_item(<?php echo $row['item_id']; ?>);">Delete</a></p>
				</div>
			
			<!--end item small-->
		
					
		
		<?php } //end while?>
			
			
	
			
			</div>
		<!--end item catalog-->
		
				<div class="myclear"></div>
		
		</main>
		<!--end main-->
	
	
	</div>
	<!--end container-->
	
	
	
</body>
</html>