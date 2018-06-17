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
include_once '../Functions/Functions_SQL.php';
include_once 'debug.php';
include_once 'Garde.php';
include_once 'Langue.php';

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
            $this->Portable = "$temp";
            $this->Age = $row['Age'];
            $this->Présentation = $row['Présentation'];
            $this->Expérience = $row['Expérience'];
            $this->Visible = $row['Visible'];
        }
        mysqli_close($myDB);
    }

    function __toString() {
        return "Nounou($this->idNounous;$this->Prénom;$this->Portable;$this->Age;$this->Présentation;$this->Expérience;$this->Visible)<br>\n";
    }

    function addDB() {
        $result = FALSE;
        $requete = "INSERT INTO nounous(Prénom, Portable, Age, Présentation, Expérience, Visible) Values ('$this->Prénom', '$this->Portable', $this->Age, '$this->Présentation', '$this->Expérience', 0)";
        $myDB = connectDB();
        $res = $myDB->query($requete);
        echo "<script>console.log('requete demandé : $requete');</script><br>\n";

        if ($res) {
            echo "<script>console.log('requête bien effectuée');</script><br>\n";
            $result = TRUE;
            $requete2 = "SELECT idNounous FROM nounous WHERE Portable = '$this->Portable'";
            $res2 = $myDB->query($requete2);
            $id = mysqli_fetch_assoc($res2);
            $this->idNounous = $id['idNounous'];
        } else {
            $erreur = mysqli_error($myDB);
            echo "<script>console.log('erreur : $erreur');</script><br>\n";
        }
        mysqli_close($myDB);
        return $result;
    }

    //de base toujours invisible à l'insertion
    function updateDB() {
        $requete = "UPDATE nounous SET Prénom='$this->Prénom', Portable='$this->Portable', Age=$this->Age, Présentation='$this->Présentation', Expérience='$this->Expérience', Visible=$this->Visible WHERE idNounous = '$this->idNounous'";
        requete($requete);
    }

    function dropDB() {
        $requete = "DELETE FROM nounous WHERE idNounous=$this->idNounous";
        requete($requete);
    }

    //return le liste de gardes que la nounou va faire
    function getGardeAVenir() {
        $requete = "SELECT garde.idHoraires FROM garde NATURAL JOIN horaires WHERE garde.idNounous = $this->idNounous AND Date > CURRENT_DATE() ORDER BY Date";
        $myDB = connectDB();
        $result = $myDB->query($requete);
        $row = mysqli_fetch_row($result);

        $ListeGarde = Array();
        foreach ($row as $value) {
            $ListeGarde[] = new Garde($this->idNounous, $value);
        }
        mysqli_close($myDB);
        return $ListeGarde;
    }
    
    //return la liste de gardes que la nounou à déjà faite
    function getGardeFini(){
        $requete = "SELECT garde.idHoraires FROM garde NATURAL JOIN horaires WHERE garde.idNounous = $this->idNounous AND Date < CURRENT_DATE() ORDER BY Date";
        $myDB = connectDB();
        $result = $myDB->query($requete);
        $row = mysqli_fetch_row($result);

        $ListeGarde = Array();
        foreach ($row as $value) {
            $ListeGarde[] = new Garde($this->idNounous, $value);
        }
        mysqli_close($myDB);
        return $ListeGarde;
    }

    //ajoute à la db le fait que la nounou sait parlé une langue
    function addParle($idLangue, $niveau) {
        $requete = "INSERT INTO parle VALUES ($idLangue, $this->idNounous, '$niveau')";
        requete($requete);
    }
    
    //drop à la db le fait que la nounou sait parlé une langue
    function dropParle($idLangue) {
        $requete = "DROP FROM parle VALUES ($idLangue, $this->idNounous)";
        requete($requete);
    }

    //return la liste des langues parlées de la nounou
    function getLangue() {
        $requete = "SELECT idLangue FROM parle WHERE idNounous=$this->idNounous";
        $myDB = connectDB();
        $result = $myDB->query($requete);
        $row = mysqli_fetch_row($result);

        $ListeLangue = Array();
        foreach ($row as $value) {
            $ListeLangue[] = new Langue($value);
        }
        mysqli_close($myDB);
        return $ListeLangue;
    }
    
    function addLangue($langue){
        
        $new = new Langue($langue, 0);
        $new->addDB();
    }
}