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
$verif=$newUser->recupDB();

//récupération de l'utilisateur avec email et mdp
if($verif['connexion']){
    session_start();
    $_SESSION['idUtilisateur']=$newUser->getIdUtilisateur();
    //si l'utilisateur n'est ni nounou ni parents
    if ($newUser->getIdNounous() == null && $newUser->getIdParents()==null ){
        //redirection page de choix
        header('Location: choix.html');
        exit();
    }else{
        header('Location: home.php');
        exit();
    }

}
//Si email ou mdp incrorrecte 
else{
    if($verif['wrongID']){
        header('Location: connexion_form.php?wrongID=1');
        exit();
    }
    else{// si autre, retour acceuil avec mot problème connexion
        header('Location: connexion_form.php?pb=1');
        exit();       
    }
}
