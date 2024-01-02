<?php
include('user_header.php');
?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Captcha</title>
  </head>
  <?php
  include("config.php");
  include("execution.php");
 ?>
 <body>

 <?php
 if($_SESSION['id'] !=1){
  header('location: inscription.php');
 }
  echo "Montre moi :  " . $value;
 // procedure
 $reponse = 0;
 if($value == $valeur1){
   $reponse++;
 }

 if($value == $valeur2){
   $reponse++;
 }

 if($value == $valeur3){
   $reponse++;
 }

 if($value == $valeur4){
   $reponse++;
 }

 if($value == $valeur5){
   $reponse++;
 }

 if($value == $valeur6){
   $reponse++;
 }

 if($value == $valeur7){
   $reponse++;
 }

 if($value == $valeur8){
   $reponse++;
 }

 if($value == $valeur9){
   $reponse++;
 }
 $temp=$value;
 $_SESSION['temp'] = $temp;
 $_SESSION['reponse'] = $reponse;
  ?>
  <form class="" action="verification.php" method="post">
    <table>
      <tr>
        <td id='captcha1'><input name="v1" class="captcha" type='checkbox' value='<?php echo $valeur1?>'/></td>
				<td id='captcha2'><input name="v2" class="captcha" type='checkbox' value='<?php echo $valeur2?>'/></td>
				<td id='captcha3'><input name="v3" class="captcha" type='checkbox' value='<?php echo $valeur3?>'/></td>

			</tr>
			<tr>
				<td id='captcha4'><input name="v4" class="captcha" type='checkbox' value='<?php echo $valeur4?>'/></td>
				<td id='captcha5'><input name="v5" class="captcha" type='checkbox' value='<?php echo $valeur5?>'/></td>
				<td id='captcha6'><input name="v6" class="captcha" type='checkbox' value='<?php echo $valeur6?>'/></td>
			</tr>
			<tr>
				<td id='captcha7'><input name="v7" class="captcha" type='checkbox' value='<?php echo $valeur7?>'/></td>
				<td id='captcha8'><input name="v8" class="captcha" type='checkbox' value='<?php echo $valeur8?>'/></td>
				<td id='captcha9'><input name="v9" class="captcha" type='checkbox' value='<?php echo $valeur9?>'/></td>
			</tr>
      </tr>
    </table>
    <input type="submit" class="bouton" name="bouton"/>
  </form>
  <?php include("../style/stylecaptcha.php"); ?>
  </body>
</html>
