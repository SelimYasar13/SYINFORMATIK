<?php



include('config.php');
session_start();
include('user_header.php');
// echo $_SESSION['id_cours'];
$counter = 0;
$results = 0;
$i = 1;
$min = 1;
if(isset($_POST['submit'])){

  $q = 'SELECT id,cours_id,question,reponse FROM question WHERE cours_id = '.$_SESSION['id_cours'];
  $qs = $bdd->query($q);
  while ($qes = $qs->fetch()) {
    // nous on doit determiner le nombre des reponses possible par question
    $r = 'SELECT max(id) FROM reponses WHERE question = ? ' ;
    $rs = $bdd->prepare($r);
    $rs->execute(array($qes['question']));
    $res = $rs->fetch();
    $max = $res['0'];
    echo "reponse de utilisateur : ";
    for ($i=$min; $i<=$max  ; $i++) {
      if (isset($_POST[$i])) {
        // echo $_POST[$i] ." //";
        if ($_POST[$i] != $qes['reponse']) {
          $counter = 0;
          break;
        }
        elseif ($_POST[$i] == $qes['reponse']) {
          $counter = 1;
        }

      }
    }
    $results += $counter;


    // echo "////////";
    // echo "la vrai reponse c'est " . $qes['reponse'];





    // echo "<br>";

    $min = $max;
    $counter = 0;
  }

}
?>
<script type="text/javascript">
  alert('Vous avez eu <?php echo $results; ?>');
</script>
<?php
header('location: listefichier.php');
 ?>
