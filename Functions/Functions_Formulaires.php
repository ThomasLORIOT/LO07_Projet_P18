<?php


//DEBUT FORMULAIRE
function DebutForm($method, $action,$text=""){
	echo "<form action = '$action' method = '$method' enctype = 'multipart/form-data' $text>";
}
//FIN FORMULAIRE
function FinForm(){
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
function formInput($nom, $type){
    echo("<label for='$nom'>$nom : </label>");
    echo("<input type='$type' name='$nom' id='$nom'/><br/>\n");
}

//rajoute direcement les bouton submit et reset
function formAddSubmitReset(){
    echo("<input type='submit' value='Submit'/>\n");
    echo("<input type='reset' value='Reset'/>\n");
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