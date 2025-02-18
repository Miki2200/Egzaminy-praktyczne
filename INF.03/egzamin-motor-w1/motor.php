
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'motory');
    $query = "SELECT COUNT(id) FROM wycieczki";
    $res = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($res)){
        $liczba_wycieczek = $row[0];
    }
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
    <div id="container">
    <img src="motor.png" alt="motocykl" class="motor">

    <header>
    <h1>Motocykle - moja pasja</h1>
    </header>

    <article id="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <dt></dt>
            <dd></dd>
        </dl> 
        <?php 
            $query = "SELECT nazwa, poczatek, zrodlo, opis FROM wycieczki, zdjecia WHERE wycieczki.id = zdjecia.id";
            $res = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($res)){
                echo "<dl>";
                echo "<dt>" . $row[0] . ", rozpoczyna się w " . $row[1] . ' <a href="' . $row[2] . ".jpg". '" target="_blank">Zobacz więcej</a></dt>';
                echo "<dd>" . $row[3] . "</dd>";
                echo "</dl>";
            }            
        ?>
    </article>
<aside>
    <section id="prawy1">
        <h2>Co kupić?</h2>
        <ol>
            <li> Honda CBR125R </li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section id="prawy2">
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek: <?php echo $liczba_wycieczek?> </p>   SKRYPT 2 
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>
</aside>
    <footer>
        <p>Stronę wykonał:00000000</p>
    </footer>
    </div>
</body>
</html>