<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>System informacji dla maturzystów</h1>
    </header>
    <aside>
        <img src="ma.jpg" alt="Matura">
        <img src="tu.jpg" alt="Matura">
        <img src="ra.jpg" alt="Matura">
    </aside>
    <section name="firstBlock" id="firstBlock">
        <?php
        $conn = mysqli_connect("localhost", "root","", "matura");
        echo "<h2>$_GET[imie] $_GET[nazwisko]</h2>";
        $query5 = "SELECT rok, sesja, przedmiot, wynik.punkty FROM arkusz INNER join wynik on arkusz.symbol = wynik.symbol where wynik.maturzysta_id = $_GET[id];";
        $result5 = mysqli_query($conn, $query5);
        while ($row5 = mysqli_fetch_row($result5)){
            echo "<h3>$row5[0] $row5[1]</h3>";
            echo "<p>$row5[2]: $row5[3]</p>";
        }
        ?>
    </section>
    <section name="secondBlock" id="secondBlock">
        <section class="bloki"><h4>Przedmioty</h4><?php
            $conn = mysqli_connect("localhost", "root","", "matura");
            $query1 = "SELECT DISTINCT przedmiot FROM `arkusz`;";
            $result1 = mysqli_query($conn, $query1);
            while ($row = mysqli_fetch_row($result1)){
                echo "$row[0] ";
            }
            ?>
        </section>
        <section class="bloki">
            <h4>Lata</h4>
            <?php
            $query2 = "SELECT DISTINCT min(rok), max(rok) FROM `arkusz` ;";
            $result2 = mysqli_query($conn, $query2);
            if ($row1 = mysqli_fetch_row($result2)){
                echo "$row1[0] - $row1[1]";
            }
            ?>
        </section>
        <section class="bloki">
            <h4>Najlepszy wynik</h4>
            <?php
            $query3 = "SELECT maturzysta.id, avg(wynik.punkty) as wynik FROM maturzysta inner join wynik on maturzysta.id = wynik.maturzysta_id group by id order by wynik desc limit 1;";
            $result3 = mysqli_query($conn, $query3);
            while ($row2 = mysqli_fetch_row($result3)){
                echo "$row2[1]%";
            }
            ?>
        </section>
        <section class="bloki">
            <h4>Najgorszy wynik</h4>
            <?php
            $query3 = "SELECT maturzysta.id, avg(wynik.punkty) as wynik FROM maturzysta inner join wynik on maturzysta.id = wynik.maturzysta_id group by id order by wynik asc limit 1;";
            $result3 = mysqli_query($conn, $query3);
            while ($row2 = mysqli_fetch_row($result3)){
                echo "$row2[1]%";
            }
            ?>
    </section>
    </section>
    <footer><p>Stronę wykonal: ja</p></footer>
</body>
</html>