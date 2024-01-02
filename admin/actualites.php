<?php

    include('header_admin.php');
    include('config.php');
    if (!$_SESSION['admin']) {
      header('location: connexion_admin.php');
    }

$req = $bdd->query('SELECT * FROM article');

$actualites = $req->fetchAll();

echo '<div class="container" id="contienttouttou">
      <p id="titleuserlist">Liste des actualités</p>

';

foreach ($actualites as $article): ?>


          <img class="img"src="../image/<?=$article['image'] ?>">
          <span class="card-title">
            <?=$article['title'] ?>
            </span>
        <div class="card-content">
          <p>
            <?= $article['content']?> <br /> Par : <?= $article['autor'] ?>
          </p>
        </div>
        <div class="card-action">
          <a href="single_article.php?id=<?= $article['article_id'] ?> ">Voir l'article en entier</a>

        </div>


<hr class="separaterule">
<?php endforeach ?>
</div>

  </body>
  </html>
