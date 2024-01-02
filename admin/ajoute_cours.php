<?php

include('config.php');

  $date = date('Y-m-d H:i:s');
  if(isset($_POST['submit'])){
    if (!empty($_POST['sujet']) && !empty($_POST['matiere']) &&!empty($_POST['difficulte']) &&!empty($_POST['temps']) &&!empty($_POST['description'])) {
      if (isset($_FILES['fichier']) && isset($_FILES['image']) && $_FILES["fichier"]["error"] == 0 && $_FILES["image"]["error"] == 0 ) {

        $allowed = array('pdf' , 'PDF');
        $filename = $_FILES["fichier"]["name"];
        $filetype = $_FILES["fichier"]["type"];
        $filesize = $_FILES["fichier"]["size"];
        $imagename = $_FILES["image"]["name"];
        $imagetype = $_FILES["image"]["type"];
        $imagesize = $_FILES["image"]["size"];


        $ext = pathinfo($filename, PATHINFO_EXTENSION);


        $filesize = 5 * 1024 * 1024;
        $imagesize = 2 * 1024 * 1024;
        if($filesize > $filesize){
            ?>
            <script type="text/javascript">
              setTimeout(alert, 500, 'Error: La taille du fichier est supérieure à la limite autorisée.');
            </script>

            <?php

        }
        if($imagesize > $imagesize) {
          ?>
          <script type="text/javascript">
            setTimeout(alert, 500, 'Error: La taille d'\'image est supérieure à la limite autorisée.');
          </script>

          <?php
        }






        if(in_array($ext, $allowed)){
          if(file_exists("../files/" . $_FILES["fichier"]["name"]) ||file_exists("../image/" . $_FILES["image"]["name"]) ){


            if (file_exists("../files/" . $_FILES["fichier"]["name"])) {



              $longueurKey = 8;
              $key = "";
              for($i=1;$i<$longueurKey;$i++){
                $key .= mt_rand(0,9);
              }
              $_FILES["fichier"]["name"] = $key . $_FILES["fichier"]["name"];
              move_uploaded_file($_FILES["fichier"]["tmp_name"], "../files/" . $_FILES["fichier"]["name"]);


            }
            if (file_exists("../image/" . $_FILES["image"]["name"])) {


              $longueurKey = 6;
              $key = "";
              for($i=1;$i<$longueurKey;$i++){
                $key .= mt_rand(0,9);
              }
              $_FILES["image"]["name"] = $key . $_FILES["image"]["name"];

            }

              $q = 'INSERT INTO cours(sujet, fichier, etat, user_id, date, image, niveau, matiere, description, temps) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
              $req = $bdd->prepare($q);
              $results = $req->execute(array($_POST['sujet'], $_FILES["fichier"]["name"],
              1, 0, $date,
              $_FILES["image"]["name"],
              $_POST['difficulte'], $_POST['matiere'],
              $_POST['description'], $_POST['temps']));
              ?>
              <script type="text/javascript">
                setTimeout(alert, 500, 'Vous venez d'\'ajouter un cours');
              </script>

              <?php

          }
          else {


            move_uploaded_file($_FILES["fichier"]["tmp_name"], "../files/" . $_FILES["fichier"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], "../image/" . $_FILES["image"]["name"]);


              $q = 'INSERT INTO cours(sujet, fichier, etat, user_id, date, image, niveau, matiere, description, temps) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
              $req = $bdd->prepare($q);
              $results = $req->execute(array($_POST['sujet'], $_FILES["fichier"]["name"],
              1, 0, $date,
              $_FILES["image"]["name"],
              $_POST['difficulte'], $_POST['matiere'],
              $_POST['description'], $_POST['temps']));
              ?>
              <script type="text/javascript">
                setTimeout(alert, 500, 'Vous venez d'\'ajouter un cours');
              </script>

              <?php

          }


      }



      }





    }
    else {
      ?>
      <script type="text/javascript">
        setTimeout(alert, 500, 'Remplir tous les champs');
      </script>

      <?php
    }












  }



  include('header_admin.php');

?>
<title>Ajoute Cours</title>
		<body>
      <div class="container">




                      	<div class="contact1" id="contactbox">
                      		<div class="container-contact1">
                      			<div class="contact1-pic js-tilt" data-tilt>
                      				<img src="../image/logo.png" alt="IMG">
                      			</div>

                      			<form class="contact1-form validate-form" action="" method="POST" enctype="multipart/form-data">



                      				<span class="contact1-form-title">Ajouter un cours</span>


                              <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                      					<input class="input1" type="text" id="sujet" placeholder="Sujet du cours" name ="sujet">

                      					<span class="shadow-input1"></span>
                      				</div>






                              <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                                <input class="input1" type="text" id="matiere" placeholder="Matière étudiée" name ="matiere">

                                <span class="shadow-input1"></span>
                              </div>

                              <div class="wrap-input1 validate-input" data-validate = "Un message est requis">

                                    <select class="wrap-input1 validate-input" id="difficulte" class="" name="difficulte">
                                        <option value="Facile" name"">Facile</option>
                                        <option value="Moyen" name"">Moyen</option>
                                        <option value="Difficile" name"">Difficile</option>
                                    </select>
                              </div>


                              <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                                <input class="input1" type="number"  id="temps" placeholder="temps (en heures)" name ="temps">

                                <span class="shadow-input1"></span>
                              </div>
                              <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                                <span>Selectionnez un fichier</span>

                                <input class="" type="file" id="fichier" name ="fichier" accept="fichier/png, fichier/jpeg">

                                <span class="shadow-input1"></span>
                              </div>

                      				<div class="wrap-input1 validate-input" data-validate = "Un message est requis">
                      					<textarea class="input1" name="description" id="description" placeholder="Brève description du cours...."></textarea>
                      					<span class="shadow-input1"></span>
                              </div>
                                <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                                  <span>Selectionnez une image</span>
                        					<input class="" type="file" id="image" name ="image" accept="image/png, image/jpeg">

                        					<span class="shadow-input1"></span>
                        				</div>










                      				<div class="container-contact1-form-btn">
                      					<input type="submit" onclick="checkAdd()" class="contact1-form-btn" name="submit" value="ENVOYER">
                      				</div>
                      			</form>
                      		</div>
                      	</div>


  </div>
<script type="text/javascript" src="../js/checkaddcours.js">

</script>
</body>
</html>
