<?php


//DEBUT FORMULAIRE
function debutForm($method, $action,$text=""){
	echo "<form action = '$action' method = '$method' enctype = 'multipart/form-data' $text>";
}
//FIN FORMULAIRE
function finForm(){
	echo"</form>";
}


//$nom est le label et le nom de la variable, $tab est la liste des options.
function formSelect($nom, $tab) {
        echo("<label>$nom : </label>");
        echo("<select name='$nom'>");
        foreach ($tab as $value) {
            echo("<option>$value</option>");
        }
        echo("</select>");
        echo("<br/>\n");
    }
    
//$nom est le label et le nom de la variable, $type est le type d'input souhaité.

function formInput($label, $type, $key, $text=''){
    echo("<label for='$label'>$label</label>");
    echo("<input id='$key' type='$type' name='$key' $text/><br/>\n");
}

//rajoute direcement les bouton submit et reset
function formAddSubmitReset(){
    echo("<input id='valider' type='submit' value='Valider'/>\n");
    echo("<input id='effacer' type='reset' value='Effacer'/>\n");
}

function textArea($label,$textDefault,$rows,$cols,$text){
    echo("<label for=$label>$label</label><br/>\n");
    echo("<textarea name=$label id=$label  rows=$rows cols=$cols onclick='this.focus();this.select()' $text>$textDefault</textarea><br/>\n");
}

//1 radio boutton
function Radio($group, $value){
	echo"  <input type = 'radio' name = '$group' value = '$value' checked='checked' />";
}

//textinputDataList
function TextInputDatalist($type,$name,$list){
	echo"<input type = '$type' name = '$name' id='$name' list='$list'  />";
}

//hidden
function Hidden($name,$value){
	echo "<input type= 'hidden' name='$name' value='$value'>";
}
//checkbox
function CheckBox($name,$value){
	echo"<input type = 'checkbox' name = '$name' value = '$value' />";
}
//FileSelect
function FileSelect($name,$value,$width){
	echo "<input type = 'file' name ='$name'  value ='$value' width='$width' />";
}

function Submit($value){
	echo"<input type = 'submit' value = '$value' />";
}

function Saut(){
    echo"<br/>";
}
?>