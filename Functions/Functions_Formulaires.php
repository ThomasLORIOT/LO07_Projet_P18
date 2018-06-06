<?php




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


