function edit(){



var form = document.getElementById('hehe2');
var recherche = document.getElementById('recherche');
var Button = document.getElementById('Button');
var buttzer = document.getElementById('hidd');


const newForm=document.createElement('form');
const newDivrecherche=document.createElement('div');
const newDivButton=document.createElement('div');



newForm.setAttribute("action","results_search.php");
newForm.setAttribute("method","POST");
newForm.setAttribute("class","formzer");
newForm.setAttribute("id","formi");
newForm.setAttribute("name","search");


newForm.appendChild(recherche);
newForm.appendChild(Button);

form.appendChild(newForm);




var idrecherche=recherche.id;
var idButton=Button.id;





recherche.setAttribute("type","text");
Button.setAttribute("type","submit");

var rechercheval = recherche.innerHTML;
var Buttonval = recherche.innerHTML;





}
