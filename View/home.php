<?php
    session_start();
    include '../Objets/Utilisateur.php';
    $user=$_SESSION['idUtilisateur'];
    echo($_SESSION['idUtilisateur']);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>HomePage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../Functions/Functions_JS.js"></script>
    </head>
    <body>
        <div>
        Home Page man !!!!!!!!!!!!! :D
        
        Bienvenue à toi jeune padawen ton login est <?php echo( $_SESSION['idUtilisateur'] ."<br>". $user) ?>
        
        </div>
    </body>
</html>
