<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wolontariat Szkolny</title>
    <link rel="stylesheet" href="wol.css">
</head>
<body>
   <header>
    <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
   </header>
   <section id="lewy">
    <h2>Konkursowe nagrody</h2>
    <form method="POST" action="wolontariat.php">
    <button>Losuj nowe nagrody </button>
    </form>
    <table>
        <tr>
            <th>Nr</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Wartość</th>
        </tr>
        <?php
        $con = mysqli_connect("localhost", "root", "","konkurs");
       $query = "Select nazwa, opis, cena from nagrody order by rand() limit 5;";
       $result = mysqli_query($con, $query);
       $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
            <td>$i</td>
            <td>{$row['nazwa']}</td>
            <td>{$row['opis']}</td>
            <td>{$row['cena']}</td>
            </tr>";
            $i++;
        }
        mysqli_close($con);
        ?>
    </table>
    </section>
    <section id="prawy">
    <img src="puchar.bmp" ald="Puchar dla wolontariusza">
    <h4>Polecane linki: </h4>
    <ul>
        <li><a href="kw1.png">Kwerenda 1</a></li>
        <li><a href="kw2.png">Kwerenda 2</a></li>
        <li><a href="kw3.png">Kwerenda 3</a></li>
        <li><a href="kw4.png">Kwerenda 4</a></li>
    </ul>
    </section>
    <footer>
    <p>Numer zdającego: Ja</p>
    </footer>
</body>
</html>