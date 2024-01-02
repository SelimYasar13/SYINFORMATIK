function deleteUser(id){

  const request = new XMLHttpRequest();
  request.open('DELETE', 'deleteaccount.php?id='+id);
  request.onreadystatechange = function() {
  if(request.readyState === 4) {
  const resultCode = parseInt(request.responseText);
  if(resultCode === 1){
  const resultCode = parseInt(request.responseText);
  }
  }
  };

  request.send();
  }
