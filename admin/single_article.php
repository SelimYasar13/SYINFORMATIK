<?php
include('header_admin.php');
?>

    <div class="container" id="containersingle">
    	<?php

     include('config.php');

require_once 'function.php';

	$article = getArticle($bdd, 1, $_GET['id']);



    ?>

    <h1><?= $article->title ?></h1>
    <h5><?= $article->subject ?></h5>
    <h5><?= $article->content ?></h5>
    <img class="img"src="../image/<?=$article->image ?>">
    <h6> Ecrit par <?= $article->autor ?></h6>


    <!-- <div class="row"> -->
    	<a class="contact1-form-btn" href="delete_article.php?id=<?= $article->article_id ?>">SUPPRIMER CET ARTICLE</a>
    	<a class="contact1-form-btn" href="modify_article.php?id=<?= $article->article_id ?>">MODIFIER CET ARTICLE</a>
    	<a class="contact1-form-btn" href="add_article.php">AJOUTER UN ARTICLE</a>



    </div>
</body>
</html>
