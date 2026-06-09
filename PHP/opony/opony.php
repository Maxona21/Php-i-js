<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPONY</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost","root","","opony"); 
    ?>
   <main>
    <aside>
        <!--SKRYPT 1-->
        <?php 
        $zapytanie="SELECT * FROM opony order by cena asc limit 10;";
        $wynik = mysqli_query($conn, $zapytanie);
        while($row = mysqli_fetch_row($wynik)){
            if($row[3] =="letnia"){
                echo "<div class='opona'> 
                <img src='lato.png' alt='opona letnia'>
                <h4>Opona: $row[1] $row[2]</h4>
                <h3>Cena: $row[4]</h3>
                </div>";
            } else if ($row[3]=="zimowa"){
                echo "<div class='opona'> 
                <img src='zima.png' alt='opona zimowa'>
                <h4>Opona: $row[1] $row[2]</h4>
                <h3>Cena: $row[4]</h3>
                </div>";
            } else {
                echo "<div class='opona'> 
                <img src='uniwer.png' alt='opona uniwersalna'>
                <h4>Opona: $row[1] $row[2]</h4>
                <h3>Cena: $row[4]</h3>
                </div>";
            }
        }
        ?>
        <a href="https://opona.pl/"><p>więcej ofert</p></a>
    </aside>
    <section id="pierwszy">
        <img src="opona.png" alt="Opona">
        <h2>Opona dnia</h2>
        <!--Skrypt 2-->
        <?php
        $zapytanie2="SELECT producent, model,sezon, cena FROM opony where nr_kat = 9;";
        $wynik2 = mysqli_query($conn, $zapytanie2);
        if ($row2 = mysqli_fetch_row($wynik2)){
            echo "<h2>$row2[0] model $row2[1]</h2>
            <h2>Sezon: $row2[2]</h2>
            <h2>Tylko $row2[3] zł!</h2>";
        }
        ?>
    </section>
    <section id="drugi">
        <h2>Najnowsze zamówienie</h2>
        <!--skrypt 3-->
        <?php
        $zapytanie3="SELECT id_zam, ilosc, model, cena FROM zamowienie inner join opony on zamowienie.nr_kat = opony.nr_kat order by rand() limit 1;";
        $wynik3 = mysqli_query($conn, $zapytanie3);
        if ($row3 = mysqli_fetch_row($wynik3)){
            $wartosc = $row3[1] * $row3[3];
            echo "<h2>$row3[0] $row3[1] sztuki modelu $row3[2]</h2>
            <h2>Wartość zamówienia: $wartosc zł</h2>";
        }
        ?>
    </section>
   </main> 
   <footer>
    <p>Stronę wykonał: pesel</p>
   </footer>
   <?php
   mysqli_close($conn);
   ?>
</body>
</html>