<?php
include('user_header.php');
included('config.php');
include('connexion_check');
?>

    <div class="container">
    	<?php

     include('config.php');

require_once 'function.php';

	$article = getArticle($bdd, 1, $_GET['id']);



    ?>

    <h1><?= $article->title ?></h1>
    <h5><?= $article->subject ?></h5>
    <h5><?= $article->content ?></h5>
    <img class="img"src="../image/<?=$article->image ?>">
    <h6><?= $article->autor ?></h6>

    <?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])): ?>
    <!-- <div class="row"> -->
    	<a class="btn" href="delete_article.php?id=<?= $article->article_id ?>">SUPPRIMER CET ARTICLE</a>
    	<a class="btn" href="modify_article.php?id=<?= $article->article_id ?>">MODIFIER CET ARTICLE</a>
    	<a class="btn" href="add_article.php">AJOUTER UN ARTICLE</a>

<?php endif ?>

    </div>
</body>
</html>
