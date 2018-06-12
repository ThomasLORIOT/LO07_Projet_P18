<?php
include '../Objets/Utilisateur.php';

// inscription d'un utilisateur 
//récupération des données du POST et vérification des valeurs 
if (isset($_POST)){
    foreach ($_POST as $key => $value){
        $_POST[$key]=htmlspecialchars($value);
    }
}
print_r($_POST);

//création de l'utilisateur
$newUser = new Utilisateur($_POST['email'],$_POST['mdp']);
$verif=$newUser->addDB();

//si l'utilisateur est bien créer, direction page connexion
if($verif['ajoutOk']){
    header('Location: connexion_form.php?coOK=1');
    exit();
}
//Si utilisateur non créer
else{
    // si mail existant, le dire
    if($verif['mailPB']){
        header('Location: inscription_form.php?mailDoublon=1');
        exit();
    }
    else{// si autre, retour acceuil avec mot problème connexion
        header('Location: welcome.php?pbBD=1');
        exit();       
    }
}
