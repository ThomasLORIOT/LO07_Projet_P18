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

    private $idNounous;
    private $idHoraires;
    private $Régulier; //bool
    private $DateDébut;
    private $DateFin;
    private $Langue; //bool
    private $nbr_enfants_max;
    private $Prix;
    private $Note;
    private $Appréciation;

    function getNbrHeure() {
        return $this->nbrHeure;
    }

    function setNbrHeure($nbrHeure) {
        $this->nbrHeure = $nbrHeure;
    }

    function getidNounous() {
        return $this->Nounous_idNounous;
    }

    function getidHoraires() {
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

    function getNbr_enfants_max() {
        if ($this->nbr_enfants == null) {
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

    function setidNounous($Nounous_idNounous) {
        $this->Nounous_idNounous = $Nounous_idNounous;
    }

    function setidHoraires($Horaires_idHoraires) {
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

    private function getNbr_enfants() {
        $requete = "SELECT * FROM enfants_gard WHERE idNounous=$this->idNounous AND idHoraires=$this->idHoraires";
        $myDB = connectDB();
        $result = $myDB->query($requete);
        return $result->num_rows;
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
            case 5:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
            case 2:
                self::__construct2($argv[0], $argv[1]);
                break;
            case 4:
                self::__construct3($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
        }
    }

    //pour pouvoir bien insérer la date dans DB, il faut ecrire comme un INT Année/Mois/jour tout attaché pas de slash : 19970324 (24 mars 1997)
    function __construct1($idNounous, $idHoraires, $DateD, $DateF, $nbr_enfants_max) { //peut être ajouter une vérification que ces id existent
        $this->idNounous = $idNounous;
        $this->idHoraires = $idHoraires;
        $this->Régulier = 1;
        $this->DateDébut = $DateD;
        $this->DateFin = $DateF;
        $this->Langue = 0;
        $this->nbr_enfants_max = $nbr_enfants_max;
        //$this->calculPrix();
    }

    function __construct2($idNounous, $idHoraire) {
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM garde WHERE idHoraires = '$idHoraire' AND idNounous = '$idNounous'");
        if ($result->num_rows == 0) {
            echo "<script>console.log('connait pas cette garde');</script>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $this->idNounous = $row['idNounous'];
            $this->idHoraires = $row['idHoraires'];
            $this->Régulier = $row['Régulier'];
            $this->DateDébut = $row['Date Début'];
            $this->DateFin = $row['Date Fin'];
            $this->Langue = $row['Langue'];
            $this->nbr_enfants_max = $row['nbr_enfant_max'];
            $this->Prix = $row['Prix'];
            $this->Note = $row['Note'];
            $this->Appréciation = $row['Appreciation'];
        }
    }

    function __construct3($idNounous, $idHoraires, $Langue, $nbr_enfants_max) {
        $this->idNounous = $idNounous;
        $this->idHoraires = $idHoraires;
        $this->Régulier = 0;
        $this->Langue = $Langue;
        $this->nbr_enfants_max = $nbr_enfants_max;
        //$this->calculPrix();
    }

    private function calculPrix() {
        $nbr_enfants = $this->getNbr_enfants();
        $nbrHeure = "SELECT TIMEDIFF(horaires.`Heure Fin`, horaires.`Heure Début`) FROM horaires WHERE idHoraires = 2";
        if (!$this->Régulier) {
            $prix = (7 * $this->nbrHeure) + (4 * $this->nbrHeure * ($nbr_enfants - 1));
        } else if ($this->Langue) {
            $prix = (15 * $this->nbrHeure * $nbr_enfants);
        } else if ($this->Régulier && !$this->Langue) {
            $prix = (10 * $this->nbrHeure) + (5 * $this->nbrHeure * ($nbr_enfants - 1));
        }
        $this->setPrix($prix);
    }

    function addDB() {
        $myDB = connectDB();
        //est-ce que ce horaire est nouveau ?
        $result = $myDB->query("SELECT idNounous, idHoraires FROM garde WHERE idNounous = $this->idNounous AND idHoraires = $this->idHoraires");
        if ($result->num_rows == 0) {
            //la garde est nouvelle : On INSERT la garde
            $requete = "INSERT INTO garde(idNounous, idHoraires, Régulier, Langue, nbr_enfant_max) VALUES ($this->idNounous, $this->idHoraires, $this->Régulier, $this->Langue, $this->nbr_enfants_max)";
            requete($requete);
        } else {
            echo "<script>console.log('garde existe déjà');</script><br>\n";
        }
    }

    //celle ci n'update pas les dates, à utilisé quand elles ne sont pas à update
    function updateDB() {
        $requete = "UPDATE garde SET idNounous=$this->idNounous, idHoraires=$this->idHoraires, Régulier=$this->Régulier, Langue=$this->Langue, Appreciation='$this->Appréciation' WHERE idHoraires = $this->idHoraires AND idNounous=$this->idNounous";
        requete($requete);
    }

    //celle ci update tout, utilisable uniquement si les dates Début et Fin ont changées 
    function updateDBDate() {
        $requete = "UPDATE garde SET idNounous=$this->idNounous, idHoraires=$this->idHoraires, Régulier=$this->Régulier, `Date Début`=$this->DateDébut, `Date Fin`=$this->DateFin, Langue=$this->Langue, Appreciation='$this->Appréciation' WHERE idHoraires = $this->idHoraires AND idNounous=$this->idNounous";
        requete($requete);
    }

    function __toString() {
        return "Garde(idNounou = $this->idNounous ; idHoriare = $this->idHoraires ; Régulier = $this->Régulier ; Date Début = $this->DateDébut; Date Fin = $this->DateFin ; Langue = $this->Langue ; Nombre d'enfants maximum  : $this->nbr_enfants_max ; Prix = $this->Prix ; Note = $this->Note ; Appréciation = $this->Appréciation)<br>\n";
    }

}

$test = new Garde(4, 2, 1, 5);
echo($test);
$test->addDB();
