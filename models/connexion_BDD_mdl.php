<?php
/* Connection a la base de donnée */
/* array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'') est la pour résoudre le probème des caractères dans la BDD */

/* Connexion à une base MySQL avec l'invocation de pilote */
$dbDsn = 'mysql:host=localhost:3308;dbname=curriculum';
$dbuser = 'root';
$dbpassword = '';

try{
	$pdo = new PDO('mysql:host=localhost:3308;dbname=curriculum','root','', array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING
	
}
catch(PDOException $e){
	echo 'La base de données n\'est pas disponible, merci de ré-éssayer plus tard';
}