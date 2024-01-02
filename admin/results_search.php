<?php

include('config.php');
include('header_admin.php');

?>


<br>

  <div class="container">

                <?php

                include('config.php');
                if (isset($_POST['Button']))
                {

                        $search = $_POST['recherche'];





                        $requser = $bdd->prepare("SELECT pseudo,first_name,last_name FROM site_user WHERE pseudo = ? ");
                        $requser -> execute(array($_POST['recherche']));
                        $result = $requser->fetch();

                        echo $result['pseudo'];
                        echo "  ";
                        echo $result['first_name'];
                        echo "  ";
                        echo $result['last_name'];
















                         /*if($user['confirme'] == 1) {*/




                      }



                         /*$bdd->prepare('UPDATE site_user SET password ="'.$_POST["vmdp"].' WHERE user_id ="'. $_SESSION['user_id'].'"');*/











                ?>






</div>
</body>
</html>
