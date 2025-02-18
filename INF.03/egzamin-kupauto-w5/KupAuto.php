<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="baner">
        <h1><i>KupAuto!</i>Internetowy Komis
        Samochodowy</h1>
    </header>
    <article id="glowny1">
    <?php 
        $conn = mysqli_connect('localhost','root','','kupauto');
        $kw2 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10;";
        $res = mysqli_query($conn, $kw2);
        while($row=mysqli_fetch_row($res)){
            echo "<img src=$row[5] alt=oferta dnia>";
            echo "<h4>Oferta Dnia: Toyota $row[0]</h4>";
            echo "<p>Rocznik: $row[1], przebieg: $row[2], rodzaj paliwa: $row[3]</p>";
            echo "<h4>cena $row[4]</h4>";
        }
    ?>
    </article>
    <article>
        <h2>Oferty Wyróżnione</h2>
        <?php 
        $conn = mysqli_connect('localhost','root','','kupauto');
        $kw3 = "SELECT m.nazwa, s.model, s.rocznik, s.cena, s.zdjecie FROM marki as m, samochody as s WHERE s.marki_id = m.id AND s.wyrozniony = true LIMIT 4;";
        $res = mysqli_query($conn, $kw3);
        while($row=mysqli_fetch_row($res)){
            echo "<section id=glowny2>";
            echo "<img src=$row[4] alt=$row[1]>";
            echo "<h4>$row[0] $row[1]</h4>";
            echo "<p>Rocznik: $row[2]</p>";
            echo "<h4>cena $row[3]</h4>";
            echo "</section>";
        }
    ?>
    </article>
    <article id="glowny3">
        <h2>Wybierz markę</h2>
        <form action="KupAuto.php" method="post">
            <select name="lista" id="lista">
                <?php 
                    $conn = mysqli_connect('localhost','root','','kupauto');
                    $kw = "SELECT nazwa FROM marki;";
                    $res = mysqli_query($conn, $kw);
                    while($row=mysqli_fetch_row($res)){
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }
                ?>
            </select>
            <button type="submit" id="lista">Wyszukaj</button>
            <br>
            <?php 
        $conn = mysqli_connect('localhost','root','','kupauto');
        if(!empty($_POST['lista'])){
            $nazwa = $_POST['lista'];
            $kw4 = "SELECT s.model, s.cena, s.zdjecie FROM samochody as s, marki as m WHERE s.marki_id = m.id AND m.nazwa = '$nazwa';";
            $res = mysqli_query($conn, $kw4);
            while($row=mysqli_fetch_row($res)){
                echo "<section id=glowny2>";
                echo "<img src=$row[2] alt=$row[0]>";
                echo "<h4>$nazwa, $row[0]</h4>";
                echo "<h4>cena $row[1]</h4>";
                echo "</section>";
            }
        }
        mysqli_close($conn);
    ?>
        </form>
    </article>
    <footer>
        <p>Stronę wykonał 0000000000</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>