<?php
include('config.php');


$stmt = $bdd->prepare('DELETE FROM mail_contact WHERE message_id = ? ');
if($stmt){
$success =  $stmt->execute([
   $_GET['id']

]);
echo(int)$success;
}
else{
  echo'-1';
}


?>
