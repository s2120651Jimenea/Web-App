<?php
	$a =  $_POST['text1'];
	$b =  $_POST['text2'];

	$conn = mysqli_connect("locaLhost","root","","db_mfcomp");
	
	$conn->query("INSERT INTO user(username,password) VALUES('$a','$b')");
	

	echo json_encode( 
		array(
			'lastID' => $conn->insert_id,
			'username' => $a,
			'password' => $b,
			'message' => "<div class='alert alert-success animated pulse'> <i class='glyphicon glyphicon-ok'> </i> Successfully saved. </div>"		
		) 
	);
	
	
?>