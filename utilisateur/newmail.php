<?php
session_start();
include('config.php');

$insertsql = $bdd->prepare('UPDATE site_user SET mail = ? WHERE user_id ="'. $_SESSION['user_id'].'"  ');
$success =  $insertsql->execute([$_POST['mail']]);

echo (int) $success;
?>
