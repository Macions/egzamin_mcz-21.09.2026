<?php
$hostname = "localhost";
$username = "root";
$passwd = "";
$db_name = "galeria";

$conn = new mysqli($hostname, $username, $passwd, $db_name);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$zapytanie1 = $conn->query("SELECT plik, tytul, polubienia, a.imie as imie, a.nazwisko as nazwisko FROM zdjecia JOIN autorzy a ON autorzy_id=a.id ORDER BY a.nazwisko ASC");
$zapytanie2 = $conn->query("SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100");

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <main>
        <section id="lewy">
            <h2>Tematy zdjęć</h2>
            <ol>
                <li>Zwierzęta</li>
                <li>Krajobrazy</li>
                <li>Miasta</li>
                <li>Przyroda</li>
                <li>Samochody</li>
            </ol>
        </section>
        <section id="srodek">
            <?php
            if ($zapytanie1->num_rows > 0) {
                while ($row = $zapytanie1->fetch_assoc()) {
                    if ($row['polubienia'] > 40) {
                        $polubienia = '<p>Autor: ' . htmlspecialchars($row["imie"]) . ' ' . htmlspecialchars($row["nazwisko"]) . '.<br>Wiele osób polubiło ten obraz</p>';
                    } else {
                        $polubienia = '<p>Autor: ' . htmlspecialchars($row["imie"]) . ' ' . htmlspecialchars($row["nazwisko"]) . '</p>';
                    }
                    echo '<article>
                    <img src="' . htmlspecialchars($row['plik']) . '" alt="zdjęcie">
                    <h3>' . htmlspecialchars($row['tytul']) . '</h3>
                    ' . $polubienia . '
                    <a href="' . htmlspecialchars($row["plik"]) . '" download>Pobierz</a>
                    </article>';
                }
            }
            ?>
        </section>
        <section id="prawy">
            <h2>Najbardziej lubiane</h2>
            <?php
            if ($zapytanie2->num_rows > 0) {
                while ($row = $zapytanie2->fetch_assoc()) {
                    echo "<img src='" . $row['plik'] . "' alt='" . $row['tytul'] . "'>";
                }
            }
            ?>
            <p><strong>Zobacz wszystkie nasze zdjęcia</strong></p>
        </section>
    </main>
    <footer>
        <h5>
            Stronę wykonał: Maciej Czarnecki (czas wykonania: )
        </h5>
    </footer>
</body>

</html>