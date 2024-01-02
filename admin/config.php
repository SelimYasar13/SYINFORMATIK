<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=annuel_project', 'root','root');
}
catch(Exception $e){
	die('Erreur :' . $e->getMessage());
}
?>
