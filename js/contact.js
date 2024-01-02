function send(){

  const title = document.getElementById('title').value;
  const content = document.getElementById('content').value;
  const div = document.getElementById('containermsg');
  const pzer = document.createElement('p');


  pzer.style.textAlign = ('center');
  pzer.innerHTML = "Message envoyé avec succès ! ";
  pzer.style.color = "#89c289";


 if(title.length == 0 || content.length == 0 ){
   alert('Vueillez rentrer des informations valides');
   return;
 }
 const request = new XMLHttpRequest();
  request.open('POST', 'sendcontact.php');
  request.onreadystatechange = function() {
    if(request.readyState === 4) {
      div.appendChild(pzer);
    }
  };
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  const body = `title=${title}&content=${content}`;
  request.send(body);



}
