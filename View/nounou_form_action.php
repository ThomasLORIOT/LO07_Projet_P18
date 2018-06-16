<?php
include '../Objets/Nounou.php';

// inscription d'une nounou 
//récupération des données du POST et vérification des valeurs 
if (isset($_POST)){
    foreach ($_POST as $key => $value){
        $_POST[$key]=htmlspecialchars($value);
    }
    //création de nounou
    $newNounou = new Nounou($_POST['prenom'],$_POST['telephone'],$_POST['age'],$_POST['presentation'],$_POST['experience']);
    $verif=$newNounou->recupDB();
    //si la nounou est bien ajouté
    if($verif){
        header('Location: home.php');
        exit();
    }
}

//redirection vers la page home en cas de problème
header('Location: home.php');s
?>