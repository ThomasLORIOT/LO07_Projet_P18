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
    
    //ajout d'un utilisateur dans la base
    function addDB() {
        //connexion à la base
        $myDB= connectDB();
        //est-ce que le mail existe dejà
        $result=$myDB->query("SELECT * FROM utilisateur WHERE Email='$this->email'");
        if($result->num_rows==0){ //si non 
            $requete="INSERT INTO utilisateur(nom,email,MDP) VALUES ('$this->nom','$this->email','$this->MDP')";
            //echo($requete);
            if($myDB->query($requete)==TRUE){
                echo("Insertion réussie<br>");
            }else{
                printf("Error: %s <br> " ,$myDB->error);
            }
        }else{ // si oui 
            echo("Ajout de l'utilisateur impossible : mail existant<br>");
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
$requete="SELECT * FROM utilisateur";
$result=$myDB->query($requete);
echo("Nombre de ligne pour la requete : <br> $requete = : $result->num_rows");