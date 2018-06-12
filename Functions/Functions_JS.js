function JS3(){
    //alert ("bonjour a tous les LO07");
    document.write("JS3");
}
function lien1_onmouseover(){
    alert ("Ne clique pas !!!!!!!!!!!!!!!!!!!!");
}
function lien1_onmouseup(){
    alert("INTERDICTION !!!!!!!!!!!!");
}
function nom_focus(){
    alert("STOOOOOP ");
}
function prenom_onchange(input){
    input.value = input.value.toUpperCase();    
}
function age_onchange(input){
    age=input.value;
    if (age <= 0 || 140 <= age ) {
        input.value="";
        alert("Pas le bonne age");
    }  
        
}
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
   var age = parseInt(champ.value);
   if(isNaN(age) || age < 5 || age > 111){
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}

function verifForm(f){
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