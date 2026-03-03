<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmoteka</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <section id="jeden" class="gora">
        <img src="klaps.png" alt="Nasze Filmy">
    </section>
    <section id="dwa" class="gora">
        <h1>BAZA FILMÓW</h1>
    </section>
    <section id="trzy" class="gora">
        <form action="index.php" method="POST">
            <select id="opcje" name="opcje">
                <option value="Sci-Fi">Sci_Fi</option>
                <option value="animacja">animacja</option>
                <option value="dramat">dramat</option>
                <option value="horror">horror</option>
                <option value="komedia">komedia</option>
                <input type="submit" name="Filmy" value="Filmy">
    </select>
    </form>
    </section>
    <section id="cztery" class="gora">
        <img src="gwiezdneWojny.jpg" alt="szturmowcy">
    </section>

    <section id="lewy" class="glowna">
    <h2>Wybrano filmy:</h2> 
    <?php
    if (isset($_POST["opcje"])){
        $gatunek = $_POST["opcje"];
    $con = mysqli_connect("localhost", "root", "", "dane");
        $query = "SELECT tytul, rok, ocena FROM filmy inner join gatunki on filmy.gatunki_id= gatunki.id where gatunki.nazwa = '$gatunek';";
        $result = mysqli_query($con, $query);
       
        while ($row = mysqli_fetch_row($result)) {
            echo "
            <p>Tytuł: ".$row[0].", Rok produkcji: ".$row[1].", ocena: ".$row[2]."</p>";
            
            
        }
    }
    ?>
    </section>
    <section id="prawy" class="glowna">
    <h2>Wszystkie filmy</h2> 
    <?php
    
        $query = "SELECT filmy.id, tytul, rezyserzy.imie, rezyserzy.nazwisko FROM filmy inner join rezyserzy on filmy.rezyserzy_id= rezyserzy.id;";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_row($result)) {
            echo "
            <p>$row[0]. Tytuł: $row[1], reżyseria: $row[2] $row[3]</p>
            ";          
        }
    mysqli_close($con);
    ?>
    </section>
  <footer>
    <p>Autor: ja</p>
    <a href="kwerendy.txt">Zapytania do bazy </a>
    <a href="filmy.pl">Przejdź do filmy.pl</a>
  </footer>  
</body>
</html>