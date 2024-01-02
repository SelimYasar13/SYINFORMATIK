<?php
session_start();
include('config.php');
$user_id = $_SESSION['user_id'];

if (isset($_POST['donation_message']) && isset($_POST['given_sum']))
{
  $date = date('Y-m-d H:i:s');
$q = "INSERT INTO donation(given_sum ,donation_message ,giver_id ,date) VALUES (? ,? ,? ,? )";
$res = $bdd->prepare($q);
$res->execute(
  [
    $_POST['given_sum'],
    $_POST['donation_message'],
    $_SESSION['user_id'],
    $date
  ]
);
echo "bien vu bg";


}
  else
  {
    echo "Erreur";
  }








?>
