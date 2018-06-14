<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nounou
 *
 * @author Thomas
 */
require_once '../Functions/Functions_SQL.php';

class Nounou {

    private $idNounous;
    private $Prénom;
    private $Portable;
    private $Age;
    private $Présentation;
    private $Expérience;
    private $Visible = false;

    function getIdNounous() {
        return $this->idNounous;
    }

    function getPrénom() {
        return $this->Prénom;
    }

    function getPortable() {
        return $this->Portable;
    }

    function getAge() {
        return $this->Age;
    }

    function getPrésentation() {
        return $this->Présentation;
    }

    function getExpérience() {
        return $this->Expérience;
    }

    function getVisible() {
        return $this->Visible;
    }

    function setIdNounous($idNounous) {
        $this->idNounous = $idNounous;
    }

    function setPrénom($Prénom) {
        $this->Prénom = $Prénom;
    }

    function setPortable($Portable) {
        $this->Portable = $Portable;
    }

    function setAge($Age) {
        if ($Age >= 15 && $Age <= 140) {
            $this->Age = $Age;
        }
    }

    function setPrésentation($Présentation) {
        $this->Présentation = $Présentation;
    }

    function setExpérience($Expérience) {
        $this->Expérience = $Expérience;
    }

    function setVisible($Visible) {
        $this->Visible = $Visible;
    }

    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 5:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
            case 1:
                self::__construct2($argv[0]);
                break;
        }
    }
    //écrire les portable comme ça "'0611223344'" sinon il supprime le premier 0
    function __construct1($Prénom, $Portable, $Age, $Présentation, $Expérience) {
        $this->setAge($Age);
        $this->Prénom = $Prénom;
        $this->Portable = $Portable;
        $this->Présentation = $Présentation;
        $this->Expérience = $Expérience;        
    }

    function __construct2($idNounous) {
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM nounous WHERE idNounous = '$idNounous'");
        if ($result->num_rows == 0) {
            echo "<script>console.log('connait pas cette nounou');</script>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $this->idNounous = $idNounous;
            $this->Prénom = $row['Prénom'];
            $temp = $row['Portable'];
            $this->Portable = "'$temp'";
            $this->Age = $row['Age'];
            $this->Présentation = $row['Présentation'];
            $this->Expérience = $row['Expérience'];
            $this->Visible = $row['Visible'];
        }
    }

    function __toString() {
        return "Nounou($this->idNounous;$this->Prénom;$this->Portable;$this->Age;$this->Présentation;$this->Expérience;$this->Visible)<br>\n";
    }
    
    function addDB() {
        $requete = "INSERT INTO nounous(Prénom, Portable, Age, Présentation, Expérience, Visible) Values ('$this->Prénom', $this->Portable, $this->Age, '$this->Présentation', '$this->Expérience', 0)";
        requete($requete);
    }
    
    //de base toujours invisible à l'insertion
    function updateDB() {
        $requete = "UPDATE nounous SET Prénom='$this->Prénom', Portable=$this->Portable, Age=$this->Age, Présentation='$this->Présentation', Expérience='$this->Expérience', Visible=$this->Visible WHERE idNounous = '$this->idNounous'";
        requete($requete);
    }
    
    function dropDB(){
        $requete = "DELETE FROM nounous WHERE idNounous=$this->idNounous";
        requete($requete);
    }
    
    function getGardeAVenir(){
        $requete = "SELECT Horaires_idHoraires FROM garde WHERE `Date Fin` > CURRENT_DATE() ORDER BY `Date Début`";
        $myDB = connectDB();
        $result = $myDB->query($requete);
        $row = mysqli_fetch_row($result);
        $ListeGarde = Array();
        foreach ($row as $value) {
            $ListeGarde[] = new Garde($this->idNounous, $value);
        }
        return $ListeGarde[];
    }
}