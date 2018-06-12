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