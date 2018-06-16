<?php
function message5Secondes($message, $declencheur){
    if(isset($_GET[$declencheur])){
            if($_GET[$declencheur]==1){         
                echo("
                    <div id='validation' class='alert alert-success' role='alert' style='display:none;'>
                        <p>$message</p>
                    </div>       
                ");
                echo('<script language="Javascript" type="text/Javascript">
                        jsValidation();
                    </script>');
            }
    }
}


function head($titre,$head){
  echo("
      <html>
        <head>
        <title>$titre</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='../include/bootstrap/css/bootstrap.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='../include/bootstrap/js/bootstrap.min.js'></script>
        $head
        </head>
  ");
}

function miseEnPageDébut(){
    echo("
            <body>
                <div class='container'>
                    <h1 class='text-center'>Bienvenue !</h1>
                    <div class='row'>
                        <div class='col-sm-4'>
                        </div>
                        <div class='col-sm-4'>


    ");
}

function miseEnPageFin(){
    echo("
                            </div>
                    </div>
                </div>
            </body>
         </html>
    ");
}