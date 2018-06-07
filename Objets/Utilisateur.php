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
require_once 'debug.php';

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
        $myDB= connectDB();
        $result=$myDB->query("SELECT * FROM utilisateur WHERE Email='$this->email'");
        if($result->num_rows==0){
            $requete="INSERT INTO utilisateur(nom,email,mdp) VALUES ('$this->nom','$this->email')";
            //echo($requete);
            if($myDB->query($requete)==TRUE){
                echo("Insertion réussie");
            }else{
               printf("Error: " ,$result->error);
            }
        }else{
            echo("Utilisateur existant");
        }
        mysqli_close($myDB);
    }

    function updateDB() {
        requete("UPDATE utilisateur SET Nom='" . $this->getNom() . "', Email='" . $this->getEmail() . "', MDP='" . $this->getMDP() . "')");
    }

}

$test = new Utilisateur("test", "rqsdqsdf@bg.fr", "lol");
$test->addDB();

$test1 = new Utilisateur("test", "rerfct@bg.fr", "lol");
$test1->addDB();
//echo($test->getIdUtilisateur());
//echo($test);
//  echo($test->getIdUtilisateur());
//echo(debug($test->getIdUtilisateur()));


//$requete="SELECT * FROM utilisateur WHERE Email='test@test.test'";
//$result=$myDB->query($requete);
//echo($result->num_rows);

$myDB= connectDB();
$result=$myDB->query("SELECT * FROM utilisateur");
echo($result->num_rows);