<?php
session_start();

require 'flight/Flight.php';

$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "root";
$baseDeDonnees = "Pomme";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

Flight::route('/', function(){
    Flight::render('accueil');
});

Flight::route('/concept', function(){
    Flight::render('concept');
});


Flight::route('/definition', function(){
    Flight::render('definition');
});

Flight::route('/tweet', function(){
    Flight::render('tweet');
});

Flight::route('/objets-selected', function(){
    Flight::render('objets-selected');
});


Flight::route('/data', function(){
    global $connexion;

    // Assuming 'table_name' is the name of your table
    $result = $connexion->query("SELECT DISTINCT theme FROM indexg__o__1 WHERE theme NOT LIKE 'ME%' ORDER BY theme ASC");

    if ($result) {
        // Fetch all rows from the result set
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Render the 'data' template and pass the data to it
        Flight::render('data', ['data' => $data]);
    } else {
        // Handle error if the query fails
        echo "Error: " . $connexion->error;
    }
});

/*
Flight::route('/combined', function(){
    global $connexion;

    // Assuming 'table_name' is the name of your table
    $result = $connexion->query("SELECT DISTINCT `COL 1` FROM indexg__o__1");

    if ($result) {
        // Fetch all rows from the result set
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Render the 'combined' template and pass the data to it
        Flight::render('combined', ['combined' => $data]);
    } else {
        // Handle error if the query fails
        echo "Error: " . $connexion->error;
    }
});
*/

Flight::start();
?>
