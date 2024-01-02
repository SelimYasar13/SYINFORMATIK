<?php
session_start();
include('config.php');
include('user_header.php');

$id_user = $_SESSION['user_id'];
$q = "SELECT DISTINCT course_id,sujet_cours FROM visited_course WHERE user_id = $id_user";
  $req = $bdd->prepare($q);
  $req->execute(array($_SESSION['user_id']));
  $results = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container" id="coursevisitedcont">
  <h2>Derniers cours visités</h2>
  
 <?php foreach ($results as $key => $value) {
   $q = "SELECT sujet,date,niveau,matiere,description,temps,image,id FROM cours WHERE id = ?";
     $req = $bdd->prepare($q);
     $req->execute(array($value['course_id']));
     $resultss = $req->fetch(PDO::FETCH_ASSOC);
     ?>

   <div class="container" id="course">

       <img class="imgcourse" src="../image/<?=$resultss['image']?>">

       <div class="container" id="coursinfo">

         <div class="titlescours">

       <h6><a href="#"><?=$resultss['matiere'] ?></a></h6>


       <h5><a href="cours.php?id=<?=$resultss['id']?>"><?=$resultss['sujet'] ?></a>
         </h5>
       </div>


       <p class="coursdesc"><?=$resultss['description']?>
       </p>




<div class="bottomflex">

<div class="spansimg">
<span class="indic"><img id="svgmarg" class="svgicon" src="../image/bar-chart-line.svg"><?=$resultss['niveau']?></span>
<span class="indic" id="spn"> <img id="svgmarg1" class="svgicon" src="../image/loader-2-line.svg"><?=$resultss['temps']?>h</span>
</div>
<button type="button" class="contact1-form-btn"name="button"><a href="exo.php?id=<?=$resultss['id']?>">Accéder au QCM</a> </button>

<?php  if ($results==1) {
?>
<div id="ratinglist" class="rating rating2">
<a >★</a>
<span id="coursnote">: Note</span>
</div>
<?php }
elseif ($results==2) {
?>
<div id="ratinglist" class="rating rating2">

<a >★</a>
<a >★</a>
<span id="coursnote">: Note</span>
</div>
<?php }
elseif ($results==3) {
?>
<div  id="ratinglist" class="rating rating2">
<a  >★</a>
<a  >★</a>
<a  >★</a>
<span id="coursnote">: Note</span>
</div>
<?php }
elseif ($results==4) {
?>
<div id="ratinglist"  class="rating rating2">
<a >★</a>
<a >★</a>
<a >★</a>
<a >★</a>
<span id="coursnote">: Note</span>
</div>
<?php }
elseif ($results==5) {
?>
<div id="ratinglist"  class="rating rating2">
<a  >★</a>
<a  >★</a>
<a  >★</a>
<a  >★</a>
<a  >★</a>
<span id="coursnote">: Note</span>
</div>
<?php } ?>

<a class="btn btn-light btn-lg blue" id ="buttondl" href="telechargement.php?id=<?php echo $resultss['id']; ?>">Télécharger</a>


</div>
     </div>

   </div>
   <hr class="separaterule">
 <?php  $q = 'SELECT note FROM note WHERE user_id = ? AND cours_id = ?';
   $res = $bdd->prepare($q);
   $results2 = $res->execute(array($_SESSION['user_id'],$resultss['id']));

}

     ?>
</div>


</div>
