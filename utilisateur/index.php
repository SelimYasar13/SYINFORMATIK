<?php
 include('user_header.php');
include('config.php');
$date = date('Y-m-d H:i:s');

if (isset($_SESSION['user_id'])) {
  $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
  $req->execute(array('accueil',$_SESSION['user_id'], $date));
  }
  else {
    $req = $bdd->prepare('INSERT INTO page(page, user_id, date) VALUES(?, ?, ?)');
    $req->execute(array('accueil',0, $date));
  }
$req = 'SELECT image,title,autor,posting_date,content,article_id FROM article';

$count = $bdd->query($req);

$article = $count->fetchAll(PDO::FETCH_ASSOC);

$reqcours = 'SELECT id,sujet,date,image,niveau,matiere,description FROM cours';

$count = $bdd->query($reqcours);

$cours = $count->fetchAll(PDO::FETCH_ASSOC);

 ?>
 <div class="container" id="containerslide">


<div class="Modern-Slider" id="reg">
<!-- Item -->
<div class="item">
<div class="img-fill">
  <img src="../image/fond.jpg" id="regimage" alt="">
  <div class="info">
    <div>
      <h3>Des cours de tout niveau.</h3>
      <h5></h5>
    </div>
  </div>
</div>
</div>
<!-- // Item -->
<!-- Item -->
<div class="item">
<div class="img-fill">
  <img src="../image/bdd.jpg" id="regimage" alt="">
  <div class="info">
    <div>
      <h3>Des articles sur le domaine informatique</h3>
      <h5></h5>
    </div>
  </div>
</div>
</div>
<!-- // Item -->
<!-- Item -->
<div class="item">
<div class="img-fill">
  <img src="https://i.imgur.com/TDxSvHH.jpg" id="regimage" alt="">
  <div class="info">
    <div>
      <h3>Des exercices pour s'entraîner seul.</h3>
      <h5></h5>
    </div>
  </div>
</div>
</div>
<!-- // Item -->
<!-- Item -->
<div class="item">
<div class="img-fill">
  <img src="https://i.imgur.com/p1XZ3Mu.jpg"  id="regimage"alt="">
  <div class="info">
    <div>
      <h3>Un suivi quotidien</h3>
      <h5></h5>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="container" id="bigtitlecontainer">
  <h1 id="titlejoin">Devenez un vrai pro.</h1>

</div>

<div class="container" id="containerrejoindre">
  <div id="titlerejoindre"class="">
    <div id="textrejoindre"class="">
      <p>Mettez toutes les chances de votre côté et gagnez du temps. Un réel outil d'apprentissage à votre disposition. Gratuitement.</p>
    </div>
    <div class="btnrej">
    <a href="inscription.php">  <button type="button" class="contact1-form-btn" name="button"> Nous rejoindre</button></a>
    </div>
  </div>
  <div class="container" id="imgrejoindre"class="">
    <a href="inscription.php" >   <img class="imgjoin"src="../image/syrejoindre.png" alt="Inscription">
</a>
  </div>
</div>

<!-- Item -->
<div class="container" id="coursrecents">
<h1 class="titlerecent"> Derniers cours publiés</h1>
<section class="container">
<section class="blog_section" id="blogreg">
            <div class="container">
                <div class="blog_content">
                    <div class="owl-carousel owl-theme">

<?php
                        foreach ($cours as $key => $value) {
                          // code...


                 ?>
                        <div class="blog_item">
                            <div class="blog_image">
                              <img class="img-fluid"src="../image/<?=$value['image'] ?>">                                <span><i class="icon ion-md-create"></i></span>
                            </div>
                            <div class="blog_details">
                                <div class="blog_title">
                                    <h5><a href="#"><?=$value['sujet']?></a></h5>
                                </div>
                                <ul>
                                    <li><i class="icon ion-md-person"></i><?= $value['niveau'] ?></li>
                                </ul>
                                <p><?= $value['description']?></p>
                                <a href="actu.php?id=<?=$value['id']?>">Accéder au cours<i class="icofont-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <?php    }
                         ?>
                    </div>
                </div>
            </div>
        </section>
      </section>
      </div>


      <div class="container" id="acturecent">
        <h1 class="titlerecent">Les dernières actus</h1>

        <section class="container">
        <section class="blog_section" id="blogreg">
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
              </section>
            </div>


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








<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../style/slick/slick.min.js"></script>
<script type="text/javascript" src="../style/slick/slick.js"></script>

<script type="text/javascript">
$(document).ready(function(){

$(".Modern-Slider").slick({
autoplay:true,
autoplaySpeed:5000,
speed:600,
slidesToShow:1,
slidesToScroll:1,
pauseOnHover:false,
dots:true,
pauseOnDotsHover:true,
cssEase:'linear',
// fade:true,
draggable:true,
prevArrow:'<button class="PrevArrow"></button>',
nextArrow:'<button class="NextArrow"></button>',
});

});

$(document).ready(function () {
$('.navbar-light .dmenu').hover(function () {
  $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
}, function () {
  $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
});
});
</script>

<script type="text/javascript" src="../js/header.js">
</script>






</body>
</html>
