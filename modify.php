<?php
//Modify (update) item 
require('config.php'); 
require('upload_function.php');

$item_id=$_GET['id'];

$sql_get_item = "SELECT * FROM crud_tbl WHERE item_id=$item_id";
$result = $makeconnection->query( $sql_get_item);
$row = $result->fetch_assoc();
//print_r($row );

if (isset($_POST['submit'])) {

$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_brand = $_POST['item_brand'];
$item_desc = $_POST['item_desc'];
	
	if(isset($_POST['item_update_img']) && $_POST['item_update_img']=='yes'){
$item_img=upload_img();
		
$sql_modify = "UPDATE crud_tbl SET  
 item_name = '$item_name',
 item_price = '$item_price',
 item_brand = '$item_brand',
 item_desc = '$item_desc',
 item_img='$item_img'
 
			  WHERE item_id = '$item_id'";
			  
			  }else{
$sql_modify = "UPDATE crud_tbl SET  
 item_name = '$item_name',
 item_price = '$item_price',
 item_brand = '$item_brand',
 item_desc = '$item_desc'
 
 
			  WHERE item_id = '$item_id'";
			  }
	
	

$result = $makeconnection->query( $sql_modify );

header ("Location: index.php");
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
			<meta content="width=device-width,initial-scale=1.0" name="viewport">	
<title>Modify Items</title>
<link href="style.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="jquery-validation/dist/jquery.validate.js"></script>
	<link href="jquery-validation/basic_form_styling.css" rel="stylesheet" type="text/css">
	
	
	<script>
	function show_upload(){
		
		if(document.modify_item_form.item_update_img.checked){
		document.getElementById("optional_upload").innerHTML=
'<input type=\"file\" name=\"item_img\" id=\"item_img\">';
		}else{
		document.getElementById("optional_upload").innerHTML=""	
		}
			
		}
	
	</script>
	
	
	
</head>

<body>
	<div id="container">
	<header>
		<h1>Item Catalog</h1>
		<p><a href="index.php">Back to Catalog</a></p>
		</header>

		<main>
		
			<form action="" method="post" enctype="multipart/form-data" id="modify_item_form" name="modify_item_form">
			<table width="100%" border="0"  cellspacing="10">
				<tr>
				<td colspan="2" align="center"> <h2>Modify item</h2></td>
			  </tr>
    <tr>
      <td width="40%" height="74" align="right" valign="middle">Item name</td>
      <td><input type="text" name="item_name" id="item_name" required value="<?php echo $row["item_name"]; ?>"></td>
    </tr>
    <tr>
      <td height="73" align="right" valign="middle">Item Price $</td>
       <td><input type="number" step="0.01" name="item_price" id="item_price" required value="<?php echo $row["item_price"]; ?>"></td>
    </tr>
    <tr>
      <td height="87" align="right" valign="middle">Item Brand</td>
          <td><input type="text" name="item_brand" id="item_brand" required value="<?php echo $row["item_brand"]; ?>"></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Item description</td>
		<td><textarea name="item_desc" id="item_desc" required rows="8" cols="21"><?php echo $row["item_desc"]; ?></textarea></td>
    </tr>
    <tr>
      <td height="46" align="right" valign="middle">Item image</td>
      <td>
		  <p>Existing image:</p>
		  		<img src="item_images/<?php echo $row["item_img"];?>" alt="<?php echo $row["item_name"]; ?>" height="200">
		  <br>
		 <p>Do you want to replace image?  
			 <input type="checkbox" name="item_update_img" id="item_update_img" value="yes" onclick="show_upload()">
		  </p> 
		  <p id="optional_upload"> </p>
		  
      </td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>

</table>
		
	</form>	
		  <script>
					$("#modify_item_form").validate();
				</script>
	  </main>
		<!--end main-->
	
	
	</div>
	<!--end container-->
	
	
	
</body>
</html>