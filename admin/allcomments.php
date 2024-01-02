<?php
include('config.php');
include('header_admin.php');;


  $q = 'SELECT content, comment_id,publication_date,fk_user_id FROM comment';
  $req = $bdd->query($q);
  $results = $req->fetchAll(PDO::FETCH_ASSOC);
?>
  <div class="contintout">

<h1 class="h1zin">Liste des commentaires</h1>
 <?php foreach ($results as $key => $value) {
   $reqq = $bdd->prepare('SELECT pseudo FROM site_user WHERE user_id = ? ');
   $reqq->execute([
     $value['fk_user_id']
   ]);
   $res = $reqq->fetch(PDO::FETCH_ASSOC);
   ?>
   <div class="container" id="usercontainer">
     <div class="containcontact">
       <p> Auteur : <?php  echo $res['pseudo'];  ?></p>
   <p> Contenu : <?php echo $value['content'];?></p>
     </div>

       <a href="supprimercomment.php?id=<?php echo $value['comment_id']; ?>">Supprimer ce commentaire</a></td>

     </div>
     <hr class="separaterule">
<?php } ?>
</div>
</body>
</html>
