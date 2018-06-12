<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Horaire
 *
 * @author Thomas
 */

require_once '../Functions/Functions_SQL.php';

class Horaires {
    private $idHoraires;
    private $Date;
    private $HeureDébut;
    private $HeureFin;
    
    function getIdHoraires() {
        return $this->idHoraires;
    }

    function getDate() {
        return $this->Date;
    }

    function getHeureDébut() {
        return $this->HeureDébut;
    }

    function getHeureFin() {
        return $this->HeureFin;
    }

    function setIdHoraires($idHoraires) {
        $this->idHoraires = $idHoraires;
    }

    function setDate($Date) {
        $this->Date = $Date;
    }

    function setHeureDébut($HeureDébut) {
        $this->HeureDébut = $HeureDébut;
    }

    function setHeureFin($HeureFin) {
        $this->HeureFin = $HeureFin;
    }

    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 3:
                self::__construct1($argv[0], $argv[1], $argv[2]);
                break;
            case 1:
                self::__construct2($argv[0]);
                break;
        }
    }
    
    //pour pouvoir bien insérer la date dans DB, il faut ecrire comme un INT Année/Mois/jour tout attaché pas de slash : 19970324 (24 mars 1997)
    //                          une heure                                    Heure/min/sec                             : 163000 (16h30min0sec)                      
    function __construct1($Date, $HeureD, $HeureF) {
        $this->Date = $Date;
        $this->HeureDébut = $HeureD;
        $this->HeureFin = $HeureF;
    }
    
    function __construct2($idHoraire){
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM horaires WHERE idHoraires = '$idHoraire'");
        if ($result->num_rows == 0) {
            echo "<script>console.log('connait pas cet horaire');</script>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $this->idHoraires = $idHoraire;
            $this->Date = $row['Date'];
            $this->HeureDébut = $row['Heure Début'];
            $this->HeureFin = $row['Heure Fin'];
        }
    }
        
    function __toString() {
        return "Horaire($this->idHoraires;$this->Date;$this->HeureDébut;$this->HeureFin)";
    }
    
    function addDB(){
        $requete = "INSERT INTO horaires(Date, `Heure Début`, `Heure Fin`) VALUES ($this->Date, '$this->HeureDébut', '$this->HeureFin')";
        requete($requete);
    }
    
    function updateDB(){
        $requete = "UPDATE horaires SET Date='$this->Date', `Heure Début`='$this->HeureDébut', `Heure Fin`='$this->HeureFin' WHERE idHoraires = $this->idHoraires";
        requete($requete);
    }
}