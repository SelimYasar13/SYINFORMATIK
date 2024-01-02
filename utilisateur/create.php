<?php
session_start();

$date = date('Y-m-d H:i:s');

if(isset($_POST['content']) && isset($_POST['course_id'])){
  $db = new PDO('mysql:host=localhost:3306;dbname=annuel_project', 'root','root');

$stmt = $db->prepare('INSERT INTO comment(content,course_id,publication_date,fk_user_id) VALUES (?,?,?,?)');
if($stmt){
$success =  $stmt->execute([
  $_POST['content'],
  $_POST['course_id'],
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
