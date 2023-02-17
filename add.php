<?php
require('config.php'); 
require('upload_function.php');




if (isset($_POST['submit'])) {

	//$item_img="first.jpg";
	
$item_img=upload_img();
	
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_brand = $_POST['item_brand'];
$item_desc = $_POST['item_desc'];
	
	
	
	
$insertSQL = "INSERT INTO crud_tbl
(item_name, item_price, item_brand, item_desc ,item_img)
VALUES
('$item_name','$item_price','$item_brand','$item_desc','$item_img')";
$result = $makeconnection->query( $insertSQL );

header ("Location: index.php");
}

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
			<meta content="width=device-width,initial-scale=1.0" name="viewport">	
<title>Add Items</title>
<link href="style.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="jquery-validation/dist/jquery.validate.js"></script>
	<link href="jquery-validation/basic_form_styling.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="container">
	<header>
		<h1>Item Catalog</h1>
		<p><a href="index.php">Back to Catalog</a></p>
		</header>

		<main>
		
			<form action="" method="post" enctype="multipart/form-data" id="add_item_form">
			<table width="100%" border="0"  cellspacing="10">
				<tr>
				<td colspan="2" align="center"> <h2>Add item</h2></td>
			  </tr>
    <tr>
      <td width="40%" height="74" align="right" valign="middle">Item name</td>
      <td><input type="text" name="item_name" id="item_name" required></td>
    </tr>
    <tr>
      <td height="73" align="right" valign="middle">Item Price $</td>
       <td><input type="number" step="0.01" name="item_price" id="item_price" required></td>
    </tr>
    <tr>
      <td height="87" align="right" valign="middle">Item Brand</td>
          <td><input type="text" name="item_brand" id="item_brand" required></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Item description</td>
		<td><textarea name="item_desc" id="item_desc" required rows="8" cols="21"></textarea></td>
    </tr>
    <tr>
      <td height="46" align="right" valign="middle">Item image</td>
      <td>
       <input type="file" name="item_img" id="item_img" required></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>

</table>
		
	</form>	
		  <script>
					$("#add_item_form").validate();
				</script>
	  </main>
		<!--end main-->
	
	
	</div>
	<!--end container-->
	
	
	
</body>
</html>