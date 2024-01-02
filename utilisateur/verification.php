<?php
  if (!isset($_SESSION)) {
    session_start();
  }


  // include('user_header.php');
  include("config.php");
  // include("execution.php");
  $q = "SELECT confirm_key FROM site_user WHERE mail = ?";
  $req = $bdd->prepare($q);
  $req->execute([$_SESSION['email']]);
  $results = $req->fetchAll();

 $email=$_SESSION['email'];
 
 $pseudo=$_SESSION['pseudo'];
 foreach ($results as $key => $value) {

 }
 $key=$_GET['key'];

 if($key == $value['confirm_key']){
   $to = $email;
   $subject = 'Confirmation de votre compte';
   $message = '<a href="localhost/utilisateur/confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">CONFIRMEZ VOTRE COMPTE ! </a>';
   $headers .= "Content-type:text/html;charset=UTF-8" ."\r\n";

   mail($to, $subject, $message, $headers);
   header('location: confirmation.php?key='.$key);
 }
  else {

 }
  ?>
