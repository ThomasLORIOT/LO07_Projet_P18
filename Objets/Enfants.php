<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Enfants
 *
 * @author Thomas
 */

require_once '../Functions/Functions_SQL.php';
require_once 'debug.php';

class Enfants {
    private $idEnfants;
    private $Prénom;
    private $DateDeNaissance;
    private $RestrictionsAlimentaires;
    private $Parents_IdParents;
    
    function getIdEnfants() {
        return $this->idEnfants;
    }

    function getPrénom() {
        return $this->Prénom;
    }

    function getDateDeNaissance() {
        return $this->DateDeNaissance;
    }

    function getRestrictionsAlimentaires() {
        return $this->RestrictionsAlimentaires;
    }

    function getParents_IdParents() {
        return $this->Parents_IdParents;
    }

    function setIdEnfants($idEnfants) {
        $this->idEnfants = $idEnfants;
    }

    function setPrénom($Prénom) {
        $this->Prénom = $Prénom;
    }

    function setDateDeNaissance($DateDeNaissance) {
        $this->DateDeNaissance = $DateDeNaissance;
    }

    function setRestrictionsAlimentaires($RestrictionsAlimentaires) {
        $this->RestrictionsAlimentaires = $RestrictionsAlimentaires;
    }

    function setParents_IdParents($Parents_IdParents) {
        $this->Parents_IdParents = $Parents_IdParents;
    }
    
    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 4:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
            case 1:
                self::__construct2($argv[0]);
                break;
        }
    }
    
    //pour pouvoir bien insérer la date dans DB, il faut ecrire comme un nombre Année/Mois/jour tout attaché pas de slash : 19970324
    function __construct1($Prénom, $DateDeNaissance, $Restrictions, $idParents) {
        $this->Prénom = $Prénom;
        $this->DateDeNaissance = $DateDeNaissance;
        $this->RestrictionsAlimentaires = $Restrictions;
        $this->Parents_IdParents = $idParents;
    }
    
    function __construct2($idEnfant){
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM enfants WHERE idEnfants = '$idEnfant'");
        if ($result->num_rows == 0) {
            echo "<script>console.log('connait pas cet enfant');</script>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $this->idEnfants = $idEnfant;
            $this->Prénom = $row['Prénom'];
            $this->DateDeNaissance = $row['Date De Naissance'];
            $this->RestrictionsAlimentaires = $row['Restrictions Alimentaires'];
            $this->Parents_IdParents = $row['Parents_idParents'];
        }
    }
    
    function __toString() {
        return "Enfant($this->idEnfants;$this->Prénom;$this->DateDeNaissance;$this->RestrictionsAlimentaires;$this->Parents_IdParents)";
    }
    
    function addDB(){
        $requete = "INSERT INTO enfants(Prénom, `Date De Naissance`, `Restrictions Alimentaires`, Parents_idParents) VALUES ('$this->Prénom', '$this->DateDeNaissance', '$this->RestrictionsAlimentaires', $this->Parents_IdParents)";
        requete($requete);
    }
    
    function updateDB(){
        $requete = "UPDATE enfants SET Prénom='$this->Prénom', `Date De Naissance`='$this->DateDeNaissance', `Restrictions Alimentaires`='$this->RestrictionsAlimentaires' WHERE idEnfants = $this->idEnfants";
        requete($requete);
    }
}


$test = new Enfants(2);
echo($test);