<?php
function getArticle($bdd, $nb = null, $id = null){
	if($nb AND !$id){
		 $req = $bdd->query('SELECT * FROM article LIMIT' .$nb);
		 $articles = $req->fetchAll();
	}

	elseif($id){
		$req = $bdd->query('SELECT * FROM article WHERE article_id = '.$id);
		$articles = $req->fetchObject();
	}
	else {
		 $req = $bdd->query('SELECT * FROM article ');
		 $articles = $req->fetchAll();
	}
		return $articles;
}



?>
