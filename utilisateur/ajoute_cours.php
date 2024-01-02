<?php
session_start();
include('config.php');
include('connexion_check.php');
  $date = date('Y-m-d H:i:s');
  if(isset($_POST['submit'])){
    if (!empty($_POST['sujet']) && !empty($_POST['matiere']) &&!empty($_POST['difficulte']) &&!empty($_POST['temps']) &&!empty($_POST['description'])) {
      if (isset($_FILES['fichier']) && isset($_FILES['image']) && $_FILES["fichier"]["error"] == 0 && $_FILES["image"]["error"] == 0 ) {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "RENTRER 2<br>";
        $allowed = array('pdf' , 'PDF');
        $filename = $_FILES["fichier"]["name"];
        $filetype = $_FILES["fichier"]["type"];
        $filesize = $_FILES["fichier"]["size"];
        $imagename = $_FILES["image"]["name"];
        $imagetype = $_FILES["image"]["type"];
        $imagesize = $_FILES["image"]["size"];
        echo $filename . "<br>";
        echo $imagename . "<br>";

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
            echo "RENTRER 3<br>";

            if (file_exists("../files/" . $_FILES["fichier"]["name"])) {
              echo "RENTRER 4<br>";


              $longueurKey = 12;
              $key = "";
              for($i=1;$i<$longueurKey;$i++){
                $key .= mt_rand(0,9);
              }
              $_FILES["fichier"]["name"] = $key . $_FILES["fichier"]["name"];
              move_uploaded_file($_FILES["fichier"]["tmp_name"], "../files/" . $_FILES["fichier"]["name"]);
              echo "Votre fichier a été téléchargé avec succès.";
              echo " <br>";

            }
            if (file_exists("../image/" . $_FILES["image"]["name"])) {
              echo "RENTRER 5<br>";

              $longueurKey = 8;
              $key = "";
              for($i=1;$i<$longueurKey;$i++){
                $key .= mt_rand(0,9);
              }
              $_FILES["image"]["name"] = $key . $_FILES["image"]["name"];
              move_uploaded_file($_FILES["image"]["tmp_name"], "../image/" . $_FILES["image"]["name"]);
              echo "Votre image a été téléchargé avec succès.";
            }

                  $q = 'INSERT INTO cours(sujet, fichier, etat, user_id, date, image, niveau, matiere, description, temps) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                  $req = $bdd->prepare($q);
                  $results = $req->execute(array($_POST['sujet'], $_FILES["fichier"]["name"],
                    0, $_SESSION['user_id'], $date,
                    $_FILES["image"]["name"],
                    $_POST['difficulte'], $_POST['matiere'],
                    $_POST['description'], $_POST['temps']));

          }
          else {
            echo "RENTRER<br>";

            move_uploaded_file($_FILES["fichier"]["tmp_name"], "../files/" . $_FILES["fichier"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], "../image/" . $_FILES["image"]["name"]);

                  $q = 'INSERT INTO cours(sujet, fichier, etat, user_id, date, image, niveau, matiere, description, temps) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                  $req = $bdd->prepare($q);
                  $results = $req->execute(array($_POST['sujet'], $_FILES["fichier"]["name"],
                    0, $_SESSION['user_id'], $date,
                    $_FILES["image"]["name"],
                    $_POST['difficulte'], $_POST['matiere'],
                    $_POST['description'], $_POST['temps']));

          }
          if ((int)$results == 1) {
            ?>
            <script type="text/javascript">
              setTimeout(alert, 500, 'Vous venez d'\'ajouter un cours');
            </script>

            <?php

        }
        ?>
        <script type="text/javascript">
          setTimeout(alert, 500, 'Ajouter un pdf');
        </script>

        <?php
      }
      ?>
      <script type="text/javascript">
        setTimeout(alert, 500, 'Erreur');
      </script>

      <?php

      }




    }
    ?>
    <script type="text/javascript">
      setTimeout(alert, 500, 'Remplir tous les champs');
    </script>

    <?php












  }

include('../utilisateur/user_header.php');


?>
		<body>
      <div class="container">




                      	<div class="contact1" id="contactbox">
                      		<div class="container-contact1">
                      			<div class="contact1-pic js-tilt" data-tilt>
                      				<div class="">
                                <p id="peech">Proposez un cours au site. Après validation de nos experts, le cours pourra être publié.</p>
                                <p id="formazer">Format PDF obligatoire</p>
                              </div>
                      			</div>

                      			<form class="contact1-form validate-form" action="" method="POST" enctype="multipart/form-data">



                      				<span class="contact1-form-title">Proposer un cours</span>


                              <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                      					<input class="input1" type="text" id="sujet" placeholder="Sujet du cours" name ="sujet">

                      					<span class="shadow-input1"></span>
                      				</div>






                              <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                                <input class="input1" type="text" id="matiere" placeholder="Matière étudiée" name ="matiere">

                                <span class="shadow-input1"></span>
                              </div>

                              <div class="wrap-input1 validate-input" data-validate = "Un message est requis">

                                    <select class="wrap-input1 validate-input" class="" name="difficulte">
                                        <option value="Facile" name"">Facile</option>
                                        <option value="Moyen" name"">Moyen</option>
                                        <option value="Difficile" name"">Difficile</option>
                                    </select>
                              </div>


                              <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                                <input class="input1" type="number"  id="temps" placeholder="temps (en heures)" name ="temps">

                                <span class="shadow-input1"></span>
                              </div>


                      				<div class="wrap-input1 validate-input" data-validate = "Un message est requis">
                      					<textarea class="input1" name="description" id="description" placeholder="Brève description du cours...."></textarea>

                              	<span class="shadow-input1"></span>
                              </div>
                                <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                                  <span>Selectionnez un fichier</span>

                                  <input class="" type="file" id="fichier" name ="fichier" accept="fichier/png, fichier/jpeg">

                                  <span class="shadow-input1"></span>
                                </div>

                                <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
                                  <span>Selectionnez une image</span>
                        					<input class="" type="file" id="image" name ="image" accept="image/png, image/jpeg">

                        					<span class="shadow-input1"></span>
                        				</div>
                                <div class="container-contact1-form-btn">
                        					<input type="submit" class="contact1-form-btn" onclick="checkAdd()" name="submit" value="ENVOYER">
                        				</div>

                      				</div>










                      			</form>
                      		</div>
                      	</div>


  </div>
<script type="text/javascript" src="../js/checkaddcours.js">

</script>
</body>
</html>
