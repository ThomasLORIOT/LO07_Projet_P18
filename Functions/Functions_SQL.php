<?php

define('USER', 'root');
define('PASSEWORD', '');
define('HOST', 'localhost');
define('BD_NAME', 'nounou');

// retourne la variable connecté à la BD nounou
function connectDB() {
    $myDB = mysqli_connect(HOST, USER, PASSEWORD, BD_NAME) or
            die('Impossible de se connecter à la MySql : ' + mysqli_connect_error());
    mysqli_set_charset($myDB, "utf8");
    return $myDB;
}

function requete($requete) {
    $myDB = connectDB();
    $res = mysqli_query($myDB, $requete);
    echo("requete : $requete<br>");

    if ($res) {
        echo('requête bien effectuée<br>');
    } else {
        echo("erreur : <br>");
        echo(mysqli_error($myDB));
    }
    mysqli_close($myDB);
    return $res;
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

