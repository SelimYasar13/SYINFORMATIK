<?php
if (!isset($_SESSION)) {
  session_start();
}

if(isset($_SESSION['user_id']))
{
  header('location: page_accueil.php');
}

include('config.php');
$date = date('Y-m-d H:i:s');

if (isset($_SESSION['user_id'])) {
  $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
  $req->execute(array('inscription',$_SESSION['user_id'], $date));
  }
  else {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('inscription',0, $date));
  }

if (isset($_POST['inscription'])){
  $total=0;
  $reste=0;
  $nonvalide=0;
  // echo $value;

  if (isset($_POST['v1']) && $_POST['v1'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v1'])) {
    $total--;
  }
  if (isset($_POST['v2']) && $_POST['v2'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v2'])) {
    $total--;
  }
  if (isset($_POST['v3']) && $_POST['v3'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v3'])) {
    $total--;
  }
  if (isset($_POST['v4']) && $_POST['v4'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v4'])) {
    $total--;
  }
  if (isset($_POST['v5']) && $_POST['v5'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v5'])) {
    $total--;
  }
  if (isset($_POST['v6']) && $_POST['v6'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v6'])) {
    $total--;
  }
  if (isset($_POST['v7']) && $_POST['v7'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v7'])) {
    $total--;
  }
  if (isset($_POST['v8']) && $_POST['v8'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v8'])) {
    $total--;
  }
  if (isset($_POST['v9']) && $_POST['v9'] == $_SESSION['temp']) {
    $total++;
  }
  elseif(isset($_POST['v9'])) {
    $total--;
  }
  if($total == $_SESSION['reponse']){
    if(!empty($_POST['pseudo']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp2'])){

      $pseudo = htmlspecialchars($_POST['pseudo']);
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $email = htmlspecialchars($_POST['email']);
      $mdp = md5($_POST['mdp']);
      $mdp2 = md5($_POST['mdp2']);
      $_SESSION['email']=$email;
      $_SESSION['pseudo']=$pseudo;

      // Verifier que le pseudo n'est pas déjà utilisé
      $q = "SELECT user_id FROM site_user WHERE pseudo = ?";
      $req = $bdd->prepare($q);
      $req->execute([$_POST['pseudo']]);
      $results = $req->fetchAll();
      if(count($results) != 0){ // tableau de résultats pas vide : pseudo déjà pris
        ?>
        <script type="text/javascript">
          alert('Le pseudo choisi est déjà pris !');
        </script>
        <?php
        // echo "Le pseudo choisi est déjà pris !";
        exit;
      }

      // Verifier que le mail n'est pas déjà utilisé
      $q = "SELECT mail FROM site_user WHERE mail = ?";
      $req = $bdd->prepare($q);
      $req->execute([$_POST['email']]);
      $results = $req->fetchAll();
      if(count($results) != 0){ // tableau de résultats pas vide : pseudo déjà pris
        ?>
        <script type="text/javascript">
          alert('Le mail choisi est déjà pris !');
        </script>
        <?php
        // echo "Le mail choisi est déjà pris !";
        exit;
      }

      if(!isset($_POST['mdp']) || strlen($_POST['mdp']) < 8 || strlen($_POST['mdp']) > 30){
        ?>
        <script type="text/javascript">
          alert('Le mot de passe doit contenir entre 8 et 30 caractères !');
        </script>
        <?php
        // echo "Le mot de passe doit contenir entre 8 et 30 caractères !";
        exit;
      }

      if ($_POST['mdp'] == $_POST['mdp2']) {
        $longueurKey = 12;
        $key = "";
        for($i=1;$i<$longueurKey;$i++){
          $key .= mt_rand(0,9);
        }



      $mdp = md5($_POST['mdp']);
      $date = date('Y-m-d H:i:s');
      $insertsql = $bdd->prepare('INSERT INTO site_user(pseudo, last_name, first_name, mail, password, confirm_key, signup_date) VALUES(?, ?, ?, ?, ?, ?, ?)');
      $insertsql->execute(array($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'],$mdp, $key, $date));





      if ($insertsql->rowCount() == 1){
        header('location:verification.php?key='.$key);
        echo "Vous avez reussi";
        exit;
      }
    }
      else{
        ?>
        <script type="text/javascript">
          alert('*Les mots de passes ne correspondent pas');
        </script>
        <?php
      }
    }
    else{
      ?>
      <script type="text/javascript">
        alert('*Il faut remplir tous les champs !');
      </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
      alert('Validez votre captcha ');
    </script>
    <?php
  }




}
include('user_header.php');
include("execution.php");
include("../style/stylecaptcha.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <?php
     // include('lien.php');
      ?>
  </head>

  <header>

  </header>

  <body class="inscriptionimg">
    <div class="container" id="connexcontainer">
      <div class="contact1" id="">
        <div class="container-contact1" id="containercontact">
          <form class="contact1-form validate-form" name=""  id="connexionform" action="" onsubmit=""  method="POST">
            <span class="contact1-form-title">INSCRIPTION</span>
            <div class="wrap-input1 validate-input" data-validate = "Un pseudo est requis">
              <input class="input1" id="login" type="text" name="pseudo" placeholder="Pseudo">
              <span class="shadow-input1"></span>

            </div>

            <div class="wrap-input1 validate-input" data-validate = "Un nom est requis">
              <input class="input1" type="text" name="nom" placeholder="Nom">
              <span class="shadow-input1"></span>

            </div>
            <div class="wrap-input1 validate-input" data-validate = "Un prénom est requis">
              <input class="input1" type="text" name="prenom" placeholder="Prénom">
              <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Un email valide est requise">
              <input class="input1" id="email" type="text" name="email" placeholder="Adresse mail">
              <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Un mot de passe est requis">
              <input class="input1" type="password" id="password" name="mdp" placeholder="Mot de passe">
              <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Un mot de passe est requis">
              <input class="input1" type="password" id="password" name="mdp2" placeholder="Vérifiez le mot de passe">
              <span class="shadow-input1"></span>
            </div>




            <div class="">
              <?php


              ?>
              <span class="contact1-form-title"><?php echo "Montre moi :  " . $value; ?></span>
              <?php

             $reponse = 0;
             if($value == $valeur1){
               $reponse++;
             }

             if($value == $valeur2){
               $reponse++;
             }

             if($value == $valeur3){
               $reponse++;
             }

             if($value == $valeur4){
               $reponse++;
             }

             if($value == $valeur5){
               $reponse++;
             }

             if($value == $valeur6){
               $reponse++;
             }

             if($value == $valeur7){
               $reponse++;
             }

             if($value == $valeur8){
               $reponse++;
             }

             if($value == $valeur9){
               $reponse++;
             }
             $temp=$value;
             $_SESSION['temp'] = $temp;
             $_SESSION['reponse'] = $reponse;
               ?>
               <table>
                 <tr>
                  <td id='captcha1'><input name="v1" class="captchaa" type='checkbox' value='<?php echo $valeur1?>'/></td>
                  <td id='captcha2'><input name="v2" class="captchaa" type='checkbox' value='<?php echo $valeur2?>'/></td>
                  <td id='captcha3'><input name="v3" class="captchaa" type='checkbox' value='<?php echo $valeur3?>'/></td>

                </tr>
                <tr>
                  <td id='captcha4'><input name="v4" class="captchaa" type='checkbox' value='<?php echo $valeur4?>'/></td>
                  <td id='captcha5'><input name="v5" class="captchaa" type='checkbox' value='<?php echo $valeur5?>'/></td>
                  <td id='captcha6'><input name="v6" class="captchaa" type='checkbox' value='<?php echo $valeur6?>'/></td>
                </tr>
                <tr>
                  <td id='captcha7'><input name="v7" class="captchaa" type='checkbox' value='<?php echo $valeur7?>'/></td>
                  <td id='captcha8'><input name="v8" class="captchaa" type='checkbox' value='<?php echo $valeur8?>'/></td>
                  <td id='captcha9'><input name="v9" class="captchaa" type='checkbox' value='<?php echo $valeur9?>'/></td>
                </tr>
                 </tr>
               </table>
            </div>
            <div class="container-contact1-form-btn">
              <input type="submit" name="inscription" class="contact1-form-btn">
            </div>
            <?php
            if (isset($_SESSION)) {
            }
             ?>

          </form>
        </div>
      </div>

    </div>
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
