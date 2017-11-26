<?php
require 'config.php';


function connect_db($host, $username, $password, $port, $db)
{
		try
		{
			$dsn = "mysql:host=$host;port=$port;dbname=$db";
			$db = new PDO($dsn, $username, $password);
			$db->exec("SET CHARACTER SET utf8");
			//echo "Connection to DB successfull\n";
			return $db;

		}

		catch(PDOException $e) 
		{
			error_log($e->getMessage(), 3, ERROR_LOG_FILE);
			error_log("Error connection to DB", 3, ERROR_LOG_FILE);
			echo "Error connection to DB\n";
		}
}

