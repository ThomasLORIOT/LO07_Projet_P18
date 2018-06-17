<?php
require_once '../Functions/Functions_SQL.php';

class Utilisateur {

    private $idUtilisateur;
    private $nom;
    private $email;
    private $MDP;
    private $idNounous;
    private $idParents;
    
    function getIdNounous() {
        return $this->idNounous;
    }

    function getIdParents() {
        return $this->idParents;
    }

    function setIdNounous($idNounous) {
        $this->idNounous = $idNounous;
    }

    function setIdParents($idParents) {
        $this->idParents = $idParents;
    }

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
            case 1:
                self::__construct3($argv[0]);
                break;
        }
    }
    //construction lors d'une connexion
    private function __construct1($email, $MDP) {
        $this->email=$email;
        $this->MDP=$MDP;
    }
    
    //construction lors d'une inscription
    private function __construct2($nom, $email, $MDP) {
        $this->nom = $nom;
        $this->email = $email;
        $this->setMDP($MDP);
        $this->idParents = 0;
        $this->idNounous = 0;
    }
    
    private function __construct3($idUtilisateur){
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM utilisateur WHERE idUtilisateur = '$idUtilisateur'");
        if ($result->num_rows == 0) {
            echo "<script>console.log('connait pas cet utilisateur');</script>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $this->idUtilisateur = $idUtilisateur;
            $this->nom = $row['Nom'];
            $this->email = $row['Email'];
            $this->MDP = $row['MDP'];
            $this->idNounous = $row['idNounous'];
            $this->idParents = $row['idParents'];
        }
    }

    function __tostring() {
        return "Utilisateur($this->idUtilisateur, $this->nom, $this->email, $this->MDP, $this->idNounous, $this->idParents)<br>\n";
    }
    
    function recupDB(){
        $verif=array('connexion'=>FALSE,'wrongID'=>FALSE);
        $myDB = connectDB();
        $result = $myDB->query("SELECT * FROM utilisateur WHERE Email = '$this->email'");
        if ($result->num_rows ==1) {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['MDP'];
            //verification du mot de passe
            if (password_verify($this->MDP, $hash)) {
                $this->idUtilisateur = $row['idUtilisateur'];
                $this->nom = $row['Nom'];
                $this->email = $row['Email'];
                $this->MDP = $row['MDP'];
                $this->idParents = $row['idParents'];
                $this->idNounous = $row['idNounous'];
                $verif['connexion']=TRUE;
            }else{
                $verif['wrongID']=TRUE;
            }
        }else{
            $verif['wrongID']=TRUE;
        }
        return $verif;
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
            $requete = "INSERT INTO utilisateur(Nom,Email,MDP) VALUES ('$this->nom','$this->email','$this->MDP')";
            if (requete($requete) == TRUE) {
                //mail INSERT reussi
                $verif['ajoutOk']=TRUE;
            } 
        }else{
            $verif['mailPB']=TRUE;
        }
        mysqli_close($myDB);
        return $verif;
    }

    function updateDB() {
        if ($this->idNounous != NULL && $this->idParents != NULL){
            $requete = "UPDATE utilisateur SET Nom='$this->nom', Email='$this->email', MDP='$this->MDP', idNounous = $this->idNounous, idParents = $this->idParents WHERE idUtilisateur = '$this->idUtilisateur'";
        } else if ($this->idNounous != NULL && $this->idParents == NULL){
            $requete = "UPDATE utilisateur SET Nom='$this->nom', Email='$this->email', MDP='$this->MDP', idNounous = $this->idNounous WHERE idUtilisateur = '$this->idUtilisateur'";
        } else if ($this->idParents != NULL && $this->idNounous == NULL){
            $requete = "UPDATE utilisateur SET Nom='$this->nom', Email='$this->email', MDP='$this->MDP', idParents = $this->idParents WHERE idUtilisateur = '$this->idUtilisateur'";
        } else {
            $requete = "UPDATE utilisateur SET Nom='$this->nom', Email='$this->email', MDP='$this->MDP' WHERE idUtilisateur = '$this->idUtilisateur'";
        }
        $myDB = connectDB();
        $myDB->query($requete);
    }
    
}
