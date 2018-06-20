<?php
include '../Objets/Utilisateur.php';
include '../Objets/Parents.php';
include '../Objets/Nounou.php';
include '../Functions/Functions_Formulaires.php';
include '../Functions/Functions.php';
?>

<!DOCTYPE html>
<!--
    Page home
    

-->
<html>
    <head>
        <title>Informations nounou</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--load jquery avant js -->
        <script src="../include/bootstrap/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="../Functions/Functions_JS.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href = 'deconnexion.php'">Déconnexion</button>
            </div>
        </nav>

        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <button class="btn btn-dark" onclick="location.href = 'home.php'">Retour</button>
                </div>
                <div class="col-sm-8 text-left"> 
                    <h1>Informations de la nounou :</h1>
                    <hr>
                    <?php
                    if (isset($_POST['idNounou'])) {
                        $temp = $_POST['idNounou'];
                        $requete = "SELECT Prénom, Portable, Age, Présentation, Expérience FROM nounous WHERE idNounous= $temp";
                        $myDB = connectPDO();
                        $result = $myDB->query($requete);
                        $nounou[0] = $result->fetch(PDO::FETCH_ASSOC);
                        affiche($nounou);
                    } else {
                        echo("formulaire érroné, nous n'avons pas pu afficher les informations");
                    }
                    ?>
                    <hr>
                    <h3>Appréciations des gardes faites :</h3>
                    <?php
                    if (isset($_POST['idNounou'])) {
                        $temp = $_POST['idNounou'];
                        $requete = "SELECT Appreciation, Note FROM garde WHERE idNounous= $temp";
                        $myDB = connectPDO();
                        $result = $myDB->query($requete);
                        $i = 0;
                        $garde = array();
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $garde[$i]['Appreciation'] = $row['Appreciation'];
                            $garde[$i]['Note sur 5 Biberons']=$row['Note'];
                            $i++;
                        }
                        affiche($garde);
                    } else {
                        echo("formulaire érroné, nous n'avons pas pu afficher les informations");
                    }
                    ?>
                </div>
                <div class="col-sm-2 sidenav">
                    <div class="well">


                    </div>
                    <div class="well">

                    </div>
                </div>
            </div>
        </div>

        <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2018 Copyright : Créé par Thomas Loriot et Vladimir Trois
            </div>
            <!-- Copyright -->
        </footer>

    </body>
</html>