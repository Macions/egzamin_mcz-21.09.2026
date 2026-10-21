function skryptP() {
	let wiadomoscW = document.getElementById("wiadomoscW").value;
	let sekcja = (document.querySelector(".chat").innerHTML +=
		`    <article id="jolanta">                   
         <img src="Jolka.jpg" alt="">
                    <p>${wiadomoscW}</p>
                          </article>`);
}

function skryptD() {
	let odpowiedzi = [
		"Świetnie!",
		"Kto gra główną rolę?",
		"Lubisz filmy Tego reżysera?",
		"Będę 10 minut wcześniej",
		"Może kupimy sobie popcorn?",
		"Ja wolę Colę",
		"Zaproszę jeszcze Grześka",
		"Tydzień temu też byłem w kinie na Diunie",
		"Ja funduję bilety",
	];
	let losowanaliczba = Math.floor(Math.random() * odpowiedzi.length);

	let sekcja = (document.querySelector(".chat").innerHTML +=
		`       <article id="krzysiek">
                    <img src="Krzysiek.jpg" alt="">
                    <p>${odpowiedzi[losowanaliczba]}</p>
                </article>`);
}
