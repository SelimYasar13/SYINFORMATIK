function checkEmail(e) {
  const index1 = e.indexOf('@');
  const index2 = e.indexOf('.');
  return index1 !== -1 && index2 !== -1;
}

function checkPassword(pwd) {
  if(pwd.length < 6) {
    alert('Mot de passe trop court');
    return false;
  }
  return true;
}

function changemail(){
  const div = document.getElementById('divinfos');
  const firstname_input = document.getElementById('actor_firstname');
  const oldmail = document.getElementById('mail').innerHTML;
  const newmailinput = document.getElementById('newmail');
  const newmail = newmailinput.value;
  const emailSuccess = checkEmail(newmail);


 if(emailSuccess){
   const request = new XMLHttpRequest();
    request.open('POST', 'newmail.php');
    request.onreadystatechange = function() {
      if(request.readyState === 4) {
        console.log('ok');
      }
    };
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    const body = `mail=${newmail}`;
    request.send(body);
    const successmsg = document.createElement('p');

    successmsg.innerHTML = 'Mail modifié avec succès';
    successmsg.style.color='white';
    div.appendChild(successmsg);
   }
 else{
   alert('Format email invalide.')
 }
}

/*function changepassword(){
  const oldmdp = document.getElementById('oldmdp').value;
  const oldmdpcrypted = md5(oldmdp);

  const nmdp = document.getElementById('nmdp').value;
  const vmdp = document.getElementById('vmdp').value;

  if checkPassword(nmdp){
  if (nmdp == vmdp){
  const request = new XMLHttpRequest();
   request.open('POST', '../php/newpassword.php');
   request.onreadystatechange = function() {
     if(request.readyState === 4) {
       console.log('ok ça marche PAS chez Célian');
     }
   };
   request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   const body = `mail=${newmail}`;
   request.send(body);
  }
  }


}
*/
