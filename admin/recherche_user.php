<?php

include('header_admin.php');
include('config.php');

  $requser = $bdd->prepare('SELECT * FROM site_user WHERE user_id = ?');

  $userinfo = $requser->fetch();
?>


<div class="container">
  <button  id="hidd" class="nav-link" onclick="edit()">RECHERCHER</a>

  <input type="hidden" id="recherche" name="recherche">
  <input type="hidden" id="Button" name="Button">


</div>
</div>

<div id="hehe2">
  <span class="nav-item" id="buttremove">
  </div>

</body>
<script src="../js/search_user.js"></script>
</html>
<?php
