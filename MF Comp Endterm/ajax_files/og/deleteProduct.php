<?php 
	$id = $_POST['akoSiID'];
	
	$conn = mysqli_connect("localhost","root","","db_mfcomp");
				
	$query = $conn->query("DELETE FROM tbl_product WHERE prod_id = '$id'");
	
?>