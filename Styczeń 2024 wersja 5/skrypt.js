function oblicz() {
	let peeling = document.getElementById("peeling").checked;
	let maska = document.getElementById("maska").checked;
	let masaz = document.getElementById("masaz").checked;
	let makijaz = document.getElementById("makijaz").checked;

	let wynik = document.getElementById("wynik");

	let suma = 0;
	if (peeling) {
		suma += 45;
	}
	if (maska) {
		suma += 30;
	}
	if (masaz) {
		suma += 20;
	}
	if (makijaz) {
		suma += 50;
	}

	wynik.innerHTML = `Cena zabiegów: ${suma}`;
}
