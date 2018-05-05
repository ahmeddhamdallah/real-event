<?php

$username = 'root';
$password = '';
global $connection ;

$connection = new PDO( 'mysql:host=localhost;dbname=final-news', $username, $password );


?>