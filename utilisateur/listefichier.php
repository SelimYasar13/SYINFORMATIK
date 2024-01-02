<?php
include('connexion_check.php');
include('config.php');
  include('user_header.php');

  include('../style/style.php');
  include('../style/style2.php');
  $date = date('Y-m-d H:i:s');

  if (isset($_SESSION['user_id'])) {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('cours',$_SESSION['user_id'], $date));
    }
    else {
      $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
      $req->execute(array('cours',0, $date));
    }
  $q = 'SELECT id,sujet,fichier,etat,image,temps,niveau,matiere,description FROM cours WHERE etat = 1';
  $req = $bdd->query($q);
  $results = $req->fetchAll(PDO::FETCH_ASSOC);

  ?>
<!DOCTYPE html>

  <body style="background:#e1e9ee;">
    <br><br>
    <div class="container" id="searchcontainer">
        <input class="input1" type="text" id="recherche" name="recherche" placeholder="Rechercher un cours...">

    </div>
    <div class="container" id="containercours">


      <?php
         foreach ($results as $key => $value) {
        $q = 'SELECT AVG(note) FROM note WHERE cours_id = ? ';
        $res = $bdd->prepare($q);
        $results = $res->execute(array($value['id']));
        $results = $res->fetch();
        $results = (int)$results['AVG(note)'];
        ?>

            <div class="container" id="course">

                <img class="imgcourse" src="../image/<?=$value['image']?>">

                <div class="container" id="coursinfo">

                  <div class="titlescours">

                <h6><a href="#"><?=$value['matiere'] ?></a></h6>


                <h5><a href="cours.php?id=<?=$value['id']?>"><?=$value['sujet'] ?></a>
                  </h5>
                </div>


                <p class="coursdesc"><?=$value['description']?>
                </p>




<div class="bottomflex">

  <div class="spansimg">
      <span class="indic"><img id="svgmarg" class="svgicon" src="../image/bar-chart-line.svg"><?=$value['niveau']?></span>
      <span class="indic" id="spn"> <img id="svgmarg1" class="svgicon" src="../image/loader-2-line.svg"><?=$value['temps']?>h</span>

  </div>
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

  <a class="btn btn-light btn-lg blue" id ="buttondl" href="telechargement.php?id=<?php echo $value['id']; ?>">Télécharger</a>


</div>




              </div>

            </div>
            <hr class="separaterule">
          <?php  $q = 'SELECT note FROM note WHERE user_id = ? AND cours_id = ?';
            $res = $bdd->prepare($q);
            $results2 = $res->execute(array($_SESSION['user_id'],$value['id']));

       }


              ?>









                         </div>



<script type="text/javascript" src="../js/recherche.js">

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
