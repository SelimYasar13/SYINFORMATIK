<?php
include('user_header.php');
include("config.php");
$date = date('Y-m-d H:i:s');

if (isset($_SESSION['user_id'])) {
  $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
  $req->execute(array('profil',$_SESSION['user_id'], $date));
  }
  else {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('profil',0, $date));
  }
  ?>

  <br>

<div class="container" id="containermdp">
  <div class="contact1" id="">
    <div class="container-contact1" id="containercontact">
  <form class="contact1-form validate-form" role="form" action="" method="POST">
    <span class="contact1-form-title">
   Mot de passe oublié
    </span>

      <div class="wrap-input1 validate-input">

              <input type="text" name="mail" placeholder="Entrez votre mail" class="input1" autofocus>
          </div>
          <input type="submit" value="Récuperer mon mot de passe" name="forgotp" class="contact1-form-btn">




      <?php



      if (isset($_POST['forgotp']))
      {
        $mail = $_POST['mail'];
        $_SESSION['mail'] = $mail;

        $q = "SELECT mail FROM site_user WHERE mail = ?";
        $req = $bdd->prepare($q);
        $req->execute(array($mail));

        if($req->execute(array($mail)) == 1){


       $to = $mail;
       $subject = ' Récupérer Mot de passe';
       $message = '<a href="https://syinformatik.fr/utilisateur/newpassword.php?pseudo='.urlencode($mail).'">Recuperez votre mot de passe </a>';
       $headers ="From: informatiksy@gmail.com \r\n";
       $headers .= "MIME-VERSION: 1.0" . "\r \n";
       $headers .= "Content-type:text/html;charset=UTF-8" ."\r\n";

       mail($to, $subject, $message, $headers); echo "Mail envoyé avec succès";
     }

      else {

       echo "Adresse mail non attribuée";

     }
   }
     else{
       echo "Remplissez tous les champs";
     }

        ?>





  </form>
</div>
</div>
</div>
</body>
</html>
