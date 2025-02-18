<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="baner1">
        <img src="obraz1.png" alt="mapa polski">
    </header>
    <header id="baner2">
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>

    <section id="menu">
        <form action="poziomRzek.php" method="post">
        <label class="radio">
            <input type="radio" name="lista" value="wszystkie"> Wszystkie
        </label>
        <label class="radio">
            <input type="radio" name="lista" value="ostrzegawcze"> Ponad stan ostrzegawczy
        </label>
        <label class="radio">
            <input type="radio" name="lista" value="alarmowe"> Ponad stan alarmowy
        </label>
        <input type="submit" value="pokaz">
        </form>
    </section>

    <section id="lewy">
        <h3>Stan na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
            </tr>
            <?php 
    $polaczenie = mysqli_connect("localhost", "root", "", "rzeki");
    if(!empty($_POST["lista"])){
        $wybor = $_POST['lista'];
    
    $zapytanie3="SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy JOIN pomiary ON pomiary.wodowskazy_id=wodowskazy.id WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanOstrzegawczy ";

    $zapytanie2="SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy JOIN pomiary ON pomiary.wodowskazy_id=wodowskazy.id WHERE pomiary.dataPomiaru = '2022-05-05' ";

    $zapytanie1 = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy JOIN pomiary ON pomiary.wodowskazy_id=wodowskazy.id WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanAlarmowy ";
    $wynik1 = mysqli_query($polaczenie, $zapytanie1);
    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
    $wynik3 = mysqli_query($polaczenie, $zapytanie3);
    if($wybor == 'wszystkie'){
        while($row = mysqli_fetch_row($wynik2)){
            echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                </tr>";
        }
    }
    if($wybor == 'ostrzegawcze'){
        while($row = mysqli_fetch_row($wynik3)){
            echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                </tr>";
        }
    }
    if($wybor == 'alarmowe'){
        while($row = mysqli_fetch_row($wynik1)){
            echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                </tr>";
        }
    }
}
    mysqli_close($polaczenie);
        ?>
        </table>
    </section>

    <section id="prawy">
        <h3>Informacje</h3>
        <ul>
        <li>Brak ostrzeżeń o burzach z gradem</li>
        <li>Smog w mieście Wrocław</li>
        <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>

        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "rzeki");
        $zapytanie4="SELECT pomiary.dataPomiaru, AVG(pomiary.stanWody) FROM pomiary GROUP BY pomiary.dataPomiaru;";
        $wynik4 = mysqli_query($polaczenie, $zapytanie4);
        while($row = mysqli_fetch_row($wynik4)){
            echo "<p>$row[0]: $row[1]</p>";
        }
        mysqli_close($polaczenie);
        ?>

        <a href="https://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka">
    </section>
    <footer>
        <p>Stronę wykonał: Mikołaj Grzeszczak</p>
    </footer>
</body>
</html>