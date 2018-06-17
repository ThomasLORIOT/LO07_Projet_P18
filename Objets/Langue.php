<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Langue
 *
 * @author Thomas
 */
require_once '../Functions/Functions_SQL.php';

class Langue {

    private $idLangue;
    private $langue;
    private $visible;

    function getIdLangue() {
        return $this->idLangue;
    }

    function getLangue() {
        return $this->langue;
    }

    function getVisible() {
        return $this->visible;
    }

    function setIdLangue($idLangue) {
        $this->idLangue = $idLangue;
    }

    function setLangue($langue) {
        $this->langue = $langue;
    }

    function setVisible($visible) {
        $this->visible = $visible;
    }

    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 1:
                self::__construct1($argv[0]);
                break;
            case 2:
                self::__construct2($argv[0], $argv[1]);
                break;
        }
    }

    function __construct1($idLangue) {
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM langues WHERE idLangue = '$idLangue'");
        if ($result->num_rows == 0) {
            echo "<script>console.log('connait pas cette langue');</script>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $this->idLangue = $idLangue;
            $this->langue = $row['Nom'];
            $this->visible = $row['Visible'];
        }
    }

    function __construct2($langue, $visible) {
        $this->langue = $langue;
        $this->visible = $visible;
    }

    function __toString() {
        return "Langue($this->idLangue;$this->langue;$this->visible)<br>\n";
    }

    function addDB() {
        $requete = "INSERT INTO langues(Nom, Visible) VALUES ('$this->langue', '$this->visible')";
        requete($requete);
    }

    function updateDB() {
        $requete = "UPDATE langues SET Nom = '$this->langue', Visible = $this->visible WHERE idLangue=$this->idLangue";
        requete($requete);
    }

    function dropDB() {
        $requete = "DELETE FROM langues WHERE idLangue=$this->idLangue";
        requete($requete);
    }
}
function assoc_langues() {
    $requete = "SELECT * FROM langues WHERE Visible = 1";
    $myDB = connectPDO();
    $assoc = $myDB->query($requete);
    $result = $assoc->fetch(PDO::FETCH_ALL_ASSOC); 
    return $result;
}
