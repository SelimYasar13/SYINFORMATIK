<?php
include('config.php');
include('header_admin.php');

// include('../utilisateur/user_header.php');
$q = 'SELECT id,sujet FROM cours ';
$req = $bdd->query($q);
$a = 1;
$c = 0;
$cont = 0;
$array = array();
$tmp = 0;
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Ajoute d'un QCM</title>
  </head>
  <body>
    <div class="container">
      <div class="contact1" id="contactbox">
        <div class="container-contact1">
          <form class="contact1-form validate-form" action="" method="post">
            <select name="choix" class="wrap-input1 validate-input">
              <?php
              while ($results= $req->fetch()) { ?>
               <option value="<?php echo $results['sujet'] ?>"><?php echo $results['sujet'] ?></option>
              <?php  } ?>
            </select>


            <div class="wrap-input1 validate-input">
                <input type="text" name="question" placeholder="Ecrivez la question" class="input1">
                <span class="shadow-input1"></span>
            </div>
            <div class="wrap-input1 validate-input">
                <input type="text" name="reponse" placeholder="Ecrivez la vrai reponse" class="input1">
                <span class="shadow-input1"></span>

            </div>
            <div class="wrap-input1 validate-input">
                <input type="text" name="1" placeholder="Proposition 1" class="input1">
                <span class="shadow-input1"></span>

            </div>
            <div class="wrap-input1 validate-input">
                <input type="text" name="2" placeholder="Proposition 2" class="input1">
                <span class="shadow-input1"></span>

            </div>
            <div class="wrap-input1 validate-input">
                <input type="text" name="3" placeholder="Proposition 3" class="input1">
                <span class="shadow-input1"></span>

            </div>
            <div class="wrap-input1 validate-input">
                <input type="text" name="4" placeholder="Proposition 4" class="input1">
                <span class="shadow-input1"></span>

            </div>
            <div class="wrap-input1 validate-input">
                <input type="text" name="5" placeholder="Proposition 5" class="input1">
                <span class="shadow-input1"></span>

            </div>

            <input type="submit" name="submit" value="Ajouter" class="contact1-form-btn">

          </form>
        </div>
      </div>

    </div>

  </body>
</html>

  <?php
  $a = 0;
    if (isset($_POST['submit'])) {
      if(!empty($_POST['choix']) && !empty($_POST['question']) && !empty($_POST['reponse'])){
        $ra = $bdd->prepare('SELECT id FROM cours WHERE sujet = ?');
        $ra->execute(array($_POST['choix']));
        $ra = $ra->fetch();
        $id_cours = $ra['id'];
        $insertsql = $bdd->prepare('INSERT INTO question(cours_id, question, reponse) VALUES(?, ?, ?)');
        $insertsql->execute(array($id_cours, $_POST['question'], $_POST['reponse']));





        for ($i=0; $i <=5 ; $i++) {
          if (!empty($_POST[$i])) {
            $a++;
          }
        }
        if ($a>=1) {

          $array[]=$_POST['reponse'];
          for ($i=0; $i <=5 ; $i++) {
            if (!empty($_POST[$i])) {
              $array[] = $_POST[$i];
              $cont++;
            }
          }


          // print_R($array);
          // echo "<br>";
          $i = $i - 1;
          // echo $i;
          // echo "<br>";

          for ($t=$i; $t >= 0 ; $t--) {
            // echo $t;
            // echo "<br>";

            if (!empty($array[$t])) {
              // echo $array[$t];
              // echo "<br>";
            }
            // code...
          }
          // echo $cont;
          // echo "<br>";
          // echo "<br>";
          // echo "<br>";
          // echo "<br>";
          // echo "<br>";
          // echo "PARTI TRIE";
          // echo "<br>";


          for ($i=$cont; $i >= 0 ; $i--) {
            $tmp = rand(0,$i);
            // echo $tmp;
            // echo "  ";
            // echo $array[$tmp];
            // echo " ";
            $insertsql = $bdd->prepare('INSERT INTO reponses(question, reponse) VALUES(?, ?)');
            $insertsql->execute(array($_POST['question'],$array[$tmp]));
            // print_r($array);
            // echo "<br>";


            unset($array[$tmp]);
            sort($array);
            // code...
          }

























        }
        else {
          echo "Ajouter deux proposition minimun";
          exit;
        }



      }


    }
   ?>
