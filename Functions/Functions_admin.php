<?php

require_once 'Functions_SQL';
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

//retourne liste des nounous qui attendent d'être validées et celles invisibles
function listeCandidature() {
    $requete = "SELECT idNounous FROM nounous";
    $myDB = connectDB();
    $result = $myDB->query($requete);
    $row = mysqli_fetch_row($result);

    $ListeNounous = Array();
    foreach ($row as $value) {
        $ListeNounous[] = new Nounou($value);
    }
    mysqli_close($myDB);
    return $ListeNounous;
}

//accepte candidature d'une liste de nounou
function accepterCandidature($listeIdNounous){
    $listeNounous = Array();
    foreach ($listeIdNounous as $value) {
        $listeNounous = new Nounou($value);
    }
    foreach ($listeNounous as $value) {
        $value->setVisible(1);
        $value->updateDB();
    }
}

//drop une liste de nounous de la DB
function supprimeNounous($listeIdNounous){
    $listeNounous = Array();
    foreach ($listeIdNounous as $value) {
        $listeNounous = new Nounou($value);
    }
    foreach ($listeNounous as $value) {
        $value->dropDB();
    }
}

//retourne les propositions de langues
function propositionLangue(){
    $requete = "SELECT idLangue FROM langues WHERE Visible = 0";
    $myDB = connectDB();
    $result = $myDB->query($requete);
    $row = mysqli_fetch_row($result);

    $ListeNounous = Array();
    foreach ($row as $value) {
        $ListeNounous[] = new Nounou($value);
    }
    mysqli_close($myDB);
    return $ListeNounous;
}

//accepte une liste de langues proposées
function accepteLangue($listeidLangue){
    $listeLangue = Array();
    foreach ($listeidLangue as $value) {
        $listeLangue = new Langue($value);
    }
    foreach ($listeLangue as $value) {
        $value->setVisible(1);
        $value->updateDB();
    }
}

//supprime liste langues
function supprimeLangue($listeidLangue){
    $listeLangue = Array();
    foreach ($listeidLangue as $value) {
        $listeLangue = new Langue($value);
    }
    foreach ($listeLangue as $value) {
        $value->dropDB();
    }
}

//retourne toutes les nounous de la DB
function listeNounous(){
    $requete = "SELECT idNounous FROM nounous WHERE Visible = 0";
    $myDB = connectDB();
    $result = $myDB->query($requete);
    $row = mysqli_fetch_row($result);

    $ListeNounous = Array();
    foreach ($row as $value) {
        $ListeNounous[] = new Nounou($value);
    }
    mysqli_close($myDB);
    return $ListeNounous;
}


//return dossier complet d'une nounou
function dossierNounou($idNounou){
    $dossier = Array("listeGarde" => listeGardeNounou($idNounou));
    
}

function listeGardeNounou($idNounou){
    $requete = "SELECT idHoraires FROM garde WHERE idNounous = $idNounou";
    $myDB = connectDB();
    $result = $myDB->query($requete);
    $row = mysqli_fetch_row($result);
    $listeGarde = Array();
    foreach ($row as $value){
        $listeGarde[] = new Garde($idNounou, $value);
    }
    return $listeGarde;
}
