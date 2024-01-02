<?php
// require_once 'config.php';
include('config.php');
require_once 'function.php';
$date = date('Y-m-d H:i:s');
include('header_admin.php');
// $article = getArticle($bdd, 1, $_GET['id']); ?>

<body>
  <div class="container">
<div class="contact1" id="contactbox">
  <div class="container-contact1">
    <div class="contact1-pic js-tilt" data-tilt>
      <div class="">
        <p id="peech">Ajoutez un article et il sera visible par tous les utilisateurs !</p>
        <p id="formazer">Image obligatoire.</p>
      </div>
    </div>
      <form role="form" action="" method="POST" class="contact1-form validate-form" enctype="multipart/form-data">
      <span class="contact1-form-title">Ajouter un article !</span>

      <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
        <input type="text" class="input1" id="title" name="title" placeholder="Le titre" value=""/>
        <span class="shadow-input1"></span>
      </div>

        <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
        <input type="text" class="input1" name="subject" id="subject" placeholder="Le sujet" value=""/>
        <span class="shadow-input1"></span>
      </div>

      <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
        <textarea class="input1" name="content" id="content" placeholder="Le contenu"></textarea>
        <span class="shadow-input1"></span>
      </div>

      <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
        <input type="text" class="input1" name="autor" id="autor" placeholder="L'auteur" value=""/>
        <span class="shadow-input1"></span>
      </div>

      <div class="wrap-input1 validate-input" data-validate = "Un objet est requis">
        <input type="file"  name="image" id="image" placeholder="L'image" accept="image/png, image/jpeg">
        <span class="shadow-input1"></span>
      </div>

        <input type="submit" name="add" onclick="checkAddArticle()" value="J'ajoute !" class="contact1-form-btn">
    </form>
    </div>
  </div>
</div>

</body>
<script type="text/javascript" src="../js/checkaddcours.js">

</script>
</html>
<?php





if (isset($_POST['add'])) {
 if (!empty($_POST['title']) AND !empty($_POST['subject']) AND !empty($_POST['content']) AND !empty($_POST['autor'])) {
   if (isset($_FILES['image']) && $_FILES["image"]["error"] == 0 ) {
     $imagename = $_FILES["image"]["name"];
     $imagetype = $_FILES["image"]["type"];
     $imagesize = $_FILES["image"]["size"];
     $imagesize = 2 * 1024 * 1024;


     if($imagesize > $imagesize) {
        ?>
        <script type="text/javascript">
          setTimeout(alert, 500, 'Error: La taille d'\'image est supérieure à la limite autorisée.');
        </script>

        <?php
      }
      if (file_exists("../image/" . $_FILES["image"]["name"])) {
        echo "RENTRER 5<br>";

        $longueurKey = 8;
        $key = "";
        for($i=1;$i<$longueurKey;$i++){
          $key .= mt_rand(0,9);
        }
        $_FILES["image"]["name"] = $key . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "../image/" . $_FILES["image"]["name"]);
      }
      else {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../image/" . $_FILES["image"]["name"]);
        $q = "INSERT INTO article(title, subject, content, autor, image, posting_date) VALUES (?, ?, ?, ?, ?, ?)";
        $res = $bdd->prepare($q);
        $results = $res->execute(array($_POST['title'],$_POST['subject'],$_POST['content'],$_POST['autor'], $_FILES["image"]["name"],$date));

        if ((int)$results == 1) {
            ?>
            <script type="text/javascript">
              setTimeout(alert, 500, 'Vous venez d'\'ajouter une article');
            </script>

            <?php

          }

      }
   }
   // $q = "INSERT INTO article(title,subject,content,autor) VALUES (:title,:subject,:content,:autor)";
   // $res = $bdd->prepare($q);
   // $res->execute(array('title'=>$_POST['title'],'subject'=>$_POST['subject'],'content'=>$_POST['content'],'autor'=>$_POST['autor']));
 }
}
?>
