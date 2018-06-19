<?php
session_start();
if (isset($_SESSION['nounouOUparents'])) {
    if ($_SESSION['nounouOUparents'] == 'nounou') {
        header('Location: homeNounou.php');
        exit();
    } else {
        header('Location: homeParents.php');
        exit();
    }
} else {
    session_abort();
    header('Location: connexion_form.php?pb=1');
    exit();
}
?>
