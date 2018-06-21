<?php
//page de redirection
session_start();

if (isset($_SESSION['nounouOUparents'])) {
    if ($_SESSION['nounouOUparents'] == 'nounou') {
        header('Location: homeNounou.php');
        exit();
    } else {
        header('Location: homeParents.php');
        exit();
    }
} else if (isset($_SESSION['admin'])){
    if ($_SESSION['admin']){
        header('Location: admin/admin.php');
        exit();
    }
} else {
    session_abort();
    header('Location: connexion_form.php');
    exit();
}
?>
