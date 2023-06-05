<?php 
$connectDB = new mysqli('localhost', 'root', '', 'db_mfcomp');
if ($connectDB->connect_error) {
    echo "Error: " . $connectDB->connect_error;
	exit();
}else {
	//echo "Successful";
}
  
?>



