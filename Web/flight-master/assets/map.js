var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



// navigator.geolocation.getCurrentPosition(function (position) {

//     map.setView([position.coords.latitude, position.coords.longitude], 13);

//     var mark = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
// });

var featureG = L.featureGroup();
featureG.addTo(map);

/*
Vue.createApp({
    data() {
      return {
        message: '', 
      };
    },
    methods:{
        submit(){
            featureG.clearLayers();
            fetch('http://api-adresse.data.gouv.fr/search/?q='+this.message)
            .then(result => result.json())
            .then(r => {
                r.features.forEach(element => {
                    var mark2 = L.marker(element.geometry.coordinates.reverse()).addTo(featureG);
                });
                map.fitBounds(featureG.getBounds())
            }) 
        }
    }
  }).mount('#entete');


  Vue.createApp({
    data() {
        return {
            message: '',
            villes: [],
        };
    },
    methods: {
        submit() {
            fetch('http://localhost/villes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    recherche: this.message,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    this.villes = data;
                })
                .catch(error => {
                    console.error('Erreur lors de la requête AJAX', error);
                });
        },
        selectVille(insee) {
            // Ajoutez ici le code pour récupérer la géométrie de la ville
            // et l'intégrer dans la carte
            console.log('Sélection de la ville avec insee :', insee);
        },
    },
    watch: {
        message: function () {
            this.submit();
        },
    },
}).mount('#entete');
*/

Vue.createApp({
    data() {
        return {
            message: '',
            villes: [],
        };
    },
    methods: {
        submit() {
            fetch('/villes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    recherche: this.message,
                }),
            })
            .then(response => response.json())
            .then(data => {
                this.villes = data;
            })
            .catch(error => {
                console.error('Erreur lors de la requête AJAX', error);
            });
        },
        selectVille(insee) {
            // Add code to fetch geometry based on insee and integrate it into the map
            console.log('Sélection de la ville avec insee :', insee);
        },
    },
    watch: {
        message: function () {
            this.submit();
        },
    },
}).mount('#entete');




