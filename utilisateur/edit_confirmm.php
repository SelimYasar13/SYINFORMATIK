<?php
include('user_header.php');
include('config.php');
include('connexion_check.php');

$insertsql = $bdd->prepare('UPDATE site_user SET
  pseudo ="'.$_POST["pseudo"].'" , last_name ="'.$_POST["last_name"].'", first_name ="'.$_POST["first_name"].'", mail ="'.$_POST["mail"].'"
  WHERE user_id ="'. $_SESSION['user_id'].'"  ');
  $insertsql->execute(array($_POST['pseudo'], $_POST['last_name'], $_POST['first_name'], $_POST['mail']));
?>
<body class="profilimg">
<h3 class="success"> Infos modifiées avec succès.<h3>
</body>
<script src="../js/edit.js"></script>
</html>
