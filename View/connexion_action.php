<!--
    //connecte l'utilisateur si mdp et email correcte, conduit ensuite sur home si l'utilisateur est nounou ou parent sinon vers choix

-->
<?php
include '../Objets/Utilisateur.php';

// inscription d'un utilisateur 
//récupération des données du POST et vérification des valeurs 
if (isset($_POST)){
        foreach ($_POST as $key => $value){
            $_POST[$key]=htmlspecialchars($value);
        }


    //création de l'utilisateur
    $newUser = new Utilisateur($_POST['email'],$_POST['mdp']);
    $verif=$newUser->recupDB();

    //récupération de l'utilisateur avec email et mdp
    if($verif['connexion']){
        session_start();
        $_SESSION['connexion']=true;
        $_SESSION['idUtilisateur']=$newUser->getIdUtilisateur();
        if($newUser->getIdUtilisateur()==0){
            //redirection admin
            header('Location: admin.php');
            exit();
        }
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
    }
}
//redirection vers la page home en cas de problème
header('Location: connexion_form.php?pb=1');  