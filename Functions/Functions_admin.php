<?php

require_once 'Functions_SQL.php';
require_once '../Objets/Nounou.php';
require_once '../Objets/Langue.php';
require_once '../Objets/Garde.php';

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
    $nounou = new Nounou($idNounou);
    $nounou->setVisible(1);
    $nounou->updateDB();
}

//drop une liste de nounous de la DB
function supprimeNounous($idNounou) {
    $nounou = new Nounou($idNounou);
    $nounou->dropDB();
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
    $langue = new Langue($idLangue);
    $langue->setVisible(1);
    $langue->updateDB();
}

//supprime une langue
function supprimeLangue($idLangue) {
    $langue = new Langue($idLangue);
    $langue->dropDB();
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


