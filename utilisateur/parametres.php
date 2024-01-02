<?php
include('user_header.php');
include('config.php');


$date = date('Y-m-d H:i:s');

if (isset($_SESSION['user_id'])) {
  $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
  $req->execute(array('profil',$_SESSION['user_id'], $date));
  }
  else {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('profil',0, $date));
  }




if(isset($_SESSION['user_id']) AND $_SESSION['user_id'] > 0)
{
  $getid = intval($_SESSION['user_id']);
  $requser = $bdd->prepare('SELECT * FROM site_user WHERE user_id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();
?>

<body class="">
  <div class="container" id="containerprofil">
    <div class="container" id="profiltitle">


    <h1 id="titleprofil">
    Paramètres
    </h1>


   <a id="paramprofil"href="profil.php?id=<?=$_SESSION['user_id']?>">Profil</a>
    </div>
    <div id="infosprofil" class="container">

      <?php echo '<div id="divinfos" class="container"> <h1 id="apropos">
      Votre email
      </h1><span class="paraminfos"> Mail actuel :  <span id="mail">'.$userinfo['mail']. '</span></span>' ?>
     <?php echo '<span class="paraminfos"> Nouveau mail : <input class="input1"id="newmail"></span>';
       echo '
       <button class="button" id="buttmodif" onclick="changemail()">Valider</button></div>'; ?>

    </div>

    <div class="container" id="infosparam">
      <?php echo '<div id="paramssinfos" class="container"> <h1 id="apropos">
      Changer le mot de passe :
      </h1> <form name ="" action="changepassword.php" class="formmdp" method="POST"> <input name="mdp" type="password" placeholder="Ancien mot de passe" class="input1"id="oldmdp"></span>' ?>
      <?php echo '   <input name="nmdp" type="password" placeholder="Nouveau mot de passe" class="input1"id="nmdp"></span>';
            echo '   <input name ="vmdp" type="password" placeholder="Confirmer mot de passe" class="input1"id="vmdp"></span>
            <input class="contact1-form-btn" type="submit" name="formmdp" id="buttmodiff">';
?>
</form>
    </div>
      <?php
      if(isset($_SESSION['user_id']) AND $userinfo['user_id'] == $_SESSION['user_id'])
      {

?>
</div>
      <div class='supprimer'>

        <form class="" action="deleteaccount.php" method="post">
          <input type="submit" name="" class="ontact1-form-btn" value="Supprimer mon compte">
        </form>
      </div>
<script type="text/javascript" src="../js/deleteaccount.js"></script>
      <script type="text/javascript" src="../js/parametres.js">



      </script>
      <footer id="footer" class="footerparam">
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
  <?php
}}
  ?>
