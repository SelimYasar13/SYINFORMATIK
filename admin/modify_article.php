<?php
include('header_admin.php');
include('config.php');
require_once 'function.php';
$article = getArticle($bdd, 1, $_GET['id']); ?>

    <div class="container">
      <form role="form" action="" method="POST">
      <h2>Modifier l'article "<?= $article->title ?>"</h2>
      <h4>Le titre :</h4>
      <input type="text" name="title" value="<?= $article->title ?>"/>
      <br>
      <h4>Le sujet :</h4>
      <input type="text" name="subject" value="<?= $article->subject ?>"/>
      <br>
      <h4>Le contenu :</h4>
      <textarea name="content"> <?= $article->content ?></textarea>
      <br>
      <h4>L'auteur :</h4>
      <input type="text" name="autor" value="<?= $article->autor ?>"/>
      <br>
      <br>
      <input type="submit" name="modify" value="Je modifie !" class="btn btn-dark btn-block">
    </form>
    </div>
</body>
</html>
<?php

if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
header('location: connexion_admin.php');
}

if (isset($_POST['modify'])) {
 if (!empty($_POST['title']) AND !empty($_POST['subject']) AND !empty($_POST['content']) AND !empty($_POST['autor'])) {
   $insertsql = $bdd->prepare('UPDATE article SET
      title ="'.$_POST["title"].'" , subject ="'.$_POST["subject"].'", content ="'.$_POST["content"].'", autor ="'.$_POST["autor"].'"
      WHERE article_id ="'. $_GET['id'].'"  ');
      $insertsql->execute(array($_POST['title'], $_POST['subject'], $_POST['content'], $_POST['autor']));
 }
}
?>
