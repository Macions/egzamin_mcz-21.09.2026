let daneOs = document.getElementById("daneOs");
let daneKon = document.getElementById("daneKon");
let haslo = document.getElementById("haslo");

function skrypt1() {
	daneOs.style.display = "none";
	daneKon.style.display = "block";
}

function skrypt2() {
	daneKon.style.display = "none";
	haslo.style.display = "block";
}

function skrypt3() {
	let hasloValue = document.getElementById("hasloVal").value;
	let rephasloValue = document.getElementById("rephaslo").value;

	let imieValue = document.getElementById("imie").value;
	let nazwiskoValue = document.getElementById("nazwisko").value;

	if (hasloValue === rephasloValue) {
		console.log(
			`Witaj ${imieValue} ${nazwiskoValue}, Twoje hasło zostało ustawione.`,
		);
	} else {
		console.log("Hasła się różnią");
	}
}
