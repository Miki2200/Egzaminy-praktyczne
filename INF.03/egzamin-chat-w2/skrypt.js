$$ = function(id){
    var el = document.getElementById(id);
    return el;
}


function wyslij(){
    var wiadomosc = $$('inp').value;
    var nowaWiadomosc = document.createElement('section');
    nowaWiadomosc.classList.add('jola');
    var obrazek = document.createElement('img');
    obrazek.src = "Jolka.jpg";
    const paragraf = document.createElement('p');
    paragraf.textContent = wiadomosc;
    nowaWiadomosc.appendChild(obrazek);
    nowaWiadomosc.appendChild(paragraf);
    $$('art').appendChild(nowaWiadomosc);
    $$('inp').value = '';
}
const wypowiedziKrzysztofa = [
    "Świetnie!",
    "Kto gra główną rolę?",
    "Lubisz filmy Tego reżysera?",
    "Będę 10 minut wcześniej",
    "Może kupimy sobie popcorn?",
    "Ja wolę Colę",
    "Zaproszę jeszcze Grześka",
    "Tydzień temu też byłem w kinie na Diunie",
    "Ja funduję bilety"
];
function generujOdpowiedz(){
    const losowyIndeks = Math.floor(Math.random() * wypowiedziKrzysztofa.length);
    const odpowiedz = wypowiedziKrzysztofa[losowyIndeks];
    const nowaOdpowiedz = document.createElement('section');
    nowaOdpowiedz.classList.add('krzysztof');
    const obrazek = document.createElement('img');
    obrazek.src = "Krzysiek.jpg";
    const paragraf = document.createElement('p');
    paragraf.textContent = odpowiedz;
    nowaOdpowiedz.appendChild(obrazek);
    nowaOdpowiedz.appendChild(paragraf);
    const miejsce = document.getElementById('art');
    miejsce.appendChild(nowaOdpowiedz);
}