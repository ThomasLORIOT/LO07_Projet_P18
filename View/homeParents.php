<?php
    session_start();        
    include '../Objets/Utilisateur.php';
    $user=$_SESSION['idUtilisateur'];
    $user= new Utilisateur($_SESSION['idUtilisateur']);
    
?>

<!DOCTYPE html>
<!--
    Page home
    

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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#"><?php echo(ucfirst($_SESSION['nounouOUparents']))?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
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
              <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href='deconnexion.php'">Déconnexion</button>
            </div>
        </nav>

        <div class="container-fluid text-center">    
          <div class="row content">
            <div class="col-sm-2 sidenav">
              <p><a href="#">Link</a></p>
              <p><a href="#">Link</a></p>
              <p><a href="#">Link</a></p>
            </div>
            <div class="col-sm-8 text-left"> 
              <h1>Welcome</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <hr>
              <h3>Test</h3>
              <p>Lorem ipsum...</p>
            </div>
            <div class="col-sm-2 sidenav">
              <div class="well">
                <p>ADS</p>
              </div>
              <div class="well">
                <p>ADS</p>
              </div>
            </div>
          </div>
        </div>

    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>

    </body>
</html>
