<?php

try{
    $host = '127.0.0.1';
    $dbname = 'c9';
    $user = 'antho97';
    $password = '';
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $password);
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>