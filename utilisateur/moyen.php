<?php
include('config.php');
include('../style/style.php');
$q = 'SELECT AVG(note) FROM note';
$req = $bdd->query($q);
$results = $req->fetch();
$results = (int)$results['AVG(note)'];
if ($results==1) {
  ?>
  <div class="rating rating2">
    <a>★</a>
  </div>
<?php }
elseif ($results==2) {
  ?>
  <div class="rating rating2">
    <a>★</a>
    <a>★</a>
  </div>
<?php
}
elseif ($results==3) {
  ?>
  <div class="rating rating2">
    <a>★</a>
    <a>★</a>
    <a>★</a>
  </div>
<?php
}
elseif ($results==4) {
  ?>
  <div class="rating rating2">
    <a>★</a>
    <a>★</a>
    <a>★</a>
    <a>★</a>
  </div>
<?php}
elseif ($results==5) {
  ?>
  <div class="rating rating2">
    <a>★</a>
    <a>★</a>
    <a>★</a>
    <a>★</a>
    <a>★</a>
  </div>
<?php
}
  ?>
