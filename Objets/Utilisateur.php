<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur
 *
 * @author Thomas
 */
require_once '../Functions/Functions_SQL.php';

class Utilisateur {

    private $idUtilisateur;
    private $nom;
    private $email;
    private $MDP;

    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    function getNom() {
        return $this->nom;
    }

    function getEmail() {
        return $this->email;
    }

    function getMDP() {
        return $this->MDP;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMDP($MDP) {
        $this->MDP = password_hash($MDP, PASSWORD_DEFAULT);
    }

    function __construct($nom, $email, $MDP) {
        $this->nom = $nom;
        $this->email = $email;
        $this->setMDP($MDP);
    }

    function __tostring() {
        return "Utilisateur($this->nom, $this->email, $this->MDP)<br>\n";
    }

    function addDB() {
        if (!requete("SELECT  FROM `utilisateur` WHERE Nom = '" . $this->getNom() . "' AND Email = '" . $this->getEmail() . "'")) {
            requete("INSERT INTO utilisateur (Nom, Email, MDP) VALUES ('" . $this->getNom() . "', '" . $this->getEmail() . "', '" . $this->getMDP() . "')");
            $this->idUtilisateur = requete("SELECT idUtilisateur FROM `utilisateur` WHERE Nom = '" . $this->getNom() . "' AND Email = '" . $this->getEmail() . "'");
        }
    }

    function updateDB() {
        requete("UPDATE utilisateur SET Nom='" . $this->getNom() . "', Email='" . $this->getEmail() . "', MDP='" . $this->getMDP() . "')");
    }

}

$test = new Utilisateur("fra", "fr@bg.fr", "lol");
$test->addDB();
echo($test->getIdUtilisateur());




