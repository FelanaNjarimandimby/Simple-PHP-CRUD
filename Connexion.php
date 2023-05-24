<?php
	$pdo = null;
	$dsn = 'mysql: host=localhost; dbname=election';
	$dbUser = 'root';
	$pw = '';

	try{
		$pdo= new PDO($dsn, $dbUser, $pw);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo 'La connexion n\'est pas etablie: ' . $e->getMessage();

	}
	
	?>