<?php
include('user_header.php'); ?>




<body class="confirmationimg">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="contenu">
              <div class="display-4 main-title">UN MAIL DE CONFIRMATION VOUS A ÉTÉ ENVOYÉ SUR VOTRE BOITE MAIL !</div>
              <div class="spam">(Pensez à vérifier vos spams)</div><br><br><br>




          <a id="conf" href="<?php echo "verification.php?key=".$_GET['key']; ?>"><div class="spam">Si vous voulez renvoyez le mail cliquer içi</div></a>


            </div>
          </div>
        </div>
      </div>
  </body>
</html>



<?php

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


	if(isset($_GET['pseudo'], $_GET['key']) AND !empty($_GET['pseudo']) AND !empty($_GET['key'])) {

	$pseudo = htmlspecialchars(urldecode($_GET['pseudo']));
	$key = htmlspecialchars(($_GET['key']));
	$requser = $bdd->prepare("SELECT * FROM site_user WHERE pseudo = ?");
	$requser->execute(array($pseudo));
	$userexist = $requser->rowCount();

	if ($userexist == 1) {
		$user = $requser->fetch();
		if($user['confirme'] == 0) {
			$updateuser = $bdd->prepare("UPDATE site_user SET confirme = 1 WHERE pseudo = ? AND confirm_key = ?");
			$updateuser->execute(array($pseudo, $key));
			header('Location: connexion.php');
		} else {
			echo "Votre compte a déjà été confirmé !";
		}

	} else {
		echo "L'utilisateur n'existe pas";
	}
}


?>
