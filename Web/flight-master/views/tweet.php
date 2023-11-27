<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Tweetbox Twitter X</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link rel="stylesheet" href="assets/styletweet.css">
</head>

<body>

    <div id="app">
        <div class="tweetbox">
            <div class="tweetbox-header">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/1245px-Logo_of_Twitter.svg.png" alt="Twitter Logo">
                <h2>Envoyez un Tweet !</h2>
            </div>

            <form @submit.prevent="submitTweet">
                <textarea v-model="tweet" :class="{ 'red-text': isLimitReached }" placeholder="Exprimez-vous..."></textarea>
                <div class="tweetbox-actions">
                    <label>
                        <input type="checkbox" v-model="photo"> {{ photo ? 'Photo ajoutée' : 'Ajouter une photo' }}
                    </label>
                    <span>{{ charactersRemaining }} caractères restants</span>
                    <button type="submit" :disabled="isLimitReached">Tweeter</button>
                </div>
            </form>
        </div>

        <div v-for="(tweet, index) in tweets" :key="index" class="tweet">
            <div class="tweet-info">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/1245px-Logo_of_Twitter.svg.png" alt="Twitter Logo">
                <div class="user-info">
                    <span class="user-name">Utilisateur</span>
                    <span class="user-handle">@utilisateur</span>
                </div>
            </div>
            <p>{{ tweet.message }}</p>
            <img v-if="tweet.photo" :src="'https://picsum.photos/200/200?random=2' + tweet.photo" alt="Tweet Photo">
        </div>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                tweet: '',
                maxCharacters: 20,
                photo: false,
                tweets: []
            },
            computed: {
                charactersRemaining() {
                    return this.maxCharacters - (this.photo ? this.tweet.length + 2 : this.tweet.length);
                },
                isLimitReached() {
                    return this.charactersRemaining < 0;
                }
            },
            methods: {
                submitTweet() {
                    if (!this.isLimitReached && this.tweet.trim() !== '') {
                        this.tweets.unshift({
                            message: this.tweet,
                            photo: this.photo ? Math.floor(Math.random() * 100) : null
                        });
                        this.tweet = '';
                        this.photo = false;
                    }
                }
            }
        }); 
    </script>

</body>

</html>

