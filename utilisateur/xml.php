<?php
include("config.php");
$sql = 'SELECT * FROM site_user';
$data = $bdd->query($sql);
$pers = $data->fetch(PDO::FETCH_ASSOC);


$sql = 'SELECT * FROM site_user';
$data = $bdd->query($sql);
if ($data){
$document = new DomDocument();
$document->preserveWhiteSpace = false;
$document->formatOutput = true;
// on crée la racine <lesfilms> et on l'insère dans le document
$site_user = $document->createElement('site_user');
$document->appendChild($site_user);

// On boucle  pour tous les films trouvés dans la BD:
while($unuser=$data->fetch(PDO::FETCH_OBJ))
    {
    $user=$document->createElement('user');
    $user->setAttribute('user_id', $unuser->user_id);
    $site_user->appendChild($user);

    $confirme = $document->createElement('confirme');
    $user->appendChild($confirme);
    $text=$document->createTextNode(utf8_encode($unuser->confirme));
    $confirme->appendChild($text);

    $confirm_key = $document->createElement('confirm_key');
    $user->appendChild($confirm_key);
    $text=$document->createTextNode(utf8_encode($unuser->confirm_key));
    $confirm_key->appendChild($text);

    $password = $document->createElement('password');
    $user->appendChild($password);
    $text=$document->createTextNode(utf8_encode($unuser->password));
    $password->appendChild($text);

    // on crée l'élément title et on l'ajoute à $film
    $first_name = $document->createElement('first_name');
    $user->appendChild($first_name);
    $text=$document->createTextNode(utf8_encode($unuser->first_name));
    $first_name->appendChild($text);

    $last_name = $document->createElement('last_name');
    $user->appendChild($last_name);
    $text=$document->createTextNode(utf8_encode($unuser->last_name));
    $last_name->appendChild($text);

    //crée et ajoute le realisateur a $film
    $signup_date=$document->createElement('signup_date');
    $id=$document->createTextNode($unuser->signup_date);
    $signup_date->appendChild($id);
    $user->appendChild($signup_date);

    $last_signin_date=$document->createElement('last_signin_date');
    $id=$document->createTextNode($unuser->last_signin_date);
    $last_signin_date->appendChild($id);
    $user->appendChild($last_signin_date);

    $can_post = $document->createElement('can_post');
    $user->appendChild($can_post);
    $text=$document->createTextNode(utf8_encode($unuser->can_post));
    $can_post->appendChild($text);

    $mail = $document->createElement('mail');
    $user->appendChild($mail);
    $text=$document->createTextNode(utf8_encode($unuser->mail));
    $mail->appendChild($text);

    $pseudo = $document->createElement('pseudo');
    $user->appendChild($pseudo);
    $text=$document->createTextNode(utf8_encode($unuser->pseudo));
    $pseudo->appendChild($text);

    $temps = $document->createElement('temps');
    $user->appendChild($temps);
    $text=$document->createTextNode(utf8_encode($unuser->temps));
    $temps->appendChild($text);

    $badge = $document->createElement('badge');
    $user->appendChild($badge);
    $text=$document->createTextNode(utf8_encode($unuser->badge));
    $badge->appendChild($text);
  }
  $document->save('/var/www/html/utilisateur/users.xml');
  echo "Export XML fini !";
 }

 else { echo "Aucun utilisateur dans la base de données !" ;}

 ?>
