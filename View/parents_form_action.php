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
    echo("Nouvel phrase :".str_replace("'", " ", $_POST['info'])."<br>");
    $newParents = new Parents($_POST['ville'], str_replace("'", " ", $_POST['info']));
    $verif=$newParents->addDB();
    //si la nounou est bien ajouté
    if($verif){
        echo("<pre>");        
        header('Location: home.php');
        exit();
    }
}
echo("<pre>");
//redirection vers la page welcome en cas de problème
//header('Location: welcome.php');s
?>