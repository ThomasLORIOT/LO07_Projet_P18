<!--
    //créer l'utilisateur et renvoi vers connexion si tous ce passe bien

-->
<?php
include '../Objets/Utilisateur.php';

// inscription d'un utilisateur 
//récupération des données du POST et vérification des valeurs 
if (isset($_POST)){
    foreach ($_POST as $key => $value){
        $_POST[$key]=htmlspecialchars($value);
    }
}

//création de l'utilisateur
$newUser = new Utilisateur($_POST['nom'],$_POST['email'],$_POST['mdp']);
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
        header('Location: inscription_form.php?mail=1');
        exit();
    }
    else{// si autre, retour acceuil avec mot problème connexion
        header('Location: welcome.php?pb=1');
        exit();       
    }
}
