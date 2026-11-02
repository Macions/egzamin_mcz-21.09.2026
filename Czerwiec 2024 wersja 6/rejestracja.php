<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="styl.css">
    <script src="skrypt.js" defer></script>
</head>

<body>
    <header>
        <h1>Formularz rejestracyjny konferencji <em>Nasze Kwiaty</em></h1>
    </header>
    <main>
        <form action="" onsubmit="event.preventDefault(); skrypt3();">
            <section id="daneOs">
                <h2>Dane osobowe</h2>
                <input type="text" id="imie" placeholder="Wpisz imię..." required>
                <input type="text" id="nazwisko" placeholder="Wpisz nazwisko..." required>
                <button type="button" onclick="skrypt1()">Następna karta</button>
            </section>

            <section id="daneKon" style="display: none;">
                <h2>Dane kontaktowe</h2>
                <input type="email" id="email" placeholder="Twój e-mail...">
                <input type="tel" id="tel" placeholder="Twój numer telefonu...">
                <button type="button" onclick="skrypt2()">Następna karta</button>
            </section>

            <section id="haslo" style="display: none;">
                <h2>Hasło do logowania</h2>
                <input type="password" id="hasloVal" placeholder="Podaj hasło">
                <input type="password" id="rephaslo" placeholder="Powtórz hasło">
                <button type="button" onclick="skrypt3()">Zatwierdź</button>
            </section>
        </form>
    </main>
    <footer>
        <video controls>
            <source src=" motyl.mp4" type="video/mp4">
            Przeglądarka nie obsługuje tego formatu
        </video>
    </footer>
    <footer>
        <h3>Plan konferencji</h3>
        <table>
            <tr>
                <td>9:00 - 12:00</td>
                <td>13:00 - 15:00</td>
            </tr>
            <tr>
                <td>Pielęgnacja roślin</td>
                <td>Targi kwiatowe</td>
            </tr>
        </table>
    </footer>
    <footer>
        <p><a href="https://kwiaty.pl">Internetowa kwiaciarnia</a></p>
    </footer>
    <footer>
        <p>Formularz wykonał: Maciej Czarnecki</p>
    </footer>
</body>

</html>