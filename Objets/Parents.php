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

    function __construct($Ville, $InformationsGénérales) {
        $this->Ville = $Ville;
        $this->InformationsGénérales = $InformationsGénérales;
    }

}
