function przeslij() {
	let imie = document.getElementById("imie").value;
	let nazwisko = document.getElementById("nazwisko").value;
	let email = document.getElementById("email").value;
	let zgloszenie = document.getElementById("zgloszenie").value;
	let zapoznalem = document.getElementById("zapoznalem").checked;
	let komunikat = document.getElementById("komunikat");

	if (!zapoznalem) {
		komunikat.innerHTML = "Musisz zapoznać się z regulaminem";
		komunikat.style.color = "red";
		return 0;
	}

	let imieDuze = imie.toUpperCase();
	let nazwiskoDuze = nazwisko.toUpperCase();

	komunikat.innerHTML = `${imieDuze} ${nazwiskoDuze}<br>Treść Twojej sprawy: ${zgloszenie}`;
	komunikat.style.color = "navy";
}