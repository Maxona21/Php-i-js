<!DOCTYPE html>
<html lang="pl=PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl">
    <header>
        <h1>Motocykle-moja pasja</h1>
    </header>
    <section id="lewy">
        <h2>Gdzie pojechać?</h2>

            <?php
            $conn = mysqli_connect("localhost", "root", "","motory" );
            $query = "SELECT nazwa, opis, poczatek, zdjecia.zrodlo FROM wycieczki inner join zdjecia on wycieczki.zdjecia_id = zdjecia.id;";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_row($result)){
                echo "<dt>$row[0], rozpoczyna się w $row[2], <a href='$row[3].jpg' alt='zdjęcia'>Zobacz zdjęcie</a></dt>";
                echo "<dl>$row[1]</dl>";
            }
            ?>
    </section>
    <section id="prawy1">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section id="prawy2">
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek: <?php
        $query1 = "SELECT count(id) FROM `wycieczki`;";
        $wynik = mysqli_query($conn,$query1);
        if ($kol = mysqli_fetch_row($wynik)){
            echo "$kol[0]";
        }
        mysqli_close($conn);
        ?>
        </p>
        <p>Użytkowników forum: 200</p>
        <p>Przesyłanych zdjęć:1300</p>
    </section>
    <footer><p>Stronę wykonał: ja</p></footer>
</body>
</html>