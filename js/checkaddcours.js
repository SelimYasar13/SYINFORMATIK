function checkAdd(){
  const sujet = document.getElementById('sujet').value;
  const matiere = document.getElementById('matiere').value;
  const difficulte = document.getElementById('difficulte').value;
  const temps = document.getElementById('temps').value;
  const fichier = document.getElementById('fichier').value;
  const image = document.getElementById('image').value;

if (sujet.length == 0 || matiere.length == 0 || difficulte.length == 0 || temps == 0 || fichier == 0 || image == 0){
  alert('Vueillez remplir tous les champs, et ajouter un PDF, une image');

}
;
}

function checkAddArticle(){
  const subject = document.getElementById('subject').value;
  const title = document.getElementById('title').value;
  const content = document.getElementById('content').value;
  const autor = document.getElementById('autor').value;
  const image = document.getElementById('image').value;

  if (subject.length == 0 || title.length == 0 || content.length == 0 || autor.length == 0 || image == 0){
    alert('Vueillez remplir tous les champs, et ajouter une image');

  }
}

function checkAddCaptcha (){
  const imagename = document.getElementById('name').value;
  const image = document.getElementById('image').value;
  if (imagename.length == 0 || image == 0){
    alert('Vueillez renseigner un nom, et ajouter une image');

  }
}
