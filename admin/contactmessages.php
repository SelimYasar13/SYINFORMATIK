<?php
include('header_admin.php');
include('config.php');

  $requser = $bdd->query('SELECT message_id,title,content,user_id FROM mail_contact');
  $userinfo = $requser->fetchAll();
?>

<div class="container" id="titlemessage">
  <h1>Messages de contact</h1>
</div>

<div id="containermessage" class="container">

<?php
foreach ($userinfo as $key => $value) {
$reqid =$bdd->prepare('SELECT pseudo FROM site_user WHERE user_id = ?');
$pseudouser = $reqid->execute([
  $value['user_id']
]);
$pseudo = $reqid->fetch();
?>
<div class="" id="divmess">

  <p class="pseudo"> Titre : <?php echo $value['title'] ?></p>
  <p> Sujet : <?php echo $value['content'] ?></p>
  <p> Auteur : <?php echo $pseudo['pseudo'] ?></p>
  <button type="button" onclick="deleteContact(<?php echo $value['message_id']?>)" name="button"> Supprimer</button>
</div>
<hr class="separaterule">

<?php } ?>

</div>



</body>
<script type="text/javascript" src="../js/deletecontact.js">

</script>
</html>
