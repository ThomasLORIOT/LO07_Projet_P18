<?php

function message5Secondes($message, $declencheur){
    
    echo("
        <div id='validation' class='alert alert-success' role='alert' style='display:none;'>
            <p>$message</p>
        </div>       
    ");
    
    if(isset($_GET[$declencheur])){
            if($_GET[$declencheur]==1){
                echo('<script language="Javascript" type="text/Javascript">
                        jsValidation();
                    </script>');
            }
    }
    
    
}