<?php
	// Root url for the site
	define('ROOT_URL', 'http://localhost/barcode/');


	// Database parameters
	// Data source name
	define('DSN', 'mysql:host=localhost;dbname=webpcr');

	// Hostname
	define('DB_HOST', 'localhost');

	// DB user
	define('DB_USER', 'root');

	// DB password
	define('DB_PASSWORD', '');

	// DB name
	define('DB_NAME', 'webpcr');

  try{
  $conn = new PDO(DSN, DB_USER, DB_PASSWORD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  $errorMessage = $e->getMessage();
  echo $errorMessage;
  exit();
}
?>
