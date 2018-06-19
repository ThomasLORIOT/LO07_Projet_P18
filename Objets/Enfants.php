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
    private $IdParents;
    
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

    function getIdParents() {
        return $this->IdParents;
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

    function setIdParents($Parents_IdParents) {
        $this->IdParents = $IdParents;
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
        $this->IdParents = $idParents;
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
            $this->DateDeNaissance = $row['Date de Naissance'];
            $this->RestrictionsAlimentaires = $row['Restrictions Alimentaires'];
            $this->IdParents = $row['idParents'];
        }
    }
    
    function __toString() {
        return "Enfant($this->idEnfants;$this->Prénom;$this->DateDeNaissance;$this->RestrictionsAlimentaires;$this->IdParents)<br>\n";
    }
    
    function addDB(){
        $myDB = connectDB();
        //la fonction bizarre permet de pouvoir mettre des apostrophe dans un text area sans faire planter la requete sql
        $requete = "INSERT INTO enfants(Prénom, `Date De Naissance`, `Restrictions Alimentaires`, idParents) VALUES ('$this->Prénom', '$this->DateDeNaissance', '".mysqli_real_escape_string($myDB, $this->RestrictionsAlimentaires)."', $this->IdParents)";
        requete($requete);
    }
    
    function dropDB($idparent){
        $myDB = connectDB();
        $res = FALSE;
        $requete = "DELETE FROM enfants WHERE idEnfants = $this->idEnfants AND idParents = $idparent";
        $done = $myDB->query($requete);
        if ($done){
            $res = TRUE;
        }
        return $res;
    }
    
    function updateDB(){
        $requete = "UPDATE enfants SET Prénom='$this->Prénom', `Date De Naissance`='$this->DateDeNaissance', `Restrictions Alimentaires`='$this->RestrictionsAlimentaires' WHERE idEnfants = $this->idEnfants";
        requete($requete);
    }
}
