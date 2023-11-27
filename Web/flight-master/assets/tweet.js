new Vue({
    el: '#app',
    data: {
        tweet: '',
        maxCharacters: 200,
        photo: false,
        tweets: [
            { photo: null, likes: 0 },
        ]
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
                    photo: this.photo ? Math.floor(Math.random() * 100) : null,
                    likes: 0  // Ajout de la propriété likes lors de l'ajout du tweet
                });
                this.tweet = '';
                this.photo = false;
            }
        },
        likeTweet(index) {
            this.tweets[index].likes++;
        }
    }
});
