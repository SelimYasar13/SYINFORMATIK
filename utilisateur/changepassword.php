<?php
include('config.php');
session_start();

$date = date('Y-m-d H:i:s');
$req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
$req->execute(array('profil',$_SESSION['user_id'], $date));

$req = $bdd->prepare('SELECT password from site_user WHERE user_id = ?');
$req->execute([
  $_SESSION['user_id']
]);

$pwq = $req->fetch();


if (isset($_POST['formmdp']))
{
   $mdp = md5($_POST['mdp']);

        if($mdp == $pwq['password']){


        $nmdp= $_POST['nmdp'];
        $vmdp=$_POST['vmdp'];
        $vmdp2 = md5($_POST['vmdp']);


        if ($nmdp == $vmdp)
        {
         /*if($user['confirme'] == 1) {*/

         $insertsql = $bdd->prepare('UPDATE site_user SET password = ? WHERE user_id = ? ');

         $insertsql->execute(array($vmdp2,$_SESSION['user_id']));
         header("location: profil.php?id=".$_SESSION['user_id']);



         /*$bdd->prepare('UPDATE site_user SET password ="'.$_POST["vmdp"].' WHERE user_id ="'. $_SESSION['user_id'].'"');*/


        }





      else{
            echo "Mots de passes différents";
          }
    }
    else{
      echo "Mdp inccorect";

    }
  }


    ?>
