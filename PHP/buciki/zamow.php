<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $conn = mysqli_connect("localhost", "root","","obuwie");
    ?>
 <header>
    <h1>Obuwie męskie</h1>
 </header>
 <main>
    <h2>Zamówienia</h2>
    <?php
    if (isset($_POST["model"]))
        {
    $model = $_POST["model"];
    $rozmiar = $_POST["rozmiar"];
    $liczbaPar = $_POST["liczbaPar"];

    $query3 = "SELECT nazwa, cena, kolor, kod_produktu, material, nazwa_pliku FROM buty inner join produkt on buty.model = produkt.model where buty.model = '$model';";
    $result3 = mysqli_query($conn, $query3);
        while($row = mysqli_fetch_row($result3)) {
            $cenaPar = $liczbaPar * $row[1];
            echo "<img src='$row[5]' alt='but męski'>
            <h2>$row[0]</h2>
            <p>cena za $liczbaPar par: $cenaPar zł</p>
            <p>Szczegóły produktu: $row[2], $row[4]</p>
            <p>Rozmiar: $rozmiar</p>";
        }
    }
    ?>
    <a href="index.php">Strona główna</a>
 </main>
 <footer>
    <p>Autor strony: </p>
 </footer>   
</body>
</html>
<?php
 mysqli_close($conn);
?>