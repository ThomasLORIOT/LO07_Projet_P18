<?php
require_once '../Functions/Functions_SQL.php';
require_once 'debug.php';

class Utilisateur {

    private $idUtilisateur;
    private $nom;
    private $email;
    private $MDP;
    private $Nounous_idNounous;
    private $Parents_idParents;

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
        $this->email=$email;
        $this->MDP=$MDP;
    }
    
    //construction lors d'une inscription
    private function __construct2($nom, $email, $MDP) {
        $this->nom = $nom;
        $this->email = $email;
        $this->setMDP($MDP);
    }

    function __tostring() {
        return "Utilisateur($this->idUtilisateur, $this->nom, $this->email, $this->MDP, $this->Nounous_idNounous, $this->Parents_idParents)<br>\n";
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
                $this->Parents_idParents = $row['Parents_idParents'];
                $this->Nounous_idNounous = $row['Nounous_idNounous'];
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
            $requete = "INSERT INTO utilisateur(nom,email,MDP) VALUES ('$this->nom','$this->email','$this->MDP')";
            if ($myDB->query($requete) == TRUE) {
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
        requete("UPDATE utilisateur SET Nom='$this->nom', Email='$this->email', MDP='$this->MDP' WHERE idUtilisateur = '$this->idUtilisateur'");
    }

}
//$test = new Utilisateur("yolo", "yolqzdo@rer.fr", "lsqsqdqs");
//$verif=$test->addDB();
//print_r($verif);
//echo("<br>");

//$test2 = new Utilisateur("vladimir.trois@gmail.com", "lou");
//print_r($test2);
//echo("<br>");
//
//$verif = $test2->recupDB();
//print_r($verif);

?>
