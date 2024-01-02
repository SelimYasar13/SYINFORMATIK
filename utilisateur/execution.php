<?php
$date = date('Y-m-d H:i:s');

if (isset($_SESSION['user_id'])) {
  $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
  $req->execute(array('inscription',$_SESSION['user_id'], $date));
  }
  else {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('inscription',0, $date));
  }
$min=1;
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=annuel_project;charset=utf8', 'root', 'root');
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
foreach($bdd->query('SELECT MAX(id) FROM captcha') as $row) {
  $max = $row['MAX(id)'];
}
// echo $max;
$id1 = rand($min, $max);
$id2 = rand($min, $max);
$id3 = rand($min, $max);
$id4 = rand($min, $max);
$id5 = rand($min, $max);
$id6 = rand($min, $max);
$id7 = rand($min, $max);
$id8 = rand($min, $max);
$id9 = rand($min, $max);

$q = "SELECT photo, sujet FROM captcha WHERE id = $id1";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo1 = $row['photo'];
$valeur1 = $row['sujet'];
}
$q = "SELECT photo, sujet FROM captcha WHERE id = $id2";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo2 = $row['photo'];
$valeur2 = $row['sujet'];
}
$q = "SELECT photo, sujet FROM captcha WHERE id = $id3";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo3 = $row['photo'];
$valeur3 = $row['sujet'];
}
$q = "SELECT photo, sujet FROM captcha WHERE id = $id4";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo4 = $row['photo'];
$valeur4 = $row['sujet'];
}

$q = "SELECT photo, sujet FROM captcha WHERE id = $id5";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo5 = $row['photo'];
$valeur5 = $row['sujet'];
}

$q = "SELECT photo, sujet FROM captcha WHERE id = $id6";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo6 = $row['photo'];
$valeur6 = $row['sujet'];
}

$q = "SELECT photo, sujet FROM captcha WHERE id = $id7";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo7 = $row['photo'];
$valeur7 = $row['sujet'];

}

$q = "SELECT photo, sujet FROM captcha WHERE id = $id8";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo8 = $row['photo'];
$valeur8 = $row['sujet'];
}

$q = "SELECT photo, sujet FROM captcha WHERE id = $id9";
$req = $bdd->prepare($q);
$req->execute();
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
$photo9 = $row['photo'];
$valeur9 = $row['sujet'];
}

// echo $id1;
// echo "<br>";
// echo $id2;
// echo "<br>";
//
// echo $id3;
// echo "<br>";
//
// echo $id4;
// echo "<br>";
//
// echo $id5;
// echo "<br>";
//
// echo $id6;
// echo "<br>";
//
// echo $id7;
// echo "<br>";
//
// echo $id8;
// echo "<br>";
//
// echo $id9;
// echo "<br>";


$array=array($valeur1,$valeur2,$valeur3,$valeur4,$valeur5,$valeur6,$valeur7,$valeur8,$valeur9);
/*print_r($array);*/
$value=$array[rand(0,8)];
echo "<br>";
// echo $value;
 ?>
