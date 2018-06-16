<?php
include '../Objets/Parents.php';

// inscription d'une nounou 
//récupération des données du POST et vérification des valeurs 
if (isset($_POST)){
    foreach ($_POST as $key => $value){
        $_POST[$key]=htmlspecialchars($value);
    }
    if ($_POST['info']=="Avez-vous des éléments importants pour l'organisation") $_POST['info']=='';
    //création de parent
    $newParents = new Parents($_POST['ville'],$_POST['info']);
    $verif=$newParents->addDB();
    //si la nounou est bien ajouté
    if($verif){
        header('Location: home.php');
        exit();
    }
}

//redirection vers la page home en cas de problème
header('Location: home.php');s
?>