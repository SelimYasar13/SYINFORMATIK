function rechercher(){
rechercheInput = document.getElementById('recherche');
recherche = rechercheInput.value;

if(recherche.length>=2){


const request = new XMLHttpRequest();
 request.open('POST', '');
 request.onreadystatechange = function() {
   if(request.readyState === 4) {
     console.log('ok ça marche PAS');
   }
 };
 request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 const body = `search=${recherche}`;
 request.send(body);

}
else{
  alert('error');
}
}

$(document).ready(function(){
  $('#recherche').keyup(function(){
    var recherche = $(this).val();
    var data = 'motclef=' + recherche;
    if(recherche.length>1){
      $.ajax({
        type : 'GET',
        url : '../utilisateur/rechercheajax.php',
        data : data,
        success : function(server_response){
          $('#containercours').html(server_response).show();
        }
      });
  }
});
});
