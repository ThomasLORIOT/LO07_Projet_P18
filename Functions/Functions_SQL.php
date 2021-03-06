<?php

define('USER', 'root');
define('PASSEWORD', '');
define('HOST', 'localhost');
define('BD_NAME', 'nounou');

//retourne objet PDO connecté à la base nounou
function connectPDO(){
    $user = 'root';
    $password = '';
    $dataSourceName = 'mysql:host=localhost;dbname=nounou;charset=utf8';
    $res = new PDO($dataSourceName, $user, $password);
    return $res;
}

// retourne la variable connecté à la BD nounou
function connectDB() {
    $myDB = mysqli_connect(HOST, USER, PASSEWORD, BD_NAME) or
            die('Impossible de se connecter à la MySql : ' + mysqli_connect_error());
    mysqli_set_charset($myDB, 'utf8');
    return $myDB;
}

function requete($requete) {
    $myDB = connectDB();
    $res = mysqli_query($myDB, $requete);
    echo "<script>console.log('requete : $requete');</script>\n";

    if ($res) {
        echo "<script>console.log('requête bien effectuée');</script>\n";
    } else {
        $erreur = mysqli_error($myDB);
        echo "<script>console.log('erreur : $erreur');</script>\n";
    }
    mysqli_close($myDB);
    return $res;
}

function fetchRowRequete($requete) {
    $myDB = connectDB();
    $result = $myDB->query($requete);
    if ($result) {
        echo "<script>console.log('requête bien effectuée');</script><br>\n";
    } else {
        $erreur = mysqli_error($myDB);
        echo "<script>console.log('erreur : $erreur');</script><br>\n";
    }
    $row = mysqli_fetch_row($result);
    return $row;
}

function fetchAllRequete($requete){
    $myDB = connectDB();
    $result = $myDB->query($requete);
    if ($result) {
        echo "<script>console.log('requête bien effectuée');</script><br>\n";
    } else {
        $erreur = mysqli_error($myDB);
        echo "<script>console.log('erreur : $erreur');</script><br>\n";
    }
    $row = mysqli_fetch_all($result);
    return $row;
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
