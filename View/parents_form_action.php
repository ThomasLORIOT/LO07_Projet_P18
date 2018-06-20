<?php
session_start();
include '../Objets/Utilisateur.php';
include '../Objets/Parents.php';
$user= new Utilisateur($_SESSION['idUtilisateur']);

// inscription d'une nounou 
//récupération des données du POST et vérification des valeurs 
if (isset($_POST)){
    foreach ($_POST as $key => $value){
        $_POST[$key]=htmlspecialchars($value);
    }
    if ($_POST['info']=="Avez-vous des éléments importants pour l'organisation") $_POST['info']=='';
    //création de parent
    $newParents = new Parents($_POST['ville'], str_replace("'", " ", $_POST['info']));
    $verif=$newParents->addDB();
    //si la nounou est bien ajouté
    if($verif){
        $user->setIdParents($newParents->getIdParents());
        $user->updateDB();
        $_SESSION['nounouOUparents'] = "parent";
        header('Location: home.php');
        exit();
    }
}
//redirection vers la page welcome en cas de problème
header('Location: welcome.php');
?>