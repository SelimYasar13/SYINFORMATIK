<?php
include('config.php');
if (!isset($_SESSION)) {
  session_start();
  $contry;
  $region;
  $ip = $_SERVER['REMOTE_ADDR'];
  $date = date('Y-m-d H:i:s');
  $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); //use this for online
  if ($query && $query['status'] == 'success') {
    $contry = $query['country'];
    $region = $query['regionName'];
  }
  $req = $bdd->prepare('INSERT INTO visiteurs(adress_ip, user_id, temps, last_time, pays, region) VALUES (?, ?, ?, ?, ?, ?) ');
  $req->execute(array($ip, 0, 0, $date, $contry, $region));
}
 ?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <link href="../style/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <link rel="stylesheet" type="text/css" href="../style/accueil.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../contactform/images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="../contactform/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../contactform/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="../contactform/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="../contactform/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../contactform/css/util.css">
  <link rel="stylesheet" type="text/css" href="../contactform/css/main.css">
  <link rel="stylesheet" type="text/css" href="../style/style2.css">
  <link rel="stylesheet" type="text/css" href="../style/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="../style/slick/slick-theme.css"/>
  <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">
</head>

  <body id="basic-setup">
    <header class="">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navsize">
        <div class="container">
        <a class="navbar-brand" href="page_accueil.php">
          <img class="logo" src="../image/logo.png" width="180px" height="60px" alt="Logo du site">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" id="nava" href="profil.php"><img id="imgheader" style="" src="../image/profilheader.svg" alt="">PROFIL</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="nava" href="actualites.php"><img id="imgheader" style="" src="../image/articleheader.svg" alt="">ACTUALITES</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link"  id="nava"href="listefichier.php" id="navbardrop">
                        <img id="imgheader" style="" src="../image/coursheader.svg" alt="">
                        COURS
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="nava" href="don.php">
                        <img id="imgheader" style="" src="../image/coinheader.svg" alt="">DONS</a>
                    </li>
                    <li class="nav-item">

                      <a class="nav-link" id="nava" href="contact.php">
                        <img id="imgheader" style="" src="../image/contactheader.svg" alt="">CONTACT</a>

                    </li>
                <form class="form-inline my-2 my-lg-0">
                  <?php if(isset($_SESSION['user_id'])){
                    // LA PARTIE BADGE
                    $req = $bdd->prepare('SELECT temps,badge FROM site_user WHERE user_id = ?');
                    $req->execute(array($_SESSION['user_id']));
                    $results = $req->fetch();
                    $temps = $results['temps'];
                    $last_badge = $results['badge'];
                    $req = $bdd->prepare('SELECT link,time,badge_level FROM badge WHERE time <= ? ORDER BY time DESC LIMIT 1');
                    $req->execute(array($temps));
                    $results = $req->fetchAll(PDO::FETCH_ASSOC);
                    // echo $temps . "<br>";
                    if (empty($results)) {
                      // echo "VIDE";
                    }
                    else {
                      // print_r($results);
                      // echo "<br>";
                      foreach ($results as $resu) {
                        // echo $resu['time'] . "<br>";
                      }
                      // echo $resu['time'] . "<br>";
                      $new_badge = $resu['badge_level'];

                      // echo "NIVEAU Badge qu'il faut attribuer " . $resu['badge_level'] . "<br>";
                      // echo "Ancien valeur de badge " . $last_badge . "<br>";
                      if ($new_badge > $last_badge) {
                        ?>

                        <script type="text/javascript">
                          // alert('Vous viens de debloquer un nouveau badge');

                            setTimeout(alert, 500, 'Felicitations vous venez de debloquer un nouveau badge');


                        </script>

                        <?php
                        $req = $bdd->prepare('UPDATE site_user SET  badge = ? WHERE user_id = ?');
                        $req->execute(array($new_badge, $_SESSION['user_id']));
                      }
                      $_SESSION['badge']= $resu['link'];


                    }




                    ?>
                  <a class="btn btn-light btn-lg blue" href="deconnexion.php">DECONNEXION</a>
                  <?php } else { ?>
                  <a class="btn btn-light btn-lg blue" href="connexion.php">CONNEXION</a>
                  <?php } ?>
                </form>

              </ul>
            </div>


        </div>
      </nav>
    </header>



  </body>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="../style/slick/slick.min.js"></script>
  <script type="text/javascript" src="../style/slick/slick.js"></script>
  <script type="text/javascript" src="../js/header.js"></script>

  <script type="text/javascript">

  $(document).ready(function () {
  $('.navbar-light .dmenu').hover(function () {
      $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
  }, function () {
      $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
  });
  });
  </script>
</html>
