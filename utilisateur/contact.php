<?php
include('connexion_check.php');
include('config.php');
include('user_header.php');

    $date = date('Y-m-d H:i:s');
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('inscription',0, $date));
    if (isset($_SESSION['user_id'])) {
      $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
      $req->execute(array('contact',$_SESSION['user_id'], $date));
      }
      else {
        $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
        $req->execute(array('contact',0, $date));
      }
?>

<body id="basic-setup" class="backgroundbody">


<div class="container">



<div class="" id="containermsg">


  <div class="contact1" id="contactbox">
    <div class="container-contact1" >
      <div class="contact1-pic js-tilt" data-tilt>
        <img src="../image/logo.png" alt="IMG">
      </div>

      <div class="contact1-form validate-form" action="" method="">
        <span class="contact1-form-title">
        Nous contacter
        </span>



        <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
          <input class="input1" type="text" id="title" name="titre" placeholder="Sujet">
          <span class="shadow-input1"></span>
        </div>

        <div class="wrap-input1 validate-input" data-validate = "Un message est requis">
          <textarea class="input1" name="content" id="content" placeholder="Message"></textarea>
          <span class="shadow-input1"></span>
        </div>

        <div class="container-contact1-form-btn">
          <button type="" onclick="send()" class="contact1-form-btn">
            <span>
              Contacter
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>



                <!--===============================================================================================-->
                	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
                <!--===============================================================================================-->
                	<script src="vendor/bootstrap/js/popper.js"></script>
                	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
                <!--===============================================================================================-->
                	<script src="vendor/select2/select2.min.js"></script>
                <!--===============================================================================================-->
                	<script src="vendor/tilt/tilt.jquery.min.js"></script>
                	<script >
                		$('.js-tilt').tilt({
                			scale: 1.1
                		})
                	</script>

                <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
                <script>
                  window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag('js', new Date());

                  gtag('config', 'UA-23581568-13');
                </script>

                <!--===============================================================================================-->
                	<script src="js/main.js"></script>




</div>
<script type="text/javascript" src="../js/contact.js">
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
