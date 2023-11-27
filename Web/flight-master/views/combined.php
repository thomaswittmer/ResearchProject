<!DOCTYPE html>
<html>
<head>
    <title>Données</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link rel="stylesheet" href="assets/styletweet.css">
    <style>
        /*body {
            font-family: 'Arial', sans-serif;
            margin: 50px;
            background-color: #f0f8ff;
        }*/

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
            flex: 1;
            height: 100vh;
            overflow: hidden;
            box-sizing: border-box;
            padding: 20px;
        }

        #left-section {
            flex :1;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #right-section {
            flex :2;
            background-color: #f0f8ff;
        }

        #app {
            display: flex;
        }

        #left-section, #right-section {
            flex: 1;
            height: 100vh;
            overflow: hidden;
            box-sizing: border-box;
        }

        #left-section {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #right-section {
            background-color: white;
        }

    </style>
</head>
<body>
    <div id="left-section">
    <div id="app">
        <div class="tweetbox">
            <div class="tweetbox-header">
                <!--
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/1245px-Logo_of_Twitter.svg.png" alt="Twitter Logo">
                -->
                <h2>Où trouver des informations dans les bases de données ?</h2>
            </div>

            <form @submit.prevent="submitTweet">
                <textarea v-model="tweet" :class="{ 'red-text': isLimitReached }" placeholder="Exprimez-vous..."></textarea>
                <div class="tweetbox-actions">
                    <!-- <label>
                        <input type="checkbox" v-model="photo"> {{ photo ? 'Photo ajoutée' : 'Ajouter une photo' }}
                    </label> -->
                    <span>{{ charactersRemaining }} caractères restants</span>
                    <button type="submit" :disabled="isLimitReached">Publier</button>
                </div>
            </form>
        </div>

        <div v-for="(tweet, index) in tweets" :key="index" class="tweet">
            <div class="tweet-info">
                <div class="user-info">
                    <span class="user-name">Thomas Wittmer</span>
                </div>
            </div>
            <p>{{ tweet.message }}</p>
            <button @click="likeTweet(index)">Like</button>
            <span>{{ tweet.likes }} Likes</span>
        </div>
    </div>

    <div id="right-section">
        <h1>Données</h1>
        <form action="" method="post">
            <label for="selectNom">Sélectionnez un objet :</label>
            <select id="selectNom" name="selectedNom">
            <?php foreach ($data as $row): ?>
                <option value="<?php echo $row['nom']; ?>"><?php echo $row['nom']; ?></option>
            <?php endforeach; ?>
            </select>
            <input type="submit" value="Afficher">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if a value is selected
                if (isset($_POST['selectedNom'])) {
                    $selectedValue = $_POST['selectedNom'];
                    echo "<p>Vous avez sélectionné : $selectedValue</p>";
                } else {
                    echo "<p>Aucune valeur sélectionnée.</p>";
                }
            }
        ?>
    </div>

    
    <script src="assets/tweet.js"></script>
    </div>
</body>
</html>
