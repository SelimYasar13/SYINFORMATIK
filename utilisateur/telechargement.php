<?php
  include('config.php');



  $date = date('Y-m-d H:i:s');

  if (isset($_SESSION['user_id'])) {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('cours',$_SESSION['user_id'], $date));
    }
    else {
      $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
      $req->execute(array('cours',0, $date));
    }




  $q = 'SELECT id,sujet,fichier,etat FROM cours WHERE id= '.$_GET['id'];
  $req = $bdd->query($q);
  $results = $req->fetchAll(PDO::FETCH_ASSOC);
  foreach ($results as $key => $value) {
  }
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
  
  ?>
