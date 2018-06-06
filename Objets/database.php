<?php
define ('USER','root');
define('PASSEWORD','');
define('HOST','localhost');
define('BD_NAME','nounou');

$myDB= mysqli_connect(HOST, USER, PASSEWORD, BD_NAME) or 
        die ('Impossible de se connecter à la MySql : '+mysqli_connect_error());


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

