<?php
session_start();
include('connexion_check.php');
include('config.php');
include('user_header.php');


       $total = 0;

       $req = $bdd->query("SELECT given_sum FROM donation");
       foreach  ($req as $row) {
       $total = $total +  $row['given_sum'];

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
<!--===============================================================================================-->
  <link rel="icon" type="image/png" href="../contactform/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../contactform/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../contactform/vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../contactform/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../contactform/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../contactform/css/util.css">
  <link rel="stylesheet" type="text/css" href="../contactform/css/main.css">
  <link rel="stylesheet" type="text/css" href="../style/style2.css">
  <link rel="stylesheet" type="text/css" href="../style/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="../style/slick/slick-theme.css"/>
  <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">



</head>
  <body id="basic-setup">




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
      <div class="container">
       <div class="row">


               <div class="contact1" id="contactbox">
                 <div class="container-contact1">
                   <form class="contact1-form validate-form" name ="" action="https://www.paypal.me/syinfo" method="POST">
                     <span class="contact1-form-title">
                     Faire un don
                     </span>
                     <div class="wrap-input1 validate-input" data-validate = "Un don est requis">


                       <input class="input1" type="number"id ="sum" name ="sum" min="5.00" max="10000.00"  placeholder="Somme donnée"/>
                       <span class="shadow-input1"></span>
                     </div>

                     <div class="wrap-input1 validate-input" data-validate = "Un message est requis">
                       <textarea class="input1" name="content" id="msgdon" placeholder="Message(facultatif)"></textarea>
                       <span class="shadow-input1"></span>
                     </div>

                     <div class="container-contact1-form-btn">
                       <button type="submit" onclick="addDon()" name="don" class="contact1-form-btn">
                         <span>
                           Donner
                         </span>
                       </button>
                     </div>

                   </form>
                   <div class="speech">
                     <h4 class="display-4 main-title" id="dontext">FAITES UN DON.</h4>
                     <h5 class = "dontext" id="dontext"> <?php echo $total?> € recoltés sur 4000.</h5>
                     <br>

                     <progress class="progressbar" value="<?php echo $total?>" max="4000">

                   </div>

                 </div>

               </div>







           </div>
         </div>
         <script type="text/javascript" src="../js/don.js">

         </script>
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
