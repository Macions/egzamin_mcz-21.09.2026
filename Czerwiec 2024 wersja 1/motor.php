<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "motory";

$conn = new mysqli($hostname, $username, $password, $db_name);

if (!$conn) {
    echo "błąd połączenia";
}

$zapytanie1 = $conn->query("SELECT w.nazwa as nazwa , w.opis as opis, w.poczatek as poczatek, z.zrodlo as zrodlo FROM wycieczki w JOIN zdjecia z ON w.zdjecia_id = z.id");
$zapytanie2 = $conn->query("SELECT COUNT(id) AS liczba FROM wycieczki");

$wycieczki = 0;
if ($zapytanie2 && $zapytanie2->num_rows > 0) {
    $row = $zapytanie2->fetch_assoc();
    $wycieczki = $row['liczba'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <img src="motor.png" alt="motocykl">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>

    <section class="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
            if ($zapytanie1->num_rows > 0) {
                while ($row = $zapytanie1->fetch_assoc()) {
                    echo "<dt>";
                    echo $row["nazwa"] . ", rozpoczyna się w " . $row['poczatek'];
                    echo "<a href='" . $row['zrodlo'] . ".jpg'>zobacz zdjęcie</a>";
                    echo "</dt>";

                    echo "<dd>";
                    echo $row["opis"];
                    echo "</dd>";


                }
            }
            ?>
        </dl>
    </section>
    <section class="prawe">
        <article>
            <h2>Co kupić?</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </article>
        <article>
            <h2>Statystyki</h2>
            <p>Wpisanych wycieczek: <?php echo $wycieczki; ?></p>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych 1300</p>
        </article>
    </section>
    <footer>
        <p>Stronę wykonał: Maciej Czarnecki (czas wykonywania: 40 minut)</p>
    </footer>
</body>

</html>