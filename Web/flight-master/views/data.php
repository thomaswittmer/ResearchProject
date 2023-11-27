<!DOCTYPE html>
<html>
<head>
    <title>Données</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link rel="stylesheet" href="assets/styletweet.css">
    <style>
        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
            color: #333;
        }
    
       



        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            display: flex;
            flex-direction: row;
        }

        #left-section, #right-section {
            box-sizing: border-box;
            padding: 20px;
        }

        #left-section {
            flex :1;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

       
        #app {
            display: flex;
        }


        #left-section {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


    </style>
</head>
<body>
<div id="right-section">
    <h1>Classes de la BD UNI</h1>
    <form action="" method="post">
        <label for="selectTheme">Sélectionnez un thème :</label>
        <select id="selectTheme" name="selectedTheme">
            <?php foreach ($data as $theme): ?>
                <option value="<?php echo $theme['theme']; ?>"><?php echo $theme['theme']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Afficher">
    </form>
    
    <div id="result-section"></div>

    <script>
        // Attacher un gestionnaire d'événement au changement de la sélection du thème
        $('#selectTheme').change(function() {
            // Récupérer la valeur sélectionnée
            var selectedTheme = $(this).val();

            // Envoyer une requête AJAX pour récupérer les objets associés
            $.ajax({
                url: 'objets-selected',
                type: 'POST',
                data: { 'selectedTheme': selectedTheme },
                success: function(data) {
                    console.log('Succès !', data);
                    $('#result-section').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Erreur !', textStatus, errorThrown);
                }
            });
        });
    </script>
</div>


    
    <script src="assets/tweet.js"></script>
    </div>
</body>
</html>
