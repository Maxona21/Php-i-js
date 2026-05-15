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
    <form action="zamow.php" method="POST" >
        <label>Model:</label>
    <select name="model" id="model" class="kontroliki">
    <?php 
    $query1 = "SELECT model FROM produkt;";
    $result1 = mysqli_query($conn, $query1);
    while ($row = mysqli_fetch_row($result1)){
        echo "<option>$row[0]</option>";
    }
    ?>
    </select>
    <label>Rozmiar</label>
    <select name="rozmiar" id="rozmiar">
        <option value="pierwszy">40</option>
        <option value="drugi">41</option>
        <option value="trzeci">42</option>
        <option value="czwarty">43</option>
    </select>
    <label>Liczba par:</label>
    <input type="number" name="liczbaPar" id="liczba">
    <input type="submit" value="Zamów">
    </form>
    <?php
    $query2 = "SELECT produkt.model, nazwa, cena, nazwa_pliku FROM produkt inner join buty on produkt.model = buty.model;"; 
    $result2 = mysqli_query($conn, $query2);
    while ($row = mysqli_fetch_row($result2)){
        echo "<div class='buty'>
        <img src='$row[3]' alt='but męski'>
        <h2>$row[1]</h2>
        <h5>Model: $row[0]</h5>
        <h4>Cena: $row[2]</h4>
        </div>";
    }
    ?>
 </main>
 <footer>
    <p>Autor strony: </p>
 </footer>   
</body>
</html>
<?php
 mysqli_close($conn);
?>