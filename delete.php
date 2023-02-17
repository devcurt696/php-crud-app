<?php
require('config.php');  
if(isset ($_GET['id'])&& $_GET['id']!=""){
$item_id=$_GET['id'];

$sql_delete = "DELETE FROM crud_tbl WHERE item_id = $item_id";
$result = $makeconnection->query( $sql_delete );

}
header("Location: index.php");			
?>	