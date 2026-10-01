<?php
$hostname = "localhost";
$username = "root";
$userpasswd = "";
$db_name = "podroze";

$conn = new mysqli($hostname, $username, $userpasswd, $db_name);

if (!$conn) {
    dir($con > mysqli_connect_error());
}

$zapytanie1 = $conn->query("SELECT nazwaPliku, podpis FROM zdjecia order by podpis asc");
$zapytanie2 = $conn->query("SELECT cel, dataWyjazdu from wycieczki where dostepna = 0;");

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
</head>

<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <section class="lewy">
        <h2>Promocje</h2>
        <table>
            <tr>
                <td>Warszawa</td>
                <td>od 600 zł</td>
            </tr>
            <tr>
                <td>Wenecja</td>
                <td>od 1200 zł</td>
            </tr>
            <tr>
                <td>Paryż</td>
                <td>od 1200 zł</td>
            </tr>
        </table>
    </section>
    <section class="srodkowy">
        <h2>W tym roku jedziemy do...</h2>
        <p class="efekt">
            <?php
            if ($zapytanie1->num_rows > 0) {
                while ($row = $zapytanie1->fetch_assoc()) {
                    echo "<img src='" . $row['nazwaPliku'] . "' alt='" . $row['podpis'] . "' title='" . $row['podpis'] . "'>";
                }
            }
            ?>
        </p>
    </section>
    <section class="prawy">
        <h2>Kontakt</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 444555666</p>
    </section>
    <section class="dane">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>

            <?php
            if ($zapytanie2->num_rows > 0) {
                while ($row = $zapytanie2->fetch_assoc()) {
                    echo "<li>";
                    echo "Dnia " . $row['dataWyjazdu'] . " pojechaliśmy do " . $row['cel'];
                    echo "</li>";
                }
            }
            ?>
        </ol>
    </section>
    <footer>
        <p>
            Stronę wykonał: Maciej Czarnecki (czas wykonywania: 35 minut)
        </p>
    </footer>
</body>

</html>