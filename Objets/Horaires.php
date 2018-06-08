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

    function __construct($Date, $HeureD, $HeureF) {
        $this->Date = $Date;
        $this->HeureDébut = $HeureD;
        $this->HeureFin = $HeureF;
    }
}
