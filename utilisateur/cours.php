<?php
session_start();
include('connexion_check.php');
include('config.php');
include('user_header.php');
include('../style/style.php');
$date = date('Y-m-d H:i:s');


 $q = $bdd->prepare('SELECT id,sujet,fichier,etat,image,temps,niveau,matiere,description FROM cours WHERE id = ?');
 $q->execute(array($_GET['id']));


$courseinfo = $q->fetch(PDO::FETCH_ASSOC);

 $courseinfo['matiere'];
 $q = 'SELECT AVG(note) FROM note WHERE cours_id = ? ';
 $res = $bdd->prepare($q);
 $results = $res->execute(array($_GET['id']));
 $results = $res->fetch();
 $results = (int)$results['AVG(note)'];

 $req = $bdd->prepare('INSERT INTO visited_course(course_id, sujet_cours, user_id, date) VALUES(?, ?, ?, ?)');
 $req->execute(array($_GET['id'], $courseinfo['sujet'] , $_SESSION['user_id'], $date));

?>
<div class="container" id="contientout">


<div class="container" id="courstitlemarg">


<h1 class="titlecours">
<?php echo $courseinfo['sujet']?>
</h1>
<div class="description">
  <?php echo $courseinfo['description'];?>

</div>
<div class="container" id="banner">


  <div class="details">
    <span class="courstemps"><img id="svgmarg1" class="svgicon" src="../image/chargement.svg"><?=$courseinfo['temps']?>h  </span>


    <span class="coursniveau"><img id="svgmarg" class="svgicon" src="../image/niveau.svg"><?=$courseinfo['niveau']?></span>

  </div>
  <?php  if ($results==1) {
      ?>
      <div id="ratinggg" class="rating rating2">
        <a >★</a>
        <span id="coursnote">: Note</span>
      </div>
    <?php }
    elseif ($results==2) {
      ?>
      <div id="ratinggg" class="rating rating2">

        <a >★</a>
        <a >★</a>
        <span id="coursnote">: Note</span>
      </div>
    <?php }
    elseif ($results==3) {
      ?>
      <div  id="ratinggg" class="rating rating2">
        <a  >★</a>
        <a  >★</a>
        <a  >★</a>
        <span id="coursnote">: Note</span>
      </div>
    <?php }
    elseif ($results==4) {
      ?>
      <div id="ratinggg"  class="rating rating2">
        <a >★</a>
        <a >★</a>
        <a >★</a>
        <a >★</a>
        <span id="coursnote">: Note</span>
      </div>
    <?php }
    elseif ($results==5) {
      ?>
      <div id="ratinggg"  class="rating rating2">
        <a  >★</a>
        <a  >★</a>
        <a  >★</a>
        <a  >★</a>
        <a  >★</a>
        <span id="coursnote">: Note</span>
      </div>
    <?php } ?>
  </div>

</div>
<div class="container" id="formalite">
  <h1 class"formatitle">Commencer l'apprentissage</h1>
</div>

<div class="container" id="framecontainer">

<iframe id="coursframe" src="../files/<?=$courseinfo['fichier']?>" width="100%" height="800px"></iframe>
</div>

<?php $id=$_GET['id']; ?>
<div class="container" id="divqcm">
  <a class="contact1-form-btn" href="exo.php?id=<?=$id?>">Lancer le QCM</a>

</div>


<?php


$q = 'SELECT note FROM note WHERE user_id = ? AND cours_id = ?';
$res = $bdd->prepare($q);
$results = $res->execute(array($_SESSION['user_id'],$_GET['id']));

?>


<?php
if ($res->fetch() == false) { ?>

<div class="container" id="gradediv">
  <h2 class="notetitle"> Vous avez apprécier le cours ? Laissez une petite note ! </h2>
  <div id="ratinggg"  class="rating rating2"><!--
  --><a href="vote.php?id=<?php echo $_GET['id'] ?>&stars=5" title="Give 5 stars">★</a><!--
  --><a href="vote.php?id=<?php echo $_GET['id'] ?>&stars=4" title="Give 4 stars">★</a><!--
  --><a href="vote.php?id=<?php echo $_GET['id'] ?>&stars=3" title="Give 3 stars">★</a><!--
  --><a href="vote.php?id=<?php echo $_GET['id'] ?>&stars=2" title="Give 2 stars">★</a><!--
  --><a href="vote.php?id=<?php echo $_GET['id'] ?>&stars=1" title="Give 1 stars">★</a>
  </div>
  <?php  ?>

<?php }
$res = $bdd->prepare($q);
$results = $res->execute(array($_SESSION['user_id'],$_GET['id']));
if ($res->fetch() == false) {
  $qa = "INSERT INTO note(user_id,cours_id,note) VALUES (user_id,cours_id,note)";
  $res = $bdd->prepare($qa);
  $res->execute(array('user_id'=>$_SESSION['user_id'],'cours_id'=>$_GET['id'],'note'=>$_GET['stars']));
}
?>

</div>



<div class="container" id="commzer">


<div class="container" id="commentaires">
<textarea name="comment" id="comments" class="input1" rows="1" cols="70" placeholder="Laissez un commentaire, <?=$_SESSION['pseudo']?> !"></textarea>
<button type="button" class="contact1-form-btn" onclick="Com()"name="button">Poster</button>
</div>
</div>

<?php
  $idcours = $_GET['id'];
  $req3 = ('SELECT user_id FROM site_user WHERE user_id = fk_user_id');
   $stmt2 = $bdd->prepare('SELECT content, comment_id, publication_date,fk_user_id,pseudo,badge FROM comment,site_user WHERE course_id = ? and user_id =(SELECT user_id FROM site_user WHERE user_id = fk_user_id )');
   $stmt2->execute([$idcours]);
  $comm = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  $q = 'SELECT content, fk_user_id, publication_date, comment_id, pseudo,badge FROM comment, site_user';
  $req = $bdd->query($q);
  $results = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($comm as $comment => $value) {
  $qbadge = 'SELECT link FROM badge WHERE badge_level = ?';
  $reqbadge = $bdd->prepare($qbadge);
  $reqbadge->execute([
    $value['badge']
  ]);
  $resultsbadge = $reqbadge->fetch(PDO::FETCH_ASSOC);

  echo  '<div class="container" id="commentsection"><span id="pseudocomment">' . $value["pseudo"] . $resultsbadge['link'] . ' :</span>';

  echo'<div class="container" id="commentvalue">' .$value['content']. '</div>';
  if($_SESSION['user_id']== $value['fk_user_id']) {

  ?> <td><a href="delete_commentuser.php?id=<?php echo $value['comment_id']; ?>">Supprimer mon commentaire</a></td> <?php
}


echo '<span id="commentdate">' . $value['publication_date']. '</span>';
  echo '</div>';

  // code...
}




    // code...

   ?>


</div>


<script type="text/javascript" src="../js/comment.js">

</script>

<script type="text/javascript">

</script>

<footer id="footer">
  <div class="container" id="containerfooter">
              <ul class="ulfooter">
                <li class="nav-item">
                  <a class="nav-link" id="nava" href="nous.php"><img id="imgheader" style="" src="../image/nous.svg" alt="">NOUS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nava" href="cgu.php"><img id="imgheader" style="" src="../image/cgu.svg" alt="">CGU</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" id="nava" href="contact.php">
                  <img id="imgheader" style="" src="../image/contactheader.svg" alt="">Un problème ? contact</a>
              </li>
        </ul>
      </div>


  </div>
</footer>
          </body>

          </html>
