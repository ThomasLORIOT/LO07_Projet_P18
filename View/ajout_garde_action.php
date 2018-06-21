<?php
session_start();
require_once '../Objets/Utilisateur.php';
require_once '../Objets/Nounou.php';
require_once '../Functions/Functions_Formulaires.php';
require_once '../Functions/Functions.php';
$user = $_SESSION['idUtilisateur'];
$user = new Utilisateur($_SESSION['idUtilisateur']);
$nounou = new Nounou($user->getIdNounous());
if (isset($_POST['date']) && isset($_POST['heureDébut']) && isset($_POST['heureFin']) && isset($_POST['langue']) && isset($_POST['enfantsMax'])) {
    //crée l'horaire et la'ajouter à la DB, ne s'ajoute que si elle n'existe pas
    $horaire = new Horaires($_POST['date'], $_POST['heureDébut'], $_POST['heureFin']);
    $horaire->addDB();
    //recupérer l'id de l'horaire 
    $myDB = connectDB();
    $requete = "SELECT idHoraires FROM horaires WHERE Date = '" . $_POST['date'] . "' AND `Heure Début` = '" . $_POST['heureDébut'] . "' AND `Heure Fin` = '" . $_POST['heureFin'] . "'";
    $res2 = $myDB->query($requete);
    $id = mysqli_fetch_assoc($res2);
    $horaire->setIdHoraires($id['idHoraires']);
    //crée la garde et l'ajoute à la DB
    $garde = new Garde($nounou->getIdNounous(), $horaire->getIdHoraires(), $_POST['langue'], $_POST['enfantsMax']);
    if ($garde->addDB()) {
        header('Location: ajout_garde.php?ajout=1');
        exit();
    } else {
        header('Location: ajout_garde.php?non=1');
        exit();
    }
} else {
    header('Location: ajout_garde.php?vide=1');
    exit();
}
?>