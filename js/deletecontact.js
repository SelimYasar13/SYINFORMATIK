function deleteContact(Id){
  const div = document.getElementById('divmess');
  const request = new XMLHttpRequest();
  request.open('DELETE', 'removecontact.php?id='+Id);
  request.onreadystatechange = function() {
  if(request.readyState === 4) {
    alert('Message supprimé avec succès')
  }
  };
  request.send();
  }
