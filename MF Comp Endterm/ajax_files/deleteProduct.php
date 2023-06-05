<?php
// delete_product.php

// Retrieve the productId from the AJAX request
$prod_id = $_POST['id'];

// TODO: Connect to the database
$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_DATABASE = 'db_mfcomp';

try {
  // Create a PDO connection
  $conn = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Prepare the delete statement
  $stmt = $conn->prepare("DELETE FROM tbl_product WHERE prod_id = :id");
  $stmt->bindParam(':id', $prod_id);

  // Execute the delete statement
  if ($stmt->execute()) {
    // Deletion successful
    $response = "success";
  } else {
    // Deletion failed
    $response = "error";
  }

  // Close the statement and connection
  $stmt = null;
  $conn = null;
} catch (PDOException $e) {
  // Handle database errors
  $response = "error";
}

echo $response;
?>