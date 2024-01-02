<?php
include('config.php');
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $ra = $bdd->prepare('UPDATE cours SET etat = 1 WHERE id = ?');
  $ra->execute(array($id));
}
$q = 'SELECT id,sujet,fichier,etat FROM cours';
$req = $bdd->query($q);
$results = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $key => $value) {
  
}



 ?>
