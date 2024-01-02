<?php
include('config.php');

if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $ra = $bdd->prepare(' DELETE FROM comment WHERE comment_id = ? ');
  $ra->execute(array($id));
}




 ?>
