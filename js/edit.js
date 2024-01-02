
function edit(){
var pseudo = document.getElementById('pseudo');
var form = document.getElementById('divinfos');
var mail = document.getElementById('mail');
var nom = document.getElementById('nom');
var prenom = document.getElementById('prenom');
const newForm=document.createElement('form');
const newDivpseudo=document.createElement('div');
const newDivmail=document.createElement('div');
const newDivnom=document.createElement('div');
const newDivprenom=document.createElement('div');

form.appendChild(newForm);
newForm.setAttribute("action","edit_confirmm.php");
newForm.setAttribute("method","POST");
newForm.setAttribute("class","formzer");
newForm.setAttribute("id","formi");



var newInputpseudo=document.createElement('input');
var newInputmail=document.createElement('input');
var newInputnom=document.createElement('input');
var newInputprenom=document.createElement('input');
pseudo.parentNode.insertBefore(newInputpseudo,pseudo);
mail.parentNode.insertBefore(newInputmail,mail);
nom.parentNode.insertBefore(newInputnom,nom);
prenom.parentNode.insertBefore(newInputprenom,prenom);





newInputpseudo.setAttribute('name','pseudo');
newInputmail.setAttribute('name','mail');
newInputnom.setAttribute('name','last_name');
newInputprenom.setAttribute('name','first_name');

newForm.style.display = 'flex';
newForm.style.flexDirection = 'column';

newForm.style.justifyContent = 'space-between';


span = document.getElementsByClassName('flexinfos');

for(var i=0;i<4;i++)
{
form.removeChild(span[i]);
}


newForm.appendChild(newDivpseudo);
newDivpseudo.appendChild(newInputpseudo);
newForm.appendChild(newDivmail);
newDivmail.appendChild(newInputmail);
newForm.appendChild(newDivnom);
newDivnom.appendChild(newInputnom);
newForm.appendChild(newDivprenom);
newDivprenom.appendChild(newInputprenom);
pseudo.parentNode = document.createElement('div');
newInputpseudo.value=pseudo.innerHTML;
newInputmail.value=mail.innerHTML;
newInputnom.value=nom.innerHTML;
newInputprenom.value=prenom.innerHTML;






var idpseudo=pseudo.id;
var idmail=mail.id;
var idnom=nom.id;
var idprenom=prenom.id;

pseudo.parentNode.removeChild(pseudo);
mail.parentNode.removeChild(mail);
nom.parentNode.removeChild(nom);
prenom.parentNode.removeChild(prenom);

newInputpseudo.id=idpseudo;
newInputmail.id=idmail;
newInputnom.id=idnom;
newInputprenom.id=idprenom;



var pseudoval = newInputpseudo.parentNode.value;
var mailval = newInputmail.parentNode.innerHTML;
var nomval = newInputnom.parentNode.innerHTML;
var prenomval = newInputprenom.parentNode.innerHTML;

const butt = document.getElementById('buttjs');
butt.style.visibility = "hidden";

}


function save(){
const submit = document.getElementById('submit');
const form = document.getElementById('formi');
form.appendChild(submit);

}
