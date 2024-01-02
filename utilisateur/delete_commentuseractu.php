<?php
include('config.php');
include('connexion_check.php');
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $ra = $bdd->prepare(' DELETE FROM article_comment WHERE id = ? ');
  $ra->execute(array($id));
  header('location: actualites.php');
}
 ?>
