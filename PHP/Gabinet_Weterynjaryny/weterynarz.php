<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weterynarz</title>
    <link rel="stylesheet" href="weterynarz.css">
</head>
<body>
    <header>
        <h1>GABINET WETERYNARYJNY</h1>
    </header>

    <section id="left">
        <h2>PSY</h2>
        <?php
        $con = mysqli_connect("localhost", "root", "", "weterynarz");
        $query = "SELECT id, imie, wlasciciel FROM zwierzeta WHERE rodzaj = '1';";
        $result = mysqli_query($con, $query);
        $i = 1;
        while ($row = mysqli_fetch_row($result)) {
            echo "
            <p>{$row[1]}</p>
            <p>{$row[2]}</p>
            <p>{$row[3]}</p>
            ";
            $i++;
            
        }
        mysqli_close($con);
        ?>
        <h2>KOTY</h2>
        <!--skrypt2 -->
    </section>

    <section id="middle">
        <h2>SZCZEGÓŁOWA INFORMACJA O ZWIERZĘTACH</h2>
        <!--skrypt3 -->
    </section>

    <section id="right">
        <h2>WETERYNARZ</h2>
        <a href="logo.jpg">
        <img src="logo-mini.jpg">
        </a>
        <p>Krzysztof Nowakowski, 
            lekarz weterynarii </p>
        <h2>GODZINY PRZYJĘĆ</h2>
        <table>
            <tr>
                <th>Poniedziałek</th><td>15:00-19:00</td>
            </tr>
             <tr>
                <th>Wtorek</th><td>15:00-19:00</td>
            </tr>
        </table>
    </section>
</body>
</html>