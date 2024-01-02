<?php
if (!isset($_SESSION)) {
  session_start();
}

if(isset($_SESSION['user_id']))
{
  header('location: page_accueil.php');
}
else{}

include('config.php');

if (isset($_POST['formconnect']))
{
    $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
    $mdpconnect = md5($_POST['mdpconnect']);
    if(!empty($pseudoconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM site_user WHERE pseudo = ? AND password = ?");
        $requser->execute(array($pseudoconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if ($userexist == 1)
        {
          $userinfo = $requser->fetch();
          $_SESSION['user_id'] = $userinfo['user_id'];
          $_SESSION['pseudo'] = $userinfo['pseudo'];
          $_SESSION['mail'] = $userinfo['mail'];
          $debut = (int)microtime(true);
          $_SESSION['debut']=$debut;
          header("location: profil.php?id=".$_SESSION['user_id']);
          exit;
      }
        else
        {
          ?>
          <script type="text/javascript">
            alert('Pseudo ou/et Mot de passe incorrect !');
          </script>
          <?php
        }
    }
    else
    {
      ?>
      <script type="text/javascript">
        alert('*Tous les champs doivent être complétés !');
      </script>
      <?php
    }
}
?>
<body class="connexionimg">
<br><br><br><br>
<div class="container" id="connexcontainer">
  <div class="contact1" id="">
    <div class="container-contact1" id="containercontact">
        <form class="contact1-form validate-form" id="connexionform" role="form" action="" method="POST">
          <span class="contact1-form-title">CONNEXION</span>
              <div class="wrap-input1 validate-input" data-validate = "Un nom est requis">
              <input class="input1" type="text" name="pseudoconnect" placeholder="Nom">
          <span class="shadow-input1"></span>
     </div>
  <div class="wrap-input1 validate-input" data-validate = "Un nom est requis">
      <input class="input1" type="password" name="mdpconnect" placeholder="Mot de passe">
  <span class="shadow-input1"></span>
</div>
                <input type="submit" id="btnconnex" name="formconnect" value="Se connecter !" class="contact1-form-btn">
                <br>
                <br>
                <div id = "inscrire"  class="">


                <a id = "inscrire" href="inscription.php">Pas encore de compte? S'inscrire</a>
                <a id = "inscrire" href="forgot_p.php">Mot de passe oublié?</a>

              </div>
              </form>
            </div>

          </body>
          
<?php include('user_header.php');
?>