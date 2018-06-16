function jsValidation(){
    $('#validation').show();
    $('#valider').hide();
    $('#validation').delay(5000).fadeOut(1000);
    $('#valider').delay(5000).fadeIn(1000);
}

function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

function verif(champ){
   if(champ.value.length < 2 || champ.value.length > 25){
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}
function verifMail(champ){
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))   {
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}
function verifAge(champ){
   var valeur=true;
   var age = parseInt(champ.value);
   if(isNaN(age) || age < 5 || age > 111){
      surligne(champ, true);
      valeur = false;
   }
   else{
      surligne(champ, false);
   }
   return valeur;
}
function verifTel(champ){
   var tel = parseInt(champ.value);
   if(isNaN(tel) || champ.value.length !=10){
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}
function verifTextArea(champ,taille){
   if(champ.value.length < taille){
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}





function verifFormInscription(f){
   var nomOk = verif(f.nom);
   var mailOk = verifMail(f.email);
   var mdpOk = verif(f.mdp);
   if(nomOk && mailOk && mdpOk)
      return true;
   else {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}
function verifFormConnexion(f){
   var mailOk = verifMail(f.email);
   var mdpOk = verif(f.mdp);
   if( mailOk && mdpOk)
      return true;
   else {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}
function verifFormNounou(f){
   var prenomOk = verif(f.prenom);
   var ageOk = verifAge(f.age);
   var telOk = verifTel(f.telephone);
   var preOk = verifTextArea(f.presentation,30);
   var expOk = verifTextArea (f.experience,30);
   if( prenomOk && ageOk && telOk && preOk && expOk )
      return true;
   else {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}
function verifFormParents(f){
   var villeOk = verif(f.ville);
   if(villeOk){
      return true;
   }
   alert("Veuillez remplir correctement tous les champs");
   return false;
}

function addInput(name,div){
    var input = document.createElement("input");
    input.name = name;
    div.appendChild(input);
}
function addField(doc) {
    div=doc.getElementById('champs');
    addInput("titre[]");
    div.appendChild(document.createElement("br"));
}