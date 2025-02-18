<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <article id="baner1">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </article>
        <article id="baner2">
            <img src="obraz1.png" alt="waga">
        </article>
    </header>
    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <ol>
        <?php 
        $conn = mysqli_connect('localhost','root','','wazenietirow');
        $kw1 = "SELECT ulica FROM lokalizacje;";
        $res = mysqli_query($conn, $kw1);
        while($row=mysqli_fetch_row($res)){
            echo "<li>$row[0]</li>";
        }
        ?>
        </ol>
        <h2>Kontakt</h2>
        <a href="wazenie@wroclaw.pl">napisz</a>
    </section>
    <main id="srodek">
        <h2>Alerty</h2>
        <table>
            <thead>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $conn = mysqli_connect('localhost','root','','wazenietirow');
                $kw4 = "SELECT w.rejestracja, w.waga, w.dzien, w.czas, l.ulica FROM wagi as w, lokalizacje as l WHERE w.lokalizacje_id=l.id AND w.waga > 5;";
                $res = mysqli_query($conn, $kw4);
                while($row=mysqli_fetch_row($res)){
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[4]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php 
        $conn = mysqli_connect('localhost','root','','wazenietirow');
        $kw3 = "INSERT INTO wagi(lokalizacje_id, waga, rejestracja,dzien,czas) VALUES (5,FLOOR(1+RAND()*10),'DW12345',CURRENT_DATE,CURRENT_TIME);";
        $res = mysqli_query($conn, $kw3);
        mysqli_close($conn);
        header("Refresh: 10");
        ?>
    </main>
    <section id="prawy">
        <img src="obraz2.jpg" alt="tir">
    </section>
    <footer>
        <p>Stronę wykonał: 1321203</p>
    </footer>
</body>
</html>

