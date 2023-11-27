<?php
session_start();

require 'flight/Flight.php';

Flight::route('/', function(){
    Flight::render('acceuil');
});

Flight::route('/obstacle', function(){
    Flight::render('obstacle');
});

Flight::start();
?>
