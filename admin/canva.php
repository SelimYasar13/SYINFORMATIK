<?php
include('config.php');
include('header_admin.php');
  $res;
  $nom = array();
  $temps = array();
  $inconu;
  $connu;
  $region = array();
  $total = array();
  $name = array();
  $somm = array();


  $req=$bdd->query('SELECT temps,last_name,first_name FROM site_user ORDER BY temps DESC LIMIT 5');
  while ($res = $req->fetch()) {
    $temps[] = $res['temps'];
    $nom[] = $res['last_name'] . " " . $res['first_name'];
  }
  $tab = [$nom,$temps];

  $req = $bdd->query('SELECT user_id,COUNT(*) AS total FROM page WHERE user_id = 0 GROUP BY user_id ORDER BY total DESC ');
  $results = $req->fetch();
  $inconu =  $results['total'];
  $req = $bdd->query('SELECT  COUNT(*) AS total FROM page ');
  $results = $req->fetch();
  $connu = $results['total'] - $inconu;


  $req=$bdd->query('SELECT region, COUNT(*) AS total FROM visiteurs GROUP BY region ORDER BY total DESC LIMIT 5');
  while ($res = $req->fetch()) {
    $region[] = $res['region'];
    $total[] = $res['total'];
  }

  $req = $bdd->query('SELECT page, COUNT(*) AS total FROM page GROUP BY page ORDER BY total DESC LIMIT 5');
  while ($res = $req->fetch()) {
    $name[] = $res['page'];
    $somm[] = $res['total'];
  }




   ?>

  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Statistiques</title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" charset="utf-8"></script>
    </head>
    <header>

    </header>
    <body>
      <div class="container" id="canvascontainer">
        <div class="container" id="flexcanva">


        <div class="container"id="tempsflex">
          <h2 class="canvatitle">Traffic des pages</h2>
          <div class="container" id="page">
            <canvas id="Chart_page" width="300" height="300"></canvas>
          </div>
          <button class="contact1-form-btn" id="btncanva" onclick="page(); this.onclick = undefined;">Dévoiler</button>
        </div>
      <div class="container"id="tempsflex">
        <h2 class="canvatitle">Temps passé sur le site</h2>
        <div class="container" id="temps">
          <canvas id="Chart_time" width="300" height="300"></canvas>
        </div>
        <button class="contact1-form-btn" id="btncanva" onclick="temps(); this.onclick = undefined;">Dévoiler</button>
      </div>
      </div>
        <div class="container" id="flexcanva">


      <div class="container" id="tempsflex">
        <h2 class="canvatitle">Utilisateurs non inscris</h2>
        <div class="container" id="user">
          <canvas id="Chart_user" width="300" height="300"></canvas>
        </div>
        <button class="contact1-form-btn" id="btncanva" onclick="user(); this.onclick = undefined;">Dévoiler</button>
      </div>

      <div class="container" id="tempsflex">
        <h2 class="canvatitle">Régions des utilisateurs</h2>
        <div class="container" id="region">
          <canvas id="Chart_region" width="300" height="300"></canvas>
        </div>
        <button class="contact1-form-btn" id="btncanva" onclick="region(); this.onclick = undefined;">Dévoiler</button>
      </div>
      </div>

      <div id="">

        </div>
          </div>
    </body>
























































































































































    <script type="text/javascript">
      function temps() {

        var ctx = document.getElementById('Chart_time').getContext('2d');



        var data = {

          labels: ['<?php echo $nom['3']; ?>', '<?php echo $nom['1']; ?>', '<?php echo $nom['0']; ?>', '<?php echo $nom['4']; ?>'
          , '<?php echo $nom['2']; ?>',],
          datasets: [
            {
              label: 'Bar Dataset',
              backgroundColor: '#283e4a',
              borderColor: '#212529',
              borderWidth:  2,
              data: ['<?php echo $temps['3']; ?>', '<?php echo $temps['1']; ?>', '<?php echo $temps['0']; ?>', '<?php echo $temps['4']; ?>'
              , '<?php echo $temps['2']; ?>',],
            },{
              label: 'Line Dataset',
              type: 'line',


              backgroundColor: '#ecf0f1',
              borderColor: '',
              borderWidth:  0,
              label: 'Line Dataset',

              data: ['<?php echo $temps['3']; ?>', '<?php echo $temps['1']; ?>', '<?php echo $temps['0']; ?>', '<?php echo $temps['4']; ?>'
              , '<?php echo $temps['2']; ?>',],
            }
          ],

        }
        var options = {
          responsive: false,
          legend: {
              labels: {
                  fontColor: 'black'
              }
          }
        }

        var config = {
          type:  'bar',
          data : data,
          options : options,

        }

        var Chart_time = new Chart(ctx, config);



      }
      function user() {
        console.log("hey");
        var ctx = document.getElementById('Chart_user').getContext('2d');

        var data = {
          labels: ['Inscris','Non inscris'],
          datasets: [{
            backgroundColor: ['rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],
            data: [<?php echo $connu; ?>, <?php echo $inconu; ?>]
               }
             ],


        }

        var options = {
          responsive: false,

        }

        var config = {


        }

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options,
        });

      }

      function region() {
        var ctx = document.getElementById('Chart_region').getContext('2d');



        var data = {

          labels: ["<?php echo $region['3']; ?>", "<?php echo $region['1']; ?>", "<?php echo $region['0']; ?>", "<?php echo $region['4']; ?>"
          , "<?php echo $region['2']; ?>"],
          datasets: [
            {
              label: 'Bar Dataset',
              backgroundColor: '#283e4a',
              borderColor: '#212529',
              borderWidth:  2,
              data: ['<?php echo $total['3']; ?>', '<?php echo $total['1']; ?>', '<?php echo $total['0']; ?>', '<?php echo $total['4']; ?>'
              , '<?php echo $total['2']; ?>'],
            }
          ],

        }
        var options = {
          responsive: false,
          legend: {
              labels: {
                  fontColor: 'black'
              }
          }
        }

        var config = {
          type:  'bar',
          data : data,
          options : options,

        }

        var Chart_time = new Chart(ctx, config);
      }

      function page() {
        var ctx = document.getElementById('Chart_page').getContext('2d');



        var data = {

          labels: ['<?php echo $name['3']; ?>', '<?php echo $name['1']; ?>', '<?php echo $name['0']; ?>', '<?php echo $name['4']; ?>'
          , '<?php echo $name['2']; ?>'],
          datasets: [
            {
              label: 'Bar Dataset',
              backgroundColor: ['#1e1f26','#e94c89','#4280ff','#ecf0f1','#283e4a'],
              borderColor: '#212529',
              borderWidth:  2,
              data: ['<?php echo $somm['3']; ?>', '<?php echo $somm['1']; ?>', '<?php echo $somm['0']; ?>', '<?php echo $somm['4']; ?>'
              , '<?php echo $somm['2']; ?>'],
            }
          ],

        }

        var options = {
          responsive: false,
          legend: {
              labels: {
                  fontColor: 'black'
              }
          }
        }

        var config = {
          type:  'doughnut',
          data : data,
          options : options,

        }

        var Chart_time = new Chart(ctx, config);

      }
      function don() {
        console.log("HEY");
      }







    </script>

  </html>
