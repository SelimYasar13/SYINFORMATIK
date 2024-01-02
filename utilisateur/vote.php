<?php
session_start();
include('config.php');

$q = 'SELECT note FROM note WHERE user_id = ? AND cours_id = ?';
$res = $bdd->prepare($q);
$results = $res->execute(array($_SESSION['user_id'],$_GET['id']));
if ($res->fetch() == false) {
  $q = "INSERT INTO note(user_id,cours_id,note) VALUES (:user_id,:cours_id,:note)";
  $res = $bdd->prepare($q);
  $res->execute(array('user_id'=>$_SESSION['user_id'],'cours_id'=>$_GET['id'],'note'=>$_GET['stars']));
  header('location:listefichier.php');
}
 ?>
