<?php

include('config.php');
include('connexion_check.php');
include('user_header.php');
$date = date('Y-m-d H:i:s');

if (isset($_SESSION['user_id'])) {
  $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
  $req->execute(array('cours',$_SESSION['user_id'], $date));
  }
  else {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('cours',0, $date));
  }
  $q = 'SELECT id,sujet,fichier,etat FROM cours WHERE etat = 1';
  $req = $bdd->query($q);
  $results = $req->fetchAll(PDO::FETCH_ASSOC);
  foreach ($results as $key => $value) {
  }

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Liste des fichiers</title>
  </head>
  <body>
    <!-- <h1>la liste des fichiers dans bdd</h1> -->
    <table>
      <tr> <!-- Ligne d'un tableau -->
        <th>id</th> <!-- cellule d'entete -->
        <th>sujet</th>
        <th>fichier</th>
        <th>
          <?php
          $q = 'SELECT note FROM note WHERE user_id = ? AND cours_id = ?';
          $res = $bdd->prepare($q);
          $results2 = $res->execute(array($_SESSION['user_id'],$value['id']));
          if ($res->fetch() == false) { ?>
            Merci de Voter
          <?php  }
          else { ?>
            La moyen du vote
          <?php }?>
        </th>

      </tr>
      <?php foreach ($results as $key => $value) { ?>
          <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['sujet']; ?></td>
            <td><ul><li><a href="telechargement.php?id=<?php echo $value['id']; ?>"><?php echo $value['fichier']; ?></a></li></ul></td>
            <td>
              <?php
              $q = 'SELECT note FROM note WHERE user_id = ? AND cours_id = ?';
              $res = $bdd->prepare($q);
              $results = $res->execute(array($_SESSION['user_id'],$value['id']));
              if ($res->fetch() == false) { ?>
                <div class="rating rating2"><!--
                --><a href="vote.php?id=<?php echo $value['id'] ?>&stars=5" title="Give 5 stars">★</a><!--
                --><a href="vote.php?id=<?php echo $value['id'] ?>&stars=4" title="Give 4 stars">★</a><!--
                --><a href="vote.php?id=<?php echo $value['id'] ?>&stars=3" title="Give 3 stars">★</a><!--
                --><a href="vote.php?id=<?php echo $value['id'] ?>&stars=2" title="Give 2 stars">★</a><!--
                --><a href="vote.php?id=<?php echo $value['id'] ?>&stars=1" title="Give 1 stars">★</a>
                </div>
                <?php include('../style/style.php'); ?>
              <?php  }
              else {
                include('config.php');
                include('../style/style2.php');
                $q = 'SELECT AVG(note) FROM note WHERE cours_id = ? ';
                $res = $bdd->prepare($q);
                $results = $res->execute(array($value['id']));
                $results = $res->fetch();
                $results = (int)$results['AVG(note)'];

                if ($results==1) {
                  ?>
                  <div class="rating rating2">
                    <a>★</a>
                  </div>
                <?php }
                elseif ($results==2) {
                  ?>
                  <div class="rating rating2">
                    <a>★</a>
                    <a>★</a>
                  </div>
                <?php }
                elseif ($results==3) {
                  ?>
                  <div class="rating rating2">
                    <a>★</a>
                    <a>★</a>
                    <a>★</a>
                  </div>
                <?php }
                elseif ($results==4) {
                  ?>
                  <div class="rating rating2">
                    <a>★</a>
                    <a>★</a>
                    <a>★</a>
                    <a>★</a>
                  </div>
                <?php }
                elseif ($results==5) {
                  ?>
                  <div class="rating rating2">
                    <a>★</a>
                    <a>★</a>
                    <a>★</a>
                    <a>★</a>
                    <a>★</a>
                  </div>
                <?php }
              }?>

            </td>
          </tr>
      <?php

     } ?>

  </body>
</html>
