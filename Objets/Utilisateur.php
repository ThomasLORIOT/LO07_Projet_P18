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

    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 2:
                self::__construct1($argv[0], $argv[1]);
                break;
            case 3:
                self::__construct2($argv[0], $argv[1], $argv[2]);
                break;
        }
    }

    function __construct1($email, $MDP) {
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM utilisateur WHERE Email = '$email'");
        if ($result->num_rows == 0) {
             echo "<script>console.log('connait pas ce mail');</script>";
        }
        $row = mysqli_fetch_row($result);
        $hash = $row[2];

        if (password_verify($MDP, $hash)) {
            $this->idUtilisateur = $row[0];
            $this->nom = $row[1];
            $this->email = $row[3];
            $this->MDP = $row[2];
        } else {
            echo "<script>console.log('mauvais mot de passe');</script>";
        }
    }

    function __construct2($nom, $email, $MDP) {
        $this->nom = $nom;
        $this->email = $email;
        $this->setMDP($MDP);
    }

    function __tostring() {
        return "Utilisateur($this->idUtilisateur, $this->nom, $this->email, $this->MDP)<br>\n";
    }

    //ajout d'un utilisateur dans la base
    function addDB() {
        //connexion à la base
        $myDB = connectDB();
        //est-ce que le mail existe dejà
        $result = $myDB->query("SELECT * FROM utilisateur WHERE Email='$this->email'");
        if ($result->num_rows == 0) { //si non 
            $requete = "INSERT INTO utilisateur(nom,email,MDP) VALUES ('$this->nom','$this->email','$this->MDP')";
            //echo($requete);
            if ($myDB->query($requete) == TRUE) {
                echo("Insertion réussie<br>"); //popup qui dira inscription reussi
            } else {
                printf("Error: %s <br> ", $myDB->error);
            }
        } else { // si oui 
            echo("Ajout de l'utilisateur impossible : mail existant<br>");
        }
        mysqli_close($myDB);
    }

    function updateDB() {
        requete("UPDATE utilisateur SET Nom='" . $this->getNom() . "', Email='" . $this->getEmail() . "', MDP='" . $this->getMDP() . "')");
    }

}

$test = new Utilisateur("yolo", "yolo@rer.fr", "lsqsqdqs");
echo($test);
$test2 = new Utilisateur("vlad@bg.fr", "lol");
echo($test2);


