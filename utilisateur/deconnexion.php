<?php
session_start();
include('config.php');
$fin = microtime(true);
$_SESSION['fin'] = $fin;
$id = $_SESSION['user_id'];
$dure = $_SESSION['fin']-$_SESSION['debut'];
$dure = (int)$dure;
$contry;
$region;
// echo $dure;
// echo "<br>";
function getIp(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
// echo 'L adresse IP de l utilisateur est : '.getIp();

$ip = $_SERVER['REMOTE_ADDR'];
// echo $ip;

// USE AN API TO GET VISITOR DATA
$query = file_get_contents("http://ip-api.com/json/{$user_ip}"); //use this for online
$json = json_decode($query, true);
if ($json && $json['status'] == 'success') {
  // echo "ISP:".$json['isp']."<br/>";
  // echo "COUNTRY:".$json['country']."<br/>";
  // echo "COUNTRY CODE:".$json['countryCode']."<br/>";
  // echo "REGION NAME:".$json['regionName']."<br/>";
  // echo "CITY:".$json['city']."<br/>";
  // echo "ZIP:".$json['zip']."<br/>";
  // echo "LATITUDE:".$json['lat']."<br/>";
  // echo "LONGITUDE:".$json['lon']."<br/>";
  // echo "TIMEZONE:".$json['timezone']."<br/>";
  // echo "ORG:".$json['org']."<br/>";
  // echo "AS:".$json['as']."<br/>";
  $contry = $json['country'];
  $region = $json['regionName'];
}
else {
  echo "Something is Wrong !";
  echo "<br>";
}
$date = date('Y-m-d H:i:s');
// echo $date;
// echo "<br>";
// echo $_SESSION['user_id'];
// echo "<br>";

$req = $bdd->prepare('SELECT id, adress_ip, user_id, temps, last_time, pays, region FROM visiteurs WHERE user_id = ?');
$succes = $req->execute(array($_SESSION['user_id']));
$results = $req->fetch();
// echo $results['id'];

// echo "<br>";
// echo $results['temps'];
if (!empty($results['id'])) {
  $dure = $dure + $results['temps'];
  // echo "if";
  // echo "<br>";
  // echo "<br>";
  //
  // echo $region;
  // echo "<br>";
  //
  // echo $contry;
  // echo "<br>";
  $req = $bdd->prepare('UPDATE visiteurs SET adress_ip = ? , temps = ? , last_time = ? , pays = ? , region = ? WHERE user_id = ?');
  $results = $req->execute(array($ip, $dure, $date, $contry, $region, $_SESSION['user_id']));
  // echo (int)$results;
}
else {
  // echo "else";
  // echo "string";
  // echo "<br>";
  //
  // echo $region;
  // echo "<br>";
  //
  // echo $contry;
  // echo "<br>";
  $insertsql = $bdd->prepare('INSERT INTO visiteurs(adress_ip, user_id, temps, last_time, pays, region) VALUES(?, ?, ?, ?, ?, ?)');
  $insertsql->execute(array($ip, $_SESSION['user_id'], $dure, $date, $json['country'], $json['regionName']));
}
$req = $bdd->prepare('UPDATE site_user SET  temps = ? , last_signin_date = ? WHERE user_id = ?');
$req->execute(array($dure, $date, $_SESSION['user_id']));

$_SESSION = array();
session_destroy();
header('location:page_accueil.php');
?>
