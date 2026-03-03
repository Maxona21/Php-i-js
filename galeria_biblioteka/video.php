<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <section id="lewy">
        <h1>Iternetowa wypożyczalnia filmów</h1>
    </section>
    <section id="prawy">
        <table>
            <tr>
                <th>Kryminał</th><th>Horror</th><th>Przygodowy</th>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </section>

    <section class="film" id="Polecane">
        <h3>Polecane</h3>
        <?php
        $con = mysqli_connect("localhost", "root", "", "dane3");
        $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id in(18, 22, 23,25);";
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_row($result)){
            echo"<div class='rowne'><h4>$row[0]$row[1]</h4> <img src='$row[3]'> <p>$row[2]</p></div>";
        };
        ?>
    </section>

    <section class="film" id="fantastyczne">
    <h3>Filmy Fantastyczne</h3>
    <?php
    $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;";
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_row($result)){
            echo"<section class='rowne'><h4>$row[0]$row[1]</h4> <img src='$row[3]'> <p>$row[2]</p> </section>";
        };
        ?>
    </section>

    <footer>
    <form action="video.php" method="POST">
        <label>Usuń Film nr.:<input type="number" value="numer" name="numer"><input type="submit" name="usun" value="usun film"></label>
        <p>Stronę wykonał:<a href="mailto:ja@poczta.com">jaaa</a></p>
    </form> 
        <?php
        if (isset($_POST["numer"])){
        $usun = $_POST["numer"];
        $Usunquery = "DELETE FROM produkty WHERE id = $usun;";
        if (mysqli_query($con, $Usunquery)){
            echo"Usunięto";
        }else {
            echo"nie udało się";
        }
        }
        mysqli_close($con)
        ?>
    </footer>
</body>
</html>