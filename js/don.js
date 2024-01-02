function addDon(){

   const sum = document.getElementById('sum').value;
   const msgdon = document.getElementById('msgdon').value;





  if(sum == 0){
    alert('Vueillez donner au moins 1 euro ');
    return;
  }
  const request = new XMLHttpRequest();
   request.open('POST', 'createdon.php');
   request.onreadystatechange = function() {
     if(request.readyState === 4) {



     }
   };
   request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   const body = `donation_message=${msgdon}&given_sum=${sum}`;
   request.send(body);

}
