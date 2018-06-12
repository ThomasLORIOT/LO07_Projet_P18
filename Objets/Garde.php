<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Garde
 *
 * @author Thomas
 */

require_once '../Functions/Functions_SQL.php';

class Garde {

    private $Nounous_idNounous;
    private $Horaires_idHoraires;
    private $Régulier; //bool
    private $DateDébut;
    private $DateFin;
    private $Langue; //bool
    private $nbr_enfants;
    private $Prix;
    private $Note;
    private $Appréciation;
    private $nbrHeure;

    function getNbrHeure() {
        return $this->nbrHeure;
    }

    function setNbrHeure($nbrHeure) {
        $this->nbrHeure = $nbrHeure;
    }

    function getNounous_idNounous() {
        return $this->Nounous_idNounous;
    }

    function getHoraires_idHoraires() {
        return $this->Horaires_idHoraires;
    }

    function getRégulier() {
        return $this->Régulier;
    }

    function getDateDébut() {
        return $this->DateDébut;
    }

    function getDateFin() {
        return $this->DateFin;
    }

    function getLangue() {
        return $this->Langue;
    }

    function getNbr_enfants() {
        if ($this->nbr_enfants == null){
            $this->setNbr_enfants();
        }
        return $this->nbr_enfants;
    }

    function getPrix() {
        return $this->Prix;
    }

    function getNote() {
        return $this->Note;
    }

    function getAppréciation() {
        return $this->Appréciation;
    }

    function setNounous_idNounous($Nounous_idNounous) {
        $this->Nounous_idNounous = $Nounous_idNounous;
    }

    function setHoraires_idHoraires($Horaires_idHoraires) {
        $this->Horaires_idHoraires = $Horaires_idHoraires;
    }

    function setRégulier($Régulier) {
        $this->Régulier = $Régulier;
    }

    function setDateDébut($DateDébut) {
        $this->DateDébut = $DateDébut;
    }

    function setDateFin($DateFin) {
        $this->DateFin = $DateFin;
    }

    function setLangue($Langue) {
        $this->Langue = $Langue;
    }

    private function setNbr_enfants() {
        $requete = "SELECT * FROM enfants_gard WHERE Garde_Nounous_idNounous=$this->Nounous_idNounous AND Garde_Horaires_idHoraires";
        $myDB = connectDB();
        $result = $myDB->query($requete);
        $this->nbr_enfants = $result->num_rows;
    }

    private function setPrix($Prix) {
        if ($Prix > 0) {
            $this->Prix = $Prix;
        }
    }

    function setNote($Note) {
        $this->Note = $Note;
    }

    function setAppréciation($Appréciation) {
        $this->Appréciation = $Appréciation;
    }
    
    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 7:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6]);
                break;
            case 2:
                self::__construct2($argv[0], $argv[1]);
                break;
        }
    }
    
    //pour pouvoir bien insérer la date dans DB, il faut ecrire comme un INT Année/Mois/jour tout attaché pas de slash : 19970324 (24 mars 1997)
    function __construct1($idNounous, $idHoraires, $Régulier, $DateD, $DateF, $Lanque, $Appréciation) { //peut être ajouter une vérification que ces id existent
        $this->Nounous_idNounous = $idNounous;
        $this->Horaires_idHoraires = $idHoraires;
        $this->Régulier = $Régulier;
        $this->DateDébut = $DateD;
        $this->DateFin = $DateF;
        $this->Langue = $Lanque;
        $this->Appréciation = $Appréciation;
        $this->setNbr_enfants();
    }
    
    function __construct2($idNounous, $idHoraire){
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM garde WHERE Horaires_idHoraires = '$idHoraire' AND Nounous_idNounous = '$idNounous'");
        if ($result->num_rows == 0) {
            echo "<script>console.log('connait pas cette garde');</script>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $this->setConstruct($row); //magouille pour pouvoir dépasser les 20 lignes autorisées pour un constructeur
        }
    }    
    
    //magouille pour pouvoir dépasser les 20 lignes autorisées pour un constructeur
    private function setConstruct($row){
        $this->Nounous_idNounous = $row['Nounous_idNounous'];
        $this->Horaires_idHoraires = $row['Horaires_idHoraires'];
        $this->Régulier = $row['Régulier'];
        $this->DateDébut = $row['Date Début'];
        $this->DateFin = $row['Date Fin'];
        $this->Langue = $row['Langue'];
        $this->nbr_enfants = $row['nbr_enfant'];
        $this->Prix = $row['Prix'];
        $this->Note = $row['Note'];
        $this->Appréciation = $row['Appreciation'];
    }

    private function calculPrix() {
        if (!$this->Régulier) {
            $prix = (7 * $this->nbrHeure) + (4 * $this->nbrHeure * ($this->nbr_enfants - 1));
        } else if ($this->Langue) {
            $prix = (15 * $this->nbrHeure * $this->nbr_enfants);
        } else if ($this->Régulier && !$this->Langue) {
            $prix = (10 * $this->nbrHeure) + (5 * $this->nbrHeure * ($this->nbr_enfants - 1));
        }
        $this->setPrix($prix);
    }
    
    function addDB(){
        $requete = "INSERT INTO garde(Nounous_idNounous, Horaires_idHoraires, Régulier, `Date Début`, `Date Fin`, Langue, Appreciation) VALUES ($this->Nounous_idNounous, $this->Horaires_idHoraires, $this->Régulier, $this->DateDébut, $this->DateFin, $this->Langue, '$this->Appréciation')";
        requete($requete);
    }
    
    //celle ci n'update pas les dates, à utilisé quand elles ne sont pas à update
    function updateDB(){
        $requete = "UPDATE garde SET Nounous_idNounous=$this->Nounous_idNounous, Horaires_idHoraires=$this->Horaires_idHoraires, Régulier=$this->Régulier, Langue=$this->Langue, Appreciation='$this->Appréciation' WHERE Horaires_idHoraires = $this->Horaires_idHoraires AND Nounous_idNounous=$this->Nounous_idNounous";
        requete($requete);
    }
    
    //celle ci update tout, utilisable uniquement si les dates Début et Fin ont changées 
    function updateDBDate(){
        $requete = "UPDATE garde SET Nounous_idNounous=$this->Nounous_idNounous, Horaires_idHoraires=$this->Horaires_idHoraires, Régulier=$this->Régulier, `Date Début`=$this->DateDébut, `Date Fin`=$this->DateFin, Langue=$this->Langue, Appreciation='$this->Appréciation' WHERE Horaires_idHoraires = $this->Horaires_idHoraires AND Nounous_idNounous=$this->Nounous_idNounous";
        requete($requete);
    }
    
    function __toString() {
        return "Garde(idNounou = $this->Nounous_idNounous ; idHoriare = $this->Horaires_idHoraires ; Régulier = $this->Régulier ; Date Début = $this->DateDébut; Date Fin = $this->DateFin ; Langue = $this->Langue ; Nombre d'enfants : $this->nbr_enfants ; Prix = $this->Prix ; Note = $this->Note ; Appréciation = $this->Appréciation)";
    }
}
