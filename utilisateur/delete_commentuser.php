<?php
include('config.php');
include('connexion_check.php');
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $ra = $bdd->prepare(' DELETE FROM comment WHERE comment_id = ? ');
  $ra->execute(array($id));
  header('location: cours.php');
}
 ?>
