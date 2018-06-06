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

include_once 'database.php';

class Utilisateur {

    private $nom;
    private $email;
    private $MDP;

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
        $this->MDP = $MDP;
    }
    
    function set_password($value) {
        $this->MDP = password_hash($value, PASSWORD_DEFAULT);
    }
    
    
    function __construct($nom,$email,$MDP){
        $this->nom = $nom;
        $this->email = $email;
        set_password($MDP);
    }
    
    function __tostring() {
        return "Utilisateur($this->nom, $this->email, $this->MDP)<br>\n";
    }
    
    
    
}

$test = new Utilisateur("Thomas", "test@test.fr","password");
echo($test);
