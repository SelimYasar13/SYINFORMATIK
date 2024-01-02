<?php
session_start();
include('config.php');
$date = date('Y-m-d H:i:s');

if (isset($_SESSION['user_id'])) {
  $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
  $req->execute(array('contact',$_SESSION['user_id'], $date));
  }
  else {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('contact',0, $date));
  }

$insertsql = $bdd->prepare('INSERT INTO mail_contact(title,content,user_id) VALUES(?, ?,?)');
$insertsql->execute(array($_POST['titre'], $_POST['content'],$_SESSION['user_id']));
echo 'Message envoyé avec succès';

?>
