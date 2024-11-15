<?php
define('DB_NAME', 'PH587033_kickstartyou');
define('DB_USER', 'kickstartyou');
define('DB_PSWD', 'lockdown');
define('DB_HOST', 'mysql10.namesco.net');


/*define('DB_NAME', 'PH587033_kickstartyou');
define('DB_USER', 'root');
define('DB_PSWD', 'root');
define('DB_HOST', 'localhost');*/


try
{
	return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PSWD, [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
	]);
}
catch(PDOException $e)
{
	echo 'Failed to establish a database connection : ' . $e->getMessage();
	exit;
}
