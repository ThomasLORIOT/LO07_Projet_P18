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

    function __construct($Prénom, $DateDeNaissance, $Restrictions) {
        $this->Prénom = $Prénom;
        $this->DateDeNaissance = $DateDeNaissance;
        $this->RestrictionsAlimentaires = $Restrictions;
    }
    
}
