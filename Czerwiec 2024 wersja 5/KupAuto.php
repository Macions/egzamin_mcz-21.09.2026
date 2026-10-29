<?php
$hostname = "localhost";
$username = "root";
$db_passwd = "";
$db_name = "kupauto";

$conn = new mysqli($hostname, $username, $db_passwd, $db_name);

if ($conn->connect_error) {
    die("Błąd: " . $conn->connect_error);
}

$zapytanie1 = $conn->query("SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id=10");
$zapytanie2 = $conn->query("SELECT m.nazwa, model, rocznik,cena, zdjecie FROM samochody JOIN marki m ON marki_id=m.id WHERE wyrozniony=1 LIMIT 4");
$zapytanie3 = $conn->query("SELECT nazwa FROM marki;");
$zapytanie4 = null;

if (isset($_GET['marka']) && !empty($_GET['marka'])) {
    $marka = $conn->real_escape_string($_GET['marka']);
    $zapytanie4 = $conn->query("SELECT m.nazwa, s.model, s.cena, s.zdjecie FROM samochody s JOIN marki m ON s.marki_id=m.id WHERE m.nazwa = '$marka'");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>
    <section id="p">
        <?php
        if ($zapytanie1->num_rows > 0) {
            while ($row = $zapytanie1->fetch_assoc()) {
                echo '<img src="' . htmlspecialchars($row['zdjecie']) . '" alt="oferta dnia">'
                    . '<h4>Oferta Dnia: Toyota ' . htmlspecialchars($row['model']) . '</h4>'
                    . '<p>Rocznik: ' . htmlspecialchars($row['rocznik'])
                    . ', przebieg: ' . htmlspecialchars($row['przebieg'])
                    . ', rodzaj paliwa: ' . htmlspecialchars($row['paliwo']) . '</p>
                    <h4>Cena: ' . $row["cena"] . '</h4>';
            }
        }
        ?>
    </section>
    <section>
        <h2>Ofert Wyróżnione</h2>
        <div style="display: flex;">
            <?php
            if ($zapytanie2->num_rows > 0) {
                while ($row = $zapytanie2->fetch_assoc()) {
                    echo '<div>'
                        . '<img src="' . htmlspecialchars($row['zdjecie']) . '" alt="' . htmlspecialchars($row['model']) . '">'
                        . '<h4>' . htmlspecialchars($row['nazwa']) . ' ' . htmlspecialchars($row['model']) . '</h4>'
                        . '<p>Rocznik: ' . htmlspecialchars($row['rocznik']) . '</p>'
                        . '<h4>Cena: ' . htmlspecialchars($row['cena']) . '</h4>'
                        . '</div>';
                }
            }
            ?>
        </div>
    </section>
    <section>
        <h2>Wybierz markę</h2>
        <form method="get">
            <select name="marka" required>
                <option value="" selected>Wybierz markę</option>
                <?php
                if ($zapytanie3->num_rows > 0) {
                    while ($row = $zapytanie3->fetch_assoc()) {
                        echo '<option value="' . htmlspecialchars($row['nazwa']) . '">'
                            . htmlspecialchars($row['nazwa']) . '</option>';
                    }
                }
                ?>
            </select>
            <button type="submit">Wyszukaj</button>
        </form>
        <?php if ($zapytanie4 !== null) { ?>
            <div style="display: flex;">
                <?php
                while ($row = $zapytanie4->fetch_assoc()) {
                    echo '<div>'
                        . '<img src="' . htmlspecialchars($row['zdjecie']) . '" alt="' . htmlspecialchars($row['model']) . '">'
                        . '<h4>' . htmlspecialchars($row['nazwa']) . ' ' . htmlspecialchars($row['model']) . '</h4>'
                        . '<h4>Cena: ' . htmlspecialchars($row['cena']) . '</h4>'
                        . '</div>';
                }
                ?>
            </div>
        <?php } ?>
    </section>
    <footer>
        <p>Stronę wykonał: Maciej Czarnecki (czas wykonywania: )</p>
        <p><a href="http://firmy.pl/komus">Znajdź nas także</a></p>
    </footer>
</body>

</html>