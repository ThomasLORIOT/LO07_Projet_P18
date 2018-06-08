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
        if ($Age>=15 && $Age<=140){
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

    function __construct($Prénom, $Portable, $Age, $Présentation, $Expérience) {
        $this->setAge($Age);
        $this->Prénom = $Prénom;
        $this->Portable = $Portable;
        $this->Présentation = $Présentation;
        $this->Expérience = $Expérience;
    }
    
    function __toString() {
        return "Nounou($this->Prénom;$this->Portable;$this->Age;$this->Présentation;$this->Expérience)";
    }
}
