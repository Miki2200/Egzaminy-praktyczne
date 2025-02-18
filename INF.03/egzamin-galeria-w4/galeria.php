<!DOCTYPE html>
<html lang="p;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="baner"><h1>Zdjęcia</h1></header>
    <article id="lewy">
        <h3>Tematy zdjęć</h3>
        <ol>
            <li>Zwierzęta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </article>
    <article id="srodek">
    <?php
    $conn = mysqli_connect('localhost','root','','galeria');

    $zap2 = "SELECT z.plik, z.tytul, z.polubienia, a.imie, a.nazwisko FROM zdjecia as z, autorzy as a WHERE z.autorzy_id=a.id ORDER BY a.nazwisko ASC;";
    $res = mysqli_query($conn, $zap2);
    while($row=mysqli_fetch_row($res)){
        echo "<section id=grafiki>";
        echo "<img src=$row[0] alt=zdjecie>";
        echo "<h3>$row[1]</h3>";
        if($row[2] > 40){
            echo "<p>Autor: $row[3] $row[4]. <br> Wiele osób polubiło ten obraz</p>";
        }
        else{
            echo "<p>Autor: $row[3] $row[4]</p>";
        }
        echo "<a href=$row[0] download=$row[0]>Pobierz</a>";
        echo "</section>";
    }
    mysqli_close($conn);
?>
    </article>
    <article id="prawy">
        <h2>Najbardziej lubiane</h2>
        <?php
    $conn = mysqli_connect('localhost','root','','galeria');

    $zap = "SELECT plik, tytul FROM zdjecia WHERE polubienia >= 100;";
    $res = mysqli_query($conn, $zap);
    while($row=mysqli_fetch_row($res)){
        echo "<img src=$row[0] alt=$row[1]>";
    }
    mysqli_close($conn);
?>
        <strong>Zobacz wszystkie nasze zdjęcia</strong>
    </article>
    <footer>
        <h5>Stronę wykonał: 00000000000</h5>
    </footer>
</body>
</html>


