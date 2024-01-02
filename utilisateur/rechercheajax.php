<?php
include('config.php');
if(isset($_GET['motclef'])){
  $motclef = $_GET['motclef'];
  $qq = array('motclef'=>$motclef. '%');
  $sql = 'SELECT id,sujet,fichier,etat,image,temps,niveau,matiere,description FROM cours WHERE etat = 1 AND(sujet LIKE :motclef OR matiere LIKE :motclef)';
  $searchq = $bdd->prepare($sql);
   $searchq->execute($qq);
  $count = $searchq->rowCount($sql);

  if($count >= 1){
    while ($result = $searchq->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="container" id="course">

          <img class="imgcourse" src="../image/<?=$result['image']?>">





          <div class="container" id="coursinfo">

            <div class="titlescours">


          <h6><a href="#"><?=$result['matiere'] ?></a></h6>


          <h5><a href="cours.php?id=<?=$result['id']?>"><?=$result['sujet'] ?></a>
            </h5>
          </div>


          <p class="coursdesc"><?=$result['description']?>
          </p>




 <div class="bottomflex">

   <div class="spansimg">
    <span class="indic"><img id="svgmarg" class="svgicon" src="../image/bar-chart-line.svg"><?=$result['niveau']?></span>
    <span class="indic" id="spn"> <img id="svgmarg1" class="svgicon" src="../image/loader-2-line.svg"><?=$result['temps']?>h</span>


    </div>
 <?php  if ($result==1) {
 ?>
 <div id="ratinglist" class="rating rating2">
  <a >★</a>
  <span id="coursnote">: Note</span>
 </div>
 <?php }
 elseif ($result==2) {
 ?>
 <div id="ratinglist" class="rating rating2">

  <a >★</a>
  <a >★</a>
  <span id="coursnote">: Note</span>
 </div>
 <?php }
 elseif ($result==3) {
 ?>
 <div  id="ratinglist" class="rating rating2">
  <a  >★</a>
  <a  >★</a>
  <a  >★</a>
  <span id="coursnote">: Note</span>
 </div>
 <?php }
 elseif ($result==4) {
 ?>
 <div id="ratinglist"  class="rating rating2">
  <a >★</a>
  <a >★</a>
  <a >★</a>
  <a >★</a>
  <span id="coursnote">: Note</span>
 </div>
 <?php }
 elseif ($result==5) {
 ?>
 <div id="ratinglist"  class="rating rating2">
  <a  >★</a>
  <a  >★</a>
  <a  >★</a>
  <a  >★</a>
  <a  >★</a>
  <span id="coursnote">: Note</span>
 </div>
 <?php }
  ?>

 <a class="btn btn-light btn-lg blue" id ="buttondl" href="telechargement.php?id=<?php echo $result['id']; ?>">Télécharger</a>


 </div>




        </div>

      </div>
      <hr class="separaterule">

    <?php }
  }
  else{ echo "pas de résultat";
  }
  }












?>
</body>
</html>
