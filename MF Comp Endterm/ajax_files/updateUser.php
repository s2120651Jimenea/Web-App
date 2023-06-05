<?php
	$a =  $_POST['text1'];
	$b =  $_POST['text2'];
	$id =  $_POST['ID'];

	$conn = mysqli_connect("locaLhost","root","","db_mfcomp");
	
	$conn->query("UPDATE tbl_users SET user_email = '$a', user_pass = '$b' WHERE user_id = '$id'");
	

	echo json_encode( 
		array(
			'user_id' => $id,
			'user_email' => $a,
			'user_pass' => $b,
			'message' => "<div class='alert alert-success animated pulse'> <i class='glyphicon glyphicon-ok'> </i> Successfully updated. </div>"		
		) 
	);
	
	
?>