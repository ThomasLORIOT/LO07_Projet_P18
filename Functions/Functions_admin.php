<?php

require_once 'Functions_SQL.php';

//require_once '../Objets/Nounou.php';
//require_once '../Objets/Langue.php';
//require_once '../Objets/Garde.php';
//retourne nombre de nounous inscrites et validées
function nombreNounousInscrite() {
    $myDB = connectDB();
    $requete = "SELECT idNounous FROM nounous WHERE Visible = 1";
    $result = $myDB->query($requete);
    return $result->num_rows;
}

//retourne nombre de candidature de nounous à valider et de nounous invisibles
function nombreCandidatureNounous() {
    $myDB = connectDB();
    $requete = "SELECT idNounous FROM nounous WHERE Visible = 0";
    $result = $myDB->query($requete);
    return $result->num_rows;
}

function afficherCandidature() {
    $requete = "SELECT * FROM nounous WHERE Visible = 0";
    $myDB = connectPDO();
    $result = $myDB->query($requete);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo("<pre>");
        print_r($row);
        echo("</pre>");
    }
}

//accepte candidature d'une nounou
function accepterCandidature($idNounou) {
    $requete = "UPDATE nounous SET Visible=1 WHERE idNounous = '$idNounou'";
    requete($requete);
}

//gère vision d'une nounou
function gérerVisibilitéNounou($idNounou, $visible) {
    $requete = "UPDATE nounous SET Visible=$visible WHERE idNounous = '$idNounou'";
    requete($requete);
}

//drop la nounou de la DB
function supprimeNounous($idNounou) {
    $requete1 = "DELETE FROM parle WHERE idNounous=$idNounou";
    $requete2 = "DELETE FROM enfants_gardé WHERE idNounous=$idNounou";
    $requete3 = "DELETE FROM garde WHERE idNounous=$idNounou";
    $requete4 = "DELETE FROM nounous WHERE idNounous=$idNounou";
    requete($requete1);
    requete($requete2);
    requete($requete3);
    requete($requete4);
}

//retourne les id des langues proposés
function afficherPropositionLangue() {
    $requete = "SELECT * FROM langues WHERE Visible = 0";
    $myDB = connectPDO();
    $result = $myDB->query($requete);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo("<pre>");
        print_r($row);
        echo("</pre>");
    }
}

//accepte une langue proposée
function accepteLangue($idLangue) {
    $requete = "UPDATE langues SET Visible=1 WHERE idLangue = '$idLangue'";
    requete($requete);
}

//supprime une langue
function supprimeLangue($idLangue) {
    $requete = "DELETE FROM langues WHERE idLangue=$idLangue";
    requete($requete);
}

//affiche toutes les nounous de la DB
function listeNounous() {
    $requete = "SELECT * FROM nounous";
    $myDB = connectPDO();
    $result = $myDB->query($requete);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo("<pre>");
        print_r($row);
        echo("</pre>");
    }
}

//return dossier complet d'une nounou
function dossierNounou($idNounou) {
    $dossier = Array("listeGarde" => listeGardeNounou($idNounou));
}

function listeGardeNounou($idNounou) {
    $requete = "SELECT idHoraires FROM garde WHERE idNounous = $idNounou";
    $myDB = connectDB();
    $result = $myDB->query($requete);
    $row = mysqli_fetch_row($result);
    $listeGarde = Array();
    foreach ($row as $value) {
        $listeGarde[] = new Garde($idNounou, $value);
    }
    return $listeGarde;
}

function revenuTotalNounou($idNounou) {
    $requete = "SELECT SUM(Prix) FROM garde WHERE idNounous = $idNounou AND Prix != NULL";
    $myDB = connectDB();
    $result = $myDB->query($requete);
    $row = mysqli_fetch_row($result);
    return $row[0];
}