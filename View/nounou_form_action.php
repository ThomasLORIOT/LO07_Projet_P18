<?php
session_start();
if ($_SESSION['connexion']){
    include '../Objets/Nounou.php';
    include '../Objets/Utilisateur.php';

    // inscription d'une nounou 
    //récupération des données du POST et vérification des valeurs 
    if (isset($_POST)){
        foreach ($_POST as $key => $value){
            $_POST[$key]=htmlspecialchars($value);
        }
        //création de nounou
        $newNounou = new Nounou($_POST['prenom'],$_POST['telephone'],$_POST['age'],$_POST['presentation'],$_POST['experience']);
        $verif=$newNounou->addDB();
        //si la nounou est bien ajouté
        if($verif){
            //récupération de l'id et ajout de celui ci dans utilisateur
            $user= new Utilisateur($_SESSION['idUtilisateur']);
            $user->setIdNounous($newNounou->getIdNounous());
            $user->updateDB();
            $_SESSION['nounouOUparents']='nounou';
            header('Location: home.php');
            exit();
        }
    }
}
//redirection vers la page home en cas de problème
header('Location: home.php');s



?>