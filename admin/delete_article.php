<?php
session_start();
 include('config.php');

	if (isset($_GET['id'])) {
		$req = $bdd->query('SELECT * FROM article WHERE article_id = ' .$_GET['id']);
		$article = $req->fetch();
		if ($article) {
			$req = $bdd->query('DELETE FROM article WHERE article_id = ' .$_GET['id']);
			header('location: actualites.php');
		}
		else{
			header('location: page_accueil.php');
		}

	}

?>
