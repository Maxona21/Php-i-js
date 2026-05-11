<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia Farb</title>
    <link rel="icon" type="image/x-icon" href="fav.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>
    <form action="index.php" method="POST">
        <label>Data odbioru od:</label>
        <input type="date" name="dataOD">
        <label>Do:</label>
        <input type="date" name="dataDO">
        <input type="submit" name="wyszukaj" value="wyszukaj">
    </form>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Naziwkso</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność[ml]</th>
                <th>Data Odbioru</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root","", "mieszalnia");
            $query1 = "SELECT Nazwisko, Imie, zamowienia.id_klienta, kod_koloru, pojemnosc, data_odbioru FROM zamowienia inner join klienci on zamowienia.id_klienta = klienci.Id group by data_odbioru asc;";
            $query2 = "SELECT Nazwisko, Imie, zamowienia.id_klienta, kod_koloru, pojemnosc, data_odbioru FROM zamowienia inner join klienci on zamowienia.id_klienta = klienci.Id where data_odbioru > '2021-11-05' and data_odbioru < '2021-11-07' group by data_odbioru asc;";
            $result1 = mysqli_query($conn, $query1);
            $result2 = mysqli_query($conn, $query2);
            $dataOD = isset($_POST["dataOD"]);
            $dataDO = isset($_POST["dataDO"]);
            
            if($dataOD == null && $dataDO == null){
                while($row = mysqli_fetch_row($result1)){
                    echo"<tr><td>$row[2]</td><td>$row[0]</td><td>$row[1]</td><td style='background-color:#$row[3]'>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
                }
            } else {
                while($row = mysqli_fetch_row($result2)){
                    echo"<tr><td>$row[2]</td><td>$row[0]</td><td>$row[1]</td><td style='background-color:#$row[3]'>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
                }
            }
            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: ja</p>
    </footer>
    
</body>
</html>