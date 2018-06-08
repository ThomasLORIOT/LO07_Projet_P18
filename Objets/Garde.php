<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Garde
 *
 * @author Thomas
 */
class Garde {

    private $Nounous_idNounous;
    private $Horaires_idHoraires;
    private $Régulier; //bool
    private $DateDébut;
    private $DateFin;
    private $Langue; //bool
    private $nbr_enfants;
    private $Prix;
    private $Note;
    private $Appréciation;
    private $nbrHeure;

    function getNbrHeure() {
        return $this->nbrHeure;
    }

    function setNbrHeure($nbrHeure) {
        $this->nbrHeure = $nbrHeure;
    }

    function getNounous_idNounous() {
        return $this->Nounous_idNounous;
    }

    function getHoraires_idHoraires() {
        return $this->Horaires_idHoraires;
    }

    function getRégulier() {
        return $this->Régulier;
    }

    function getDateDébut() {
        return $this->DateDébut;
    }

    function getDateFin() {
        return $this->DateFin;
    }

    function getLangue() {
        return $this->Langue;
    }

    function getNbr_enfants() {
        return $this->nbr_enfants;
    }

    function getPrix() {
        return $this->Prix;
    }

    function getNote() {
        return $this->Note;
    }

    function getAppréciation() {
        return $this->Appréciation;
    }

    function setNounous_idNounous($Nounous_idNounous) {
        $this->Nounous_idNounous = $Nounous_idNounous;
    }

    function setHoraires_idHoraires($Horaires_idHoraires) {
        $this->Horaires_idHoraires = $Horaires_idHoraires;
    }

    function setRégulier($Régulier) {
        $this->Régulier = $Régulier;
    }

    function setDateDébut($DateDébut) {
        $this->DateDébut = $DateDébut;
    }

    function setDateFin($DateFin) {
        $this->DateFin = $DateFin;
    }

    function setLangue($Langue) {
        $this->Langue = $Langue;
    }

    function setNbr_enfants($nbr_enfants) {
        if ($nbr_enfants > 0 && $nbr_enfants < 10) {
            $this->nbr_enfants = $nbr_enfants;
        }
    }

    private function setPrix($Prix) {
        if ($Prix > 0) {
            $this->Prix = $Prix;
        }
    }

    function setNote($Note) {
        $this->Note = $Note;
    }

    function setAppréciation($Appréciation) {
        $this->Appréciation = $Appréciation;
    }

    function __construct($Régulier, $DateD, $DateF, $Lanque, $nbr_Enfants, $Appréciation) {
        $this->Régulier = $Régulier;
        $this->DateDébut = $DateD;
        $this->DateFin = $DateF;
        $this->Langue = $Lanque;
        $this->nbr_enfants = $nbr_Enfants;
        $this->Appréciation = $Appréciation;
    }

    private function calculPrix() {
        if (!$this->Régulier) {
            $prix = (7 * $this->nbrHeure) + (4 * $this->nbrHeure * ($this->nbr_enfants - 1));
        } else if ($this->Langue) {
            $prix = (15 * $this->nbrHeure * $this->nbr_enfants);
        } else if ($this->Régulier && !$this->Langue) {
            $prix = (10 * $this->nbrHeure) + (5 * $this->nbrHeure * ($this->nbr_enfants - 1));
        }
        $this->setPrix($prix);
    }

}
