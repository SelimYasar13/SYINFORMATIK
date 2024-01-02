<?php
include('header_admin.php');
include('config.php');

if (isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
$confirme = (int) $_GET['confirme'];

$req = $bdd->prepare('UPDATE site_user SET confirme = 1 WHERE user_id = ?');
$req->execute(array($confirme));
}

if (isset($_GET['delete']) AND !empty($_GET['delete'])) {
$delete = (int) $_GET['delete'];

$req = $bdd->prepare('DELETE FROM site_user WHERE user_id = ?');
$req->execute(array($delete));
}

$site_user = $bdd->query('SELECT * from site_user ORDER BY pseudo ASC');



?>

  <?php
    include('config.php');

?>
<div class="container" id="contienttout">
<p id="titleuserlist">Liste des utilisateurs</p>

<?php while ($s = $site_user->fetch()) { ?>

<div class="container" id="usercontainer">
<div class="pseudocontent">
  <p class="psd"><?= $s['pseudo'] ?></p>

   <?php if($s['confirme']==0) {
    echo'<p>Utilisateur non confirmé</p>';
  }
?>
</div>



   - <div class="btnflex">
</div>
   <?php if($s['confirme']==0) { ?>  <button class="contact1-form-btn" type="button" name="button">  <a  class="contact1-form-btn" href="user_list.php?confirme=<?= $s['user_id']?>">Confirmer</a></button><?php } ?>
 - <button class="contact1-form-btn" type="button" name="button"><a class="contact1-form-btn" href="user_list.php?delete=<?= $s['user_id']?>">Supprimer</a></button>
 </div>
</div>





<hr class="separaterule">
<?php } ?>
</div>

</body>
</html>
