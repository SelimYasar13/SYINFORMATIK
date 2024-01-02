<?php session_start();
include('connexion_check.php');
include('config.php');
include('user_header.php');
    $req = 'SELECT image,title,autor,posting_date,content,article_id FROM article';

    $count = $bdd->query($req);

    $article = $count->fetchAll(PDO::FETCH_ASSOC);


    if (isset($_SESSION['user_id'])) {
      $date = date('Y-m-d H:i:s');
      $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
      $req->execute(array('actualites',$_SESSION['user_id'], $date));
      }
      else {
        $date = date('Y-m-d H:i:s');
        $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
        $req->execute(array('actualites',0, $date));
      }

?>


  <head>
    <meta charset="utf-8">
    <title>Actualites</title>
  </head>

<section class="container">
<section class="blog_section">
            <div class="container">
                <div class="blog_content">
                    <div class="owl-carousel owl-theme">

<?php
                        foreach ($article as $key => $value) {
                          // code...


                 ?>
                        <div class="blog_item">
                            <div class="blog_image">
                              <img class="img-fluid"src="../image/<?=$value['image'] ?>">                                <span><i class="icon ion-md-create"></i></span>
                            </div>
                            <div class="blog_details">
                                <div class="blog_title">
                                    <h5><a href="#"><?=$value['title']?></a></h5>
                                </div>
                                <ul>
                                    <li><i class="icon ion-md-person"></i><?= $value['autor'] ?></li>
                                    <li><i class="icon ion-md-calendar"></i><?= $value['posting_date'] ?></li>
                                </ul>
                                <p><?= $value['content']?></p>
                                <a href="actu.php?id=<?=$value['article_id']?>">Lire en entier<i class="icofont-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <?php    }
                         ?>
                    </div>
                </div>
            </div>
        </section>





<footer class="actualitefooter" id="footer">
  <div class="container" id="containerfooter">
              <ul class="ulfooter">
                <li class="nav-item">
                  <a class="nav-link" id="nava" href="nous.php"><img id="imgheader" style="" src="../image/nous.svg" alt="">NOUS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="nava" href="cgu.php"><img id="imgheader" style="" src="../image/cgu.svg" alt="">CGU</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" id="nava" href="contact.php">
                  <img id="imgheader" style="" src="../image/contactheader.svg" alt="">Un problème ? contact</a>
              </li>
        </ul>
      </div>


  </div>
</footer>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
       <!-- bootstrap -->
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
       <!-- carousel -->
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
  </html>

  <script type="text/javascript">

  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    autoplay:false,
    smartSpeed: 3000,
    autoplayTimeout:7000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
  </script>
