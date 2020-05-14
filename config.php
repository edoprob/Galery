<?php

$dbname = "galery";
$dbuser = "root";
$dbpass = "root";
$dbhost = "localhost";

$dsn = "mysql:dbname=".$dbname.";host=".$dbhost;

try {
	$pdo = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
	echo "Erro: ".$e->getMessage();
	exit;
}


?>