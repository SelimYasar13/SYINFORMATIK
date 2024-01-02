<?php
session_start();
include('connexion_check.php');
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
  Profil   <?php echo "de ".$userinfo['pseudo'] . '<span id="badgeprofil">'.$_SESSION['badge'].'</span>' ?>
  </h1>

 <div class="profilsuivi">


 <a id="paramprofil"href="parametres.php?id=<?=$userinfo['user_id']?>">Paramètres</a>
 <a id="paramprofil" href="monsuivi.php">Voir mon suivi</a>
  <a id="paramprofil" href="ajoute_cours.php">Proposer un cours</a>

 </div>
  </div>

<div id="infosprofil" class="container">

  <?php echo '<div id="divinfos" class="container"> <h1 id="apropos">
  A propos de moi :
  </h1><span class="flexinfos"> Profil de : <span id="pseudo">'.$userinfo['pseudo']. '</span></span>' ?>
 <?php echo '<span class="flexinfos"> Nom : <span id="nom">'. $userinfo['last_name'] . '</span></span>'; ?>
   <?php echo '<span class="flexinfos"> Prénom : <span id="prenom">'. $userinfo['first_name'] . '</span></span>'; ?>
   <?php echo '<span class="flexinfos">  Mail : <span id="mail">'. $userinfo['mail'] . '</span></span></div>'; ?>
</div>

<div class="container" id="infoscours">
  <?php echo '<div id="divconnex" class="container"> <h1 id="apropos">
  Moi et Sy :
  </h1><span class="flexinfos"> Date d\'inscription : <span>'.$userinfo['signup_date']. '</span></span>' ?>
 <?php echo '<span class="flexinfos"> Dernière connexion :<span>'. $userinfo['last_signin_date'] . '</span></span>'; ?>
   <?php echo '<span class="flexinfos"> Temps passé sur le site :  <span>'. $userinfo['temps'] ."secondes" . '</span></span>'; ?>
</div>




  </div>




</div>
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
<script src="../js/edit.js"></script>
</html>
<?php
}
?>
