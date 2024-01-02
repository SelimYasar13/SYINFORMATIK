<?php
session_start();
include('config.php');
$user_id = $_SESSION['user_id'];

if (isset($_POST['title']) && isset($_POST['content']))
{
$q = "INSERT INTO mail_contact(title,content,user_id) VALUES (?,?,?)";
$res = $bdd->prepare($q);
$success = $res->execute(
  [
    $_POST['title'],
    $_POST['content'],
    $_SESSION['user_id']
  ]
);
echo(int) $success;


}
  else
  {
    echo "Erreur";
  }








?>
