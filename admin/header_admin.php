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
   <title>SY</title>
   <link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
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


   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 </head>
   <body id="basic-setup">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
   <a class="navbar-brand" id="logoheader" href="accueil_admin.php">
     <img class="logo" src="../image/logo.png" width="180px" height="60px" alt="Logo du site">
   </a>
   <ul class="navbar-nav mr-auto">
     <li class="nav-item">
       <a class="nav-link" id="nava" href="../utilisateur/page_accueil.php"><img id="imgheader" style="" src="../image/contactheader.svg" alt="">Partie USER</a>
     </li>

     <li class="nav-item">
       <a class="nav-link" id="nava" href="ajoute_cours.php"><img id="imgheader" style="" src="../image/profilheader.svg" alt="">Ajouter cours</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" id="nava" href="add_article.php"><img id="imgheader" style="" src="../image/profilheader.svg" alt="">Ajouter article</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" id="nava" href="user_list.php"><img id="imgheader" style="" src="../image/profilheader.svg" alt="">Gérer utilisateurs</a>
     </li>
   </ul>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
         <span class="navbar-toggler-icon"></span>
       </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">

     </ul>


       </div>
     </div>
 </nav>
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
