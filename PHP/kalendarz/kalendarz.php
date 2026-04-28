<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <section id="napis">
    <?php

    $conn = mysqli_connect("localhost", "root","","kalendarz");
    $dniMiesiace = date('m-d');
    $dniTygodnia  = array(
        "Monday" => "Poniedziałek",
        "Tuesday" => "Wtorek",
        "Wednesday" => "Środa",
        "Thursday" => "Czwartek",
        "Friday" => "Piątek",
        "Saturday" => "Sobota",
        "Sunday" => "Niedziela",
    );

    $DzienPoAng = date("l");
    $query = "SELECT imiona, `data` FROM imieniny WHERE `data` = '$dniMiesiace';";
    $result = mysqli_query($conn, $query);
        while ($row = $result -> fetch_array()){
            echo "<p>Dzisiaj jest ".$dniTygodnia[$DzienPoAng].", ".date('d-m-y').", imieniny: $row[0]</p>";
        }
    ?>
    </section>
    <section class="bloki" id="lewy">
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiące</th>
            </tr>
            <tr>
                    <td rowspan="7">31</td>
                    <td>styczeń</td>         
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr><td>lipiec</td></tr>
            <tr> <td>sierpień</td></tr>
            <tr><td>pażdziernik</td></tr>
            <tr><td>grudzień</td> </tr>
            <tr>
                <td rowspan="4">30</td>
                    <td>kwiecień</td>            
            </tr>
            <tr><td>czerwiec</td></tr>
            <tr><td>wrzesień</td></tr>
            <tr><td>listopad</td> </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </section>
    <section class="bloki" id="srodkowy">
        <h2>Sprawdż kto ma urodziny</h2>
        <form action="kalendarz.php" method="POST">
            <input type="date" min="2024-01-01" name="wybraneDni"max="2024-12-31" required>
            <input type="submit" value="wyślij">
            <?php
            if (isset($_POST['$wybraneDni'])){
                $data = $_POST["wybraneDni"];
                $format = date("m-d", strtotime($_POST["$data"]));
                $query2 = "SELECT imiona, `data` FROM imieniny WHERE `data` = '$data';";
                $result1 = mysqli_query($conn, $query2);
                while ($row = $result -> fetch_array()){
                    $imieniny = $row[0];
                }
                echo "<p>„Dnia $data są imieniny: $imieniny</p>";
            }
            ?>
        </form>
    </section>
    <section class="bloki" id="prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif" alt="Kalendarz Majów"></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>słoneczny</li>
            <ul>
                <li>kalendarz Majów</li>
                <li>juliański</li>
                <li>gregoriański</li>
            </ul>
            <li>księżycowy</li>
            <ul>
                <li>starogrecki</li>
                <li>babiloński</li>
            </ul>
        </ol>
    </section>
    <footer> <p>Stronę opracował(a): ja</p></footer>
</body>
</html>