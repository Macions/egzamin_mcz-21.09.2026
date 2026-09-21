<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "terminarz";

$con = new mysqli($hostname, $username, $password, $db_name);

if (!$con) {
    echo "Błąd połączenia";
    exit;
}

$zapytanie1 = $con->query("SELECT DISTINCT wpis 
FROM zadania 
WHERE dataZadania BETWEEN '2020-07-01' 
AND '2020-07-07' 
AND wpis IS NOT NULL AND wpis <> '';");

$zapytanie2 = $con->query("SELECT dataZadania, wpis FROM `zadania` WHERE miesiac='lipiec'");

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>

<body>
    <header id="baner1">
        <img src="logo1.png" alt="lipiec">
    </header>
    <section id="baner2">
        <h1>TERMINARZ</h1>
        <p>najbliższe zadania:
            <?php
            if ($zapytanie1->num_rows > 0) {
                while ($row = $zapytanie1->fetch_assoc()) {
                    echo $row['wpis'] . "; ";
                }
            }
            ?>
        </p>
    </section>
    <main>
        <?php
        if ($zapytanie2->num_rows > 0) {
            while ($row = $zapytanie2->fetch_assoc()) {
                echo "<section>";
                echo "<h6>" . $row['dataZadania'] . "</h6>";
                echo "<p>" . $row['wpis'] . "</p>";
                echo "</section>";
            }
        }
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stroną wykonał: Maciej Czarnecki. Czas wykonywania:</p>
    </footer>

    <?php
    $con->close();
    ?>
</body>

</html>