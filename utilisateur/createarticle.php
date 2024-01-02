<?php
session_start();
include('config.php');
$date = date('Y-m-d H:i:s');

if(isset($_POST['content']) && isset($_POST['article_id'])){
$stmt = $bdd->prepare('INSERT INTO article_comment(content,article_id,publication_date,fk_user_id) VALUES (?,?,?,?)');
if($stmt){
$success =  $stmt->execute([
  $_POST['content'],
  $_POST['article_id'],
  $date,
  $_SESSION['user_id']
]);
echo(int)$success;
echo $stmt->debugDumpParams();
}
else{
  echo'-1';
}

}
else{
  echo "-2";
}




 ?>
