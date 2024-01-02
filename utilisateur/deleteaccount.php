<?php
session_start();
include('connexion_check.php');
include('config.php');



$stmt = $bdd->prepare('DELETE FROM site_user WHERE user_id = ? ');
if($stmt){
$success =  $stmt->execute([
   $_SESSION['user_id']

]);
echo "Compte supprimer avec succès";
echo(int)$success;
}

else{
  echo "-2";
}
session_destroy();
?>
