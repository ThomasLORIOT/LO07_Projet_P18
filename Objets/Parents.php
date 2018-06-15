<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parents
 *
 * @author Thomas
 */
require_once '../Functions/Functions_SQL.php';
require_once 'Enfants.php';

class Parents {

    private $idParents;
    private $Ville;
    private $InformationsGénérales;

    function getIdParents() {
        return $this->idParents;
    }

    function setIdParents($idParents) {
        $this->idParents = $idParents;
    }

    function getVille() {
        return $this->Ville;
    }

    function getInformationsGénérales() {
        return $this->InformationsGénérales;
    }

    function setVille($Ville) {
        $this->Ville = $Ville;
    }

    function setInformationsGénérales($InformationsGénérales) {
        $this->InformationsGénérales = $InformationsGénérales;
    }

    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 2:
                self::__construct1($argv[0], $argv[1]);
                break;
            case 1:
                self::__construct2($argv[0]);
                break;
        }
    }

    function __construct1($Ville, $InformationsGénérales) {
        $this->Ville = $Ville;
        $this->InformationsGénérales = $InformationsGénérales;
    }

    function __construct2($idParents) {
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM parents WHERE idParents = '$idParents'");
        if ($result->num_rows == 0) {
            echo "<script>console.log('connait pas ce parents');</script>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $this->idParents = $idParents;
            $this->Ville = $row['Ville'];
            $this->InformationsGénérales = $row['Informations Générales'];
        }
    }

    function __toString() {
        return "Parent($this->idParents;$this->Ville;$this->InformationsGénérales)<br>\n";
    }

    //ajout d'un parent dans la base
    function addDB() {
        $result = FALSE;
        $requete = "INSERT INTO parents(Ville, `Informations Générales`) VALUES ('$this->Ville','$this->InformationsGénérales') ";
        $myDB = connectDB();
        $res = mysqli_query($myDB, $requete);
        echo "<script>console.log('requete : $requete');</script><br>\n";

        if ($res) {
            echo "<script>console.log('requête bien effectuée');</script><br>\n";
            $result = TRUE;
        } else {
            $erreur = mysqli_error($myDB);
            echo "<script>console.log('erreur : $erreur');</script><br>\n";
        }
        mysqli_close($myDB);
        return $result;
    }

    function updateDB() {
        $requete = "UPDATE parents SET Ville='$this->Ville', `Informations Générales`='$this->InformationsGénérales' WHERE idParents = '$this->idParents'";
        requete($requete);
    }

    function addEnfant($Prénom, $DateDeNaissance, $Restrictions) {
        $enfant = new Enfants($Prénom, $DateDeNaissance, $Restrictions, $this->idParents);
        $enfant->addDB();
    }

    //return liste de ses enfants
    function getEnfant() {
        $requete = "SELECT idEnfants FROM enfants WHERE idParents=$this->idParents";
        $myDB = connectDB();
        $result = $myDB->query($requete);
        $row = mysqli_fetch_row($result);
        $ListeEnfant = Array();
        foreach ($row as $value) {
            $ListeEnfant[] = new Enfants($value);
        }
        return $ListeEnfant;
    }

}

$test = new Parents(1);
echo($test);
$test->addEnfant("Alexandre", 19970408, "pas de sucre");
