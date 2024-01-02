<?php
include('config.php');
include('header_admin.php');
 ?>

 <div class="container">
   <div class="contact1" id="contactbox">
     <div class="container-contact1">
<form class="contact1-form validate-form" action="" method="post">
  <div class="wrap-input1 validate-input">
    <input type="text" class="input1" name="link1" placeholder="URL de l'image">
      <span class="shadow-input1"></span>
  </div>
  <div class="wrap-input1 validate-input">
    <input type="text" class="input1" name="time1" placeholder="Temps requis pour débloquage (en secondes)">
      <span class="shadow-input1"></span>
  </div>
  <div class="wrap-input1 validate-input">
<input type="number" class="input1" name="1" placeholder="Grade du badge">
 <span class="shadow-input1"></span>
  </div>



  <input type="submit" class="contact1-form-btn" name="submit" value="Ajouter">
  <?php
  if (isset($_POST['submit'])) {
    if (!empty($_POST['link1'] && $_POST['time1']  && $_POST['1'])) {
  // isset($_POST['link1'] && $_POST['link2'] && $_POST['link3'] && $_POST['time1'] && $_POST['time3'] && $_POST['time3'])
    $insertsql = $bdd->prepare('INSERT INTO badge(link, time, badge_level	 ) VALUES(?, ?, ? )');
    $insertsql->execute(array($_POST['link1'], $_POST['time1'], $_POST['1']));
    echo "<p class='phpalert'>INSERTION REUSSI</p>";
    }
  }




   ?>
</form>
</div>
 </div>
</div>
