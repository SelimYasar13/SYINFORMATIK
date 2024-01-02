<?php

include('user_header.php');


?>

<br>

  <div class="container">
    <div class="contact1" id="containermdp">
      <div class="container-contact1" id="containercontact">
              <form class="contact1-form validate-form" name="changemdp" role="form" action="" method="POST">
                <span class="contact1-form-title">
               Récuperer son mot de passe
                </span>
                      <div class="wrap-input1 validate-input">
                          <input type="text" name="mail" placeholder="Entrez votre mail" class="input1" autofocus>
                      </div>

                      <div class="wrap-input1 validate-input">
                          <input type="password" name="nmdp" placeholder="Nouveau mot de passe" class="input1">
                      </div>

                          <div class="wrap-input1 validate-input">
                              <input type="password" name="vmdp" placeholder="Confirmer mot de passe" class="input1">
                          </div>



                  <input type="submit" value="Changer mes infos" name="newmdp" class="contact1-form-btn">


</form>

<?php

include('config.php');

if (isset($_POST['newmdp']) && isset($_GET['pseudo']) && $_GET['pseudo'] == $_POST['mail'])
{
        $nmdp=($_POST['nmdp']);
        $vmdp=($_POST['vmdp']);
        $vmdp2 = md5($_POST['vmdp']);

        $insertsql = $bdd->prepare('UPDATE site_user SET password = ? WHERE mail= ? ');

        if ($nmdp == $vmdp)
        {
         /*if($user['confirme'] == 1) {*/


         $insertsql->execute(array($vmdp2,$_POST['mail']));
         echo "Mot de passe modifié";




         /*$bdd->prepare('UPDATE site_user SET password ="'.$_POST["vmdp"].' WHERE user_id ="'. $_SESSION['user_id'].'"');*/


        }





      else{
            echo "Mot de passe incorrect";
          }
    }



?>

</div>

</body>
</html>
