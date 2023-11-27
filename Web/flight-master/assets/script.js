let coords1 = [[[[48.857757564566924,2.339316137485028],[48.856806083163775,2.3410084512700275],[48.85500429223433,2.3431007664951173],[48.85424556800601,2.3448607983431384],[48.85346104822773,2.3470146522513193],[48.852722069967,2.348637735017842],[48.852246283670866,2.3498685086796596],[5.513516521235,3.512416589454425],[48.85158827389591,2.352683903431068],[48.85202863524094,2.352391594686386],[48.85372424333016,2.3520685166001587],[48.8546352926156,2.3512762060553634],[48.85546534530812,2.3495454305934325],[48.855769019683805,2.3483223492670007],[48.85667497062573,2.3452915691247744],[48.857282302859346,2.3412992470592533],[48.857757564566924,2.339316137485028]]],[[[48.85374747782521,2.3530207906753438],[48.85253332128681,2.3532408660072544],[48.85163103910017,2.353884163131301],[48.85105178764471,2.3558479122468126],[48.849893264629145,2.3592336865839],[48.84948109132219,2.360317134371768],[48.85032771390132,2.36001241468143],[48.85104064812796,2.3601478456549136],[48.85167559662685,2.35960612176098],[48.85373633890825,2.353410154724109],[48.85374747782521,2.3530207906753438]]]]

function arrondiNombre(nb){
    return Number(nb).toFixed(5);
}

function reverseCoords(coords){
    return coords.reverse();
}

function filtreCoords(coords){
    if(coords[0] < 48.84 || coords[0] > 48.86){
        return false;
    }else{
        return true;
    }
}

let result = coords1.map(el => {
    return el.map(el2 => {
        r = el2.filter(filtreCoords);
        return r.map(el3 => {
            reverseCoords(el3);
            return el3.map(el4 => {
                return parseFloat(arrondiNombre(el4));
            })
        });
    });
});

// console.log(result);

// console.log(JSON.stringify(result));



let heure = document.getElementById('heure');

function loop () {
    let heureLocale = new Date().toLocaleTimeString('fr');
    heure.innerText = heureLocale;
    if (heureLocale.substring(7)==0){
        heure.classList.add('red');
    }else{
        heure.classList.remove('red');
    };
    setTimeout(loop, 1000);
}
  
loop();
function toto(){
    console.log("L'événement click a été déclenché");
}
heure.addEventListener("click", toto);

let bout = document.getElementById('bouton');
let nHeure = document.getElementById('nvlheure');

bout.addEventListener('click', function(){
    let nh = Intl.supportedValuesOf('timeZone')[Math.floor(Math.random()*Intl.supportedValuesOf('timeZone').length)];

    let newHeure = new Date().toLocaleTimeString('fr', { timeZone: nh });
    
    nHeure.innerText = nh + ' ' + newHeure;
});



Vue.createApp({
    data() {
      return {
        message: 'Hello Vue !',
        cochee: true,
      };
    },
    computed: {
        reversedMessage () {
          // `this` pointe sur l'instance Vue
          return this.message.split('').reverse().join('');
        },
      },
      methods: {
        hello () {
          console.log('Hello !');
        },
        submit(event){
            event.preventDefault();
            console.log("coucou");
        },
      },
}).mount('#app');

Vue.createApp({
    data() {
      return {
        max:20,
        message:'toto',
        errors:'',
        cochee: false,
        tweets:[],
      };
    },
    computed: {
        nombreRestants (){
            if(this.cochee){
                return this.max - this.message.length - 3;
            }else{
                return this.max - this.message.length;
            }
            
        },
        change(){
            if(this.nombreRestants < 0){
                this.errors = 'red';
                return true;
            }else{
                this.errors = '';
                return false;
            }
        },
    },
    methods: {
        submit(){
            this.tweets.push({'msg':this.message, 'toph':'https://picsum.photos/200/200?random=2'});
            // this.tweets.push({'msg':this.message});
            // console.log(this.tweets);
        }
    },
}).mount('#app2');

navigator.geolocation.getCurrentPosition(function (position) {
    console.log(position.coords.latitude, position.coords.longitude, position.coords.altitude);
});