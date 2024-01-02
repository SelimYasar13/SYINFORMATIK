<?php
session_start();
include("config.php");
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == 0){
        $allowed = array('pdf' , 'PDF');
        $filename = $_FILES["fichier"]["name"];
        $filetype = $_FILES["fichier"]["type"];
        $filesize = $_FILES["fichier"]["size"];
        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        echo $ext;
        echo "</br>";

        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($ext, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("../files/" . $_FILES["fichier"]["name"])){
                echo $_FILES["fichier"]["name"] . " existe déjà.";
                exit;
            } else{
                move_uploaded_file($_FILES["fichier"]["tmp_name"], "../files/" . $_FILES["fichier"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            }
            $q = "INSERT INTO cours(sujet,fichier,etat,user_id) VALUES (:sujet,:fichier,0,:user_id)";
            $res = $bdd->prepare($q);
            $res->execute(array('sujet'=>$_POST['sujet'],'fichier'=>$_FILES["fichier"]["name"],'user_id'=>$_SESSION['user_id']));
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
        }
    } else{
        echo "Error: " . $_FILES["fichier"]["error"];
    }
}
// Insertion dans la bdd

?>
