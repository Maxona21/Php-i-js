<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
    <script src="bloki.js" defer></script>
</head>
<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>
    <nav>
        <section id="nav1" class="blok" onclick="blok1()">Baza</section>
        <section id="nav2" class="blok" onclick="opisy()">Opisy</section>
        <section id="nav3" class="blok" onclick="Galeria()">Galeria</section>
       
    </nav>
    <main>
        <section id="sekcja1">
            <h3>Baza Smoków </h3>

            <form method="POST" action="smoki.php">
            <select name="wybor" id="wybor">
            <?php
            $con = mysqli_connect("localhost", "root","","smoki");
            $query1 = "SELECT DISTINCT pochodzenie FROM smok order by pochodzenie asc;";
            $result = mysqli_query($con, $query1);
            while ($row1 = mysqli_fetch_row($result)){
                echo "<option value='$row1[0]'> $row1[0]</option>";
            }
            ?>
            </select>
            <button type="submit">Szukaj</button>
            </form>

            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <?php
                if (isset($_POST["wybor"]) && !empty($_POST["wybor"])){
                $kraj = $_POST["wybor"];
                $query2 = "SELECT nazwa, dlugosc, szerokosc FROM `smok` WHERE pochodzenie = '$kraj';";
                $result1 = mysqli_query($con, $query2);
                while ($row = mysqli_fetch_row($result1)){
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
                    }    
                } 
                mysqli_close($con);
                ?>
            </table>
    </section>
        <section id="sekcja2">
            <h3>Opisy Smoków </h3>
            <dl>
                <dt> Smok czerwony <dt>
                    <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                <dt>Smok zielony<dt>
                    <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
                <dt>Smok niebieski </dt>
                    <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać. </dd>
            </dl>
        </section>
        <section id="sekcja3">
            <h3>Galeria </h3>
            <img src="smok1.jpg" alt="Smok czerwony">
            <img src="smok2.jpg" alt="Smok wielki">
            <img src="smok3.jpg" alt="Smok łaciaty">
        </section>
    </main>
    <footer><p>Stronę opracował: ja</p> </footer>
</body>
</html>