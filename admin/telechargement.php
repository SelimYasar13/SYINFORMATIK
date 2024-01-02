<?php
  include('config.php');
  $q = 'SELECT id,sujet,fichier,etat FROM cours';
  $req = $bdd->query($q);
  $results = $req->fetchAll(PDO::FETCH_ASSOC);
  foreach ($results as $key => $value) {
  }
    if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $q='SELECT id,sujet,fichier,etat FROM cours WHERE id = $id';
    $req = $bdd->prepare($q);
    $req->execute();
    $results = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $key => $value) {
    }
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$value['fichier'].'"');
    header('Content-Tranfer-Encoding: binary');
    ob_clean();
    readfile("../files/".$value['fichier']);
  }
  ?>
