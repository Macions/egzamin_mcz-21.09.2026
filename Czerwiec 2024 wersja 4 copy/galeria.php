<?php
$conn = mysqli_connect("localhost", "root", "", "galeria");

if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

$zapytanie1 = mysqli_query(
    $conn,
    "SELECT plik, tytul, polubienia, a.imie AS imie, a.nazwisko AS nazwisko
     FROM zdjecia
     JOIN autorzy a ON autorzy_id = a.id
     ORDER BY a.nazwisko ASC"
);

$zapytanie2 = mysqli_query(
    $conn,
    "SELECT tytul, plik
     FROM zdjecia
     WHERE polubienia >= 100"
);

mysqli_close($conn);
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
            if (mysqli_num_rows($zapytanie1) > 0) {
                while ($row = mysqli_fetch_assoc($zapytanie1)) {
                    if ($row['polubienia'] > 40) {
                        $polubienia = '<p>Autor: ' . htmlspecialchars($row["imie"]) . ' ' . htmlspecialchars($row["nazwisko"]) . '.<br>Wiele osób polubiło ten obraz</p>';
                    } else {
                        $polubienia = '<p>Autor: ' . htmlspecialchars($row["imie"]) . ' ' . htmlspecialchars($row["nazwisko"]) . '</p>';
                    }

                    echo '
                    <article>
                        <img src="' . htmlspecialchars($row['plik']) . '" alt="zdjęcie">
                        <h3>' . htmlspecialchars($row['tytul']) . '</h3>
                        ' . $polubienia . '
                        <a href="' . htmlspecialchars($row["plik"]) . '" download>Pobierz</a>
                    </article>
                    ';
                }
            }
            ?>
        </section>
        <section id="prawy">
            <h2>Najbardziej lubiane</h2>
            <?php
            if (mysqli_num_rows($zapytanie2) > 0) {
                while ($row = mysqli_fetch_assoc($zapytanie2)) {
                    echo "<img src='" . htmlspecialchars($row['plik']) . "' alt='" . htmlspecialchars($row['tytul']) . "'>";
                }
            }
            ?>
            <p><strong>Zobacz wszystkie nasze zdjęcia</strong></p>
        </section>
    </main>
    <footer>
        <h5>
            Stronę wykonał: 00000000000
        </h5>
    </footer>
</body>

</html>