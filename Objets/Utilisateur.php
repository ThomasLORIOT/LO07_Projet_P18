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
    //construction lors d'une connexion
    private function __construct1($email, $MDP) {
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
    
    //construction lors d'une inscription
    private function __construct2($nom, $email, $MDP) {
        $this->nom = $nom;
        $this->email = $email;
        $this->setMDP($MDP);
    }

    function __tostring() {
        return "Utilisateur($this->idUtilisateur, $this->nom, $this->email, $this->MDP)<br>\n";
    }

    //ajout d'un utilisateur dans la base
    function addDB() {//renvoi un tableau de vérité
        $verif=array('ajoutOk'=>FALSE,'mailPB'=>FALSE);
        //connexion à la base
        $myDB = connectDB();
        //est-ce que le mail est nouveau ?
        $result = $myDB->query("SELECT * FROM utilisateur WHERE Email='$this->email'");
        if ($result->num_rows == 0) { 
            //le mail est nouveau : On INSERT le mail
            $requete = "INSERT INTO utilisateur(nom,email,MDP) VALUES ('$this->nom','$this->email','$this->MDP')";
            if ($myDB->query($requete) == TRUE) {
                //mail INSERT reussi
                $verif['ajoutOk']=FALSE;
            } 
        }else{
            $verif['mailPB']=TRUE;
        }
        mysqli_close($myDB);
        return $verif;
    }

    function updateDB() {
        requete("UPDATE utilisateur SET Nom='" . $this->getNom() . "', Email='" . $this->getEmail() . "', MDP='" . $this->getMDP() . "')");
    }
}

//$test = new Utilisateur("yolo", "yolqdzqzdo@rer.fr", "lsqsqdqs");
//$verif=$test->addDB();
//print_r($verif);
//echo("<br>");
//$test2 = new Utilisateur("ahhah","vlad@bg.fr", "lol");
//$verif2=$test2->addDB();
//print_r($verif2);


?>