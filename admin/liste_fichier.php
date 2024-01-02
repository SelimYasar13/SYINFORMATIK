<?php
include('config.php');
include('header_admin.php');


  $q = 'SELECT id,sujet,fichier,etat,user_id FROM cours ';
  $req = $bdd->query($q);
  $results = $req->fetchAll(PDO::FETCH_ASSOC);
 ?>


  <body>
    <div class="container">

    <div class="contienntout">

    <h1 class="marre">Tous les fichiers de cours</h1>
    <table class="selimdesigndenfant">
      <tr> <!-- Ligne d'un tableau -->
        <th>id</th> <!-- cellule d'entete -->
        <th>Etat</th>
        <th>sujet</th>
        <th>fichier</th>
        <th>Ajouté Par </th>
      </tr>
      <?php foreach ($results as $key => $value) { ?>
          <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['etat']; ?></td>
            <td><?php echo $value['sujet']; ?></td>
            <td><ul><a href="telechargement.php?id=<?php echo $value['id']; ?>"><?php echo $value['fichier']; ?></a></ul></td>



            <?php
            $u = 'SELECT first_name,last_name FROM site_user WHERE user_id = ?';
            $req2 = $bdd->prepare($u);
            $req2->execute(array($value['user_id']));
            $results2 = $req2->fetch();
             ?>
             <td><?php echo $results2['first_name'] . " " . $results2['last_name']; ?></td>
          </tr>
          <tr>
            <td><a href="confirmer.php?id=<?php echo $value['id']; ?>">CONFIRMER</a></td>
            <td><a href="supprimer.php?id=<?php echo $value['id']; ?>">SUPPRIMER</a></td>
            <td><a href="telechargement.php?id=<?php echo $value['id']; ?>">TELECHARGER</a></td>
          </tr>


      <?php } ?>
    </div>
  </div>


  </body>
</html>
