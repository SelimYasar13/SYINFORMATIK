


/**
 * Fonction de récupération des paramètres GET de la page
 * @return Array Tableau associatif contenant les paramètres GET
 */

function extractUrlParams(){
	var t = location.search.substring(1).split('&');
	var f = [];
	for (var i=0; i<t.length; i++){
		var x = t[ i ].split('=');
		f[x[0]]=x[1];
	}
	return f;
}

function Com(){
const course_id =  extractUrlParams()['id'];
 const comment_input = document.getElementById('comments');
 const comment = comment_input.value;


if(comment.length == 0){
  alert('Commentaire vide !');

  return;
}
const request = new XMLHttpRequest();
 request.open('POST', 'create.php');
 request.onreadystatechange = function() {
   if(request.readyState === 4) {
     console.log('ok ça marche PAS chez Célian');
   }
 };
 request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 const body = `content=${comment}&course_id=${course_id}`;
 const divcom = document.getElementById('commzer');
 const divsuccess= document.createElement('div');
divsuccess.setAttribute('class','container');
 const success= document.createElement('p');
 success.innerHTML = 'Commentaire envoyé avec succès';
 success.style.alignSelf='flex-end';
 success.style.paddingLeft='60';


 divcom.appendChild(divsuccess);
 divsuccess.appendChild(success);
 divsuccess.style.alignSelf='flex-end';
 divsuccess.style.justifySelf='flex-start';



 request.send(body);
}


function CommentArticle(){
const article_id =  extractUrlParams()['id'];
 const comment_input = document.getElementById('comments');
 const comment = comment_input.value;


if(comment.length == 0){
  alert('Commentaire vide !');

  return;
}
const request = new XMLHttpRequest();
 request.open('POST', 'createarticle.php');
 request.onreadystatechange = function() {
   if(request.readyState === 4) {
     console.log('ok ça marche PAS chez Célian');
   }
 };
 request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 const body = `content=${comment}&article_id=${article_id}`;

 const divcom = document.getElementById('commentaires');
 const success= document.createElement('p');
 success.innerHTML = 'Commentaire envoyé avec succès'
 divcom.appendChild(success);
 console.log(body);
 request.send(body);

}



function qcmVis(){
	form = document.getElementById('hiddenform');
	form.style.visibility = 'visible';
}
