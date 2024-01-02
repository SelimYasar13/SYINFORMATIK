<?php
session_start();
include('config.php');
include('connexion_check.php');

if(isset($_GET['id'])){
$date = date('Y-m-d H:i:s');
$req = $bdd->prepare('INSERT INTO visited_course(course_id, user_id, date) VALUES(?, ?, ?)');
$req->execute(array($_GET['id'],$_SESSION['user_id'], $date));
}

?>
