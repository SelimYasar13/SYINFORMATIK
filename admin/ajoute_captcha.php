<?php

include('header_admin.php');


?>
<body>
  <div class="container" id="contienttout">
    <h1>Ajouter un Captcha</h1>
    <div class="contact1" id="contactbox">
      <div class="container-contact1">
    <form class="" action="procedure_1.php" method="post" enctype="multipart/form-data">
      <div class="wrap-input1 validate-input">
        <input type="text" class="input1" placeholder="Entrez un nom d'image" id="name" name="sujet" value="">
          <span class="shadow-input1"></span>
      </div>
      <div class="wrap-input1 validate-input">
        <label for="fileUpload">Sélectionnez un fichier</label>
        <input type="file" id="image" name="photo">
           <span class="shadow-input1"></span>
      </div>


      <input type="submit" class="contact1-form-btn" onclick="checkAddCaptcha()" name="submit" value="Ajouter l'image">
    </form>
  </div>
</div>
  </div>
  <?php
   if (isset($_GET['success']) && $_GET['success'] == 'article') {
    echo '<strong>Image envoyé</strong>';
    }
?>
<script type="text/javascript" src="../js/checkaddcours.js">

</script>
</body>
</html>
