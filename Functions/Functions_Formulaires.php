<?php

//créer un formulaire de Checkbox à partir d'un fetch_all_assoc
function formAssoc($method,$action,$assoc,$choix){
    echo('<pre>');
    $row = $assoc->fetch(PDO::FETCH_ASSOC);
    foreach ($row as $key=>$value){
         echo($key."<br>");
    }
    print_r($row);    
    
    while($row = $assoc->fetch(PDO::FETCH_ASSOC)){
        print_r($row);
    }
    
    debutForm($method, $action);
    formAddSubmitReset();
    finForm();
}

//DEBUT FORMULAIRE
function debutForm($method, $action,$text=""){
	echo "<form action = '$action' method = '$method' enctype = 'multipart/form-data' $text>";
}
//FIN FORMULAIRE
function finForm(){
	echo"</form><br>";
}


//$nom est le label et le nom de la variable, $tab est la liste des options.
function formSelect($id,$label, $tab, $text='') {
        echo("<label for=$id class='control-label'>$label</label>\n");
        echo("<select class='form-control' name=$id id=$id $text>\n");
        foreach ($tab as $value) {
            echo("<option value='$value'>$value</option>\n");
        }
        echo("</select>");
    }
    
//$nom est le label et le nom de la variable, $type est le type d'input souhaité.

function formInput($label, $type, $id, $text=''){
    echo("<label for='$id' class='control-label'>$label</label>\n");
    echo("<input id='$id' type='$type' class='form-control'  name='$id' $text/>\n");
}

//rajoute direcement les bouton submit et reset
function formAddSubmitReset(){
    echo("<br><button id='valider' class='btn btn-default' type='submit'>Valider</button>\n");
    echo("<button id='effacer' class='btn btn-default' type='reset'>Effacer</button>\n");
}

function textArea($id,$textDefault,$rows,$cols,$text){
    echo("<label for='$id' class='control-label'></label>\n");
    echo("<textarea class='form-control' name=$id id=$id  rows=$rows cols=$cols onfocus='this.select()' $text>$textDefault</textarea>\n");
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