<?php
session_start();
include('config.php');
include('user_header.php');





$id_cours=$_GET['id'];
$_SESSION['id_cours'] = $id_cours;
$q = 'SELECT id,cours_id,question,reponse FROM question WHERE cours_id = '.$id_cours;
$qs = $bdd->query($q);

$i = 1;

 ?>
  <form class="container" id="qcmcontainer" action="check.php" method="post">
    <?php
    while ($qes = $qs->fetch()) {
      // code...

      echo '<h3> Question n°'. $qes['id'] .  ' : '.  $qes['question'] . '</h3>';
      // echo '<h3>'. $qess['question'] . '</h3>';
      // echo "<br>";

      // $r = 'SELECT id,question_id,reponse FROM reponses WHERE question_id = '.$qes['id'];
      $r = 'SELECT id,question,reponse FROM reponses WHERE question = ?';
      $rs = $bdd->prepare($r);
      $rs->execute(array($qes['question']));
      while ($res = $rs->fetch()) { ?>
        <div class="">
        <input type="checkbox" name="<?php echo $i; ?>"  class="qcminput"value="<?php echo $res['reponse']; ?>"><?php echo $res['reponse']; ?></div>


<?php
        $i++;
      }
        ?> <hr class="separaterule">
  <?php
    }
     ?>
     <br><input type="submit" class="contact1-form-btn" name="submit" value="Répondre">
  </form>
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
