<!DOCTYPE html>
    <head>
        <title>Concept</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
        <link rel="stylesheet" href="assets/styletweet.css">
        <style>
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
        <div id="app">
        <div class="tweetbox">
            <div class="tweetbox-header">
                <!--
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/1245px-Logo_of_Twitter.svg.png" alt="Twitter Logo">
                -->
                <h2>Comment définir ce concept ?</h2>
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
    <div class="nav">
        <a href="/" class="back-button">Retour</a>
        <a href="/data" class="next-button">Suite</a>
    </div>
    
    <script src="assets/tweet.js"></script>

    </body>
</html>