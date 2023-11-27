<?php
// Connexion à la base de données (à adapter selon vos paramètres)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Pomme";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer le thème sélectionné
if (isset($_POST['selectedTheme'])) {
    $selectedTheme = $_POST['selectedTheme'];

    // Préparer la requête SQL pour récupérer les objets associés au thème
    $sql = "SELECT DISTINCT nom FROM indexg__o__1 WHERE theme = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedTheme);

    // Exécuter la requête SQL
    $stmt->execute();

    // Lié le résultat
    $stmt->bind_result($nom);

    // Afficher les noms des objets
    while ($stmt->fetch()) {
        echo "<p>$nom</p>";
    }

    // Fermer le statement
    $stmt->close();
} else {
    echo "Aucun thème sélectionné.";
}

// Fermer la connexion à la base de données
$conn->close();
?>


