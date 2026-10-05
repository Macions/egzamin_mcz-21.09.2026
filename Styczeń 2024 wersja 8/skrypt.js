function oblicz() {
	const radios = document.querySelectorAll('input[name="opcja"]');

	let cena = 0;
	let cenaDlugie = 50;
	let cenaPoldlugie = 40;
	let cenaSrednie = 30;
	let cenaKrotkie = 25;

	if (radios[3].checked) {
		cena = cenaDlugie;
	}
	if (radios[2].checked) {
		cena = cenaPoldlugie;
	}
	if (radios[1].checked) {
		cena = cenaSrednie;
	}
	if (radios[0].checked) {
		cena = cenaKrotkie;
	}
	const wynik = document.querySelector(".wynik");
	wynik.innerHTML = `cena promocyjna: ${cena - 10}`;
}
