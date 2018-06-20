<?php

//Quelques fonctions PHP
//Affiche un message de 5 secondes si le declecheur est présent en GET et égale à 1
function message5Secondes($message, $declencheur) {
    if (isset($_GET[$declencheur])) {
        if ($_GET[$declencheur] == 1) {
            echo("
                    <div id='validation' class='alert alert-success' role='alert' style='display:none;'>
                        <p>$message</p>
                    </div>       
                ");
            echo('<script language="Javascript" type="text/Javascript">
                        jsValidation();
                    </script>');
        }
    }
}

//Affiche un tableau les clés sont les noms des colonnes et les values sont en dessous 
//tab est de la forme 
//Array
//(
//    [0] => Array
//        (
//            [NomCol1] => Ligne1 valeur Col1
//            [NomCol2] => Ligne1 valeur Col2
//        )
//    [1] => Array
//        (
//            [NomCol1] => Ligne2 valeur Col1
//            [NomCol2] => Ligne2 valeur Col2
//        )
//)


function affiche($tab) {
    if (!empty($tab)) {
        echo("<div class='table-responsive'>");
        echo("<table class='table'>\n");
        echo("<thead class='thead-light'> <tr>\n");
        foreach ($tab[0] as $key => $value) {
            echo("<th scope='col'> $key </th>\n");
        }
        echo("</tr> </thead>\n");
        echo("<tbody>\n");
        foreach ($tab as $value) {
            echo("<tr>\n");
            foreach ($value as $v) {
                echo("<td>$v</td>\n");
            }
            echo("</tr>\n");
        }
        echo("</tbody>\n");
        echo("</table>\n");
        echo("</div>");
    } else {
        echo("Vous n'avez encore rien précisé.<br>\n");
    }

//    foreach($tab as $key){
}

function head($titre, $head) {
    echo("
      <html>
        <head>
        <title>$titre</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='../include/bootstrap/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='../include/bootstrap/js/bootstrap.min.js'></script>
        $head
        </head>
  ");
}

function miseEnPageDébut() {
    echo("
            <body>
                <div class='container'>
                    <h1 class='text-center'>Bienvenue !</h1>
                    <div class='row'>
                        <div class='col-sm-4'>
                        </div>
                        <div class='col-sm-4'>


    ");
}

function miseEnPageFin() {
    echo("
                            </div>
                    </div>
                </div>
            </body>
         </html>
    ");
}
