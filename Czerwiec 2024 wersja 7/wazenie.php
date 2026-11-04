<?php
$hostname = "localhost";
$username = "root";
$passwd = "";
$db_name = "wazenietirow";

$conn = new mysqli($hostname, $username, $passwd, $db_name);

$zapytanie1 = $conn->query("SELECT ulica FROM lokalizacje;");

$zapytanie2 = $conn->query("SELECT rejestracja, waga, dzien,czas, l.ulica as ulica FROM wagi JOIN lokalizacje l ON lokalizacje_id=l.id WHERE waga>5 ORDER BY dzien DESC, czas DESC;");
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <meta http-equiv="refresh" content="10">
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Ważenie pojazdów we Wrocławiu</h1>
    </header>
    <section id="banerDwa">
        <img src="obraz1.png" alt="waga">
    </section>
    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <ol>
            <?php
            if ($zapytanie1->num_rows > 0) {
                while ($row = $zapytanie1->fetch_assoc()) {
                    echo "<li>";
                    echo "ulica: " . $row['ulica'];
                    echo "</li>";
                }
            }
            ?>
        </ol>
        <h2>Kontakt</h2>
        <a href="mailto:wazenie@wroclaw.pl">napisz</a>
    </section>
    <section id="srodkowy">
        <h2>Alerty</h2>
        <table>
            <tr>
                <th>rejestracja</th>
                <th>ulica</th>
                <th>waga</th>
                <th>dzień</th>
                <th>czas</th>
            </tr>
            <?php
            if ($zapytanie2->num_rows > 0) {
                while ($row = $zapytanie2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['rejestracja'] . "</td>";
                    echo "<td>" . $row['waga'] . "</td>";
                    echo "<td>" . $row['dzien'] . "</td>";
                    echo "<td>" . $row['czas'] . "</td>";
                    echo "<td>" . $row['ulica'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <?php
        $zapytanie3 = $conn->query("INSERT INTO wagi(lokalizacje_id, waga, rejestracja, dzien, czas) VALUES (5,  FLOOR(1 + RAND() * 10), 'DW12345', CURRENT_DATE, CURRENT_TIME)");
        $conn->close();
        ?>
    </section>
    <section id="prawy">
        <img src="obraz2.jpg" alt="tir">
    </section>

    <footer>
        <p>Stronę wykonał: Maciej Czarnecki</p>
    </footer>
</body>

</html>