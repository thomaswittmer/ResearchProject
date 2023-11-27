<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de l'Ajout du Concept Écologique</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .result-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .nav{
            display : flex;
            flex-direction: row;
            justify-content: space-around;
            padding: 40px;
        }

        .back-button, .next-button {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
            color: white;
            width: 150px;
        }

        .back-button {
            background-color: #e74c3c;
            border: 2px solid #c0392b;
            margin-right: 10px;
        }

        .next-button {
            background-color: #2ecc71;
            border: 2px solid #27ae60;
        }

        .back-button:hover, .next-button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <div class="result-container">
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

    // Définir $conceptIdToDelete à une valeur par défaut
    $conceptIdToDelete = null;

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $definition = $_POST['definition'];

        // Préparer la requête SQL avec une requête préparée
        $sql = "INSERT INTO ConceptEcologue (nom, definition) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nom, $definition);

        // Exécuter la requête SQL
        if ($stmt->execute()) {
            echo "Concept écologique ajouté avec succès!";

            // Récupérer l'ID généré pour le nouveau concept
            $conceptId = $conn->insert_id;
            $conceptIdToDelete = $conceptId;
        } else {
            echo "Erreur lors de l'ajout du concept : " . $conn->error;
        }

        // Fermer la connexion à la base de données
        $stmt->close();
    }

    // Fermer la connexion à la base de données
    $conn->close();
    ?>
    </div>

    <div class="nav">
        <a href="?delete=<?php echo $conceptIdToDelete; ?>" class="back-button">Retour</a>
        <a href="/definition" class="next-button">Suite</a>
    </div>

</body>
</html>
