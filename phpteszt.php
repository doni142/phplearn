<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A PHP-adattípusok tesztelése</title>
</head>
<body>
    <h1>Ez itt a php-kód tesztje</h1>

    <?php
        echo "<p>Ezt a szöveget dinamikusan generáltuk!</p>";
    ?>

    <h1>Ez itt a vége</h1>
    <h2>A PHP-adattípusok tesztelése</h2>

    <?php
    $név = "dönci";
    $kor = 1;
    $fizzetés = 13456575.25;
    echo "<h3>$név király</h3>\n";
    echo "Kor: $kor<br>\n";
    echo "Fizzetés: $$fizzetés\n";
    $teszt = "Az összeszerelési ideje: 10'";
    echo "<br>$teszt heló";
    echo "<br>A változó értéke -> $kor";
    echo '<br>A változó neve -> $kor';
    $pontszamok = [110, 120, 130];
    $kedvencek = array("hús" => "marhahús", "desszert" => "tiramisu");
    echo "<br>Számok: $pontszamok[1]\n";
    echo "<br> Desszert: {$kedvencek['desszert']}\n";
    $érték = 10;
    $érték1 = 20;
    $eredmény = $érték + $érték1;
    echo "<br>$eredmény\n";
    $lebegőpontos = 3.14159;
    $lebegőpontos1 = 2.3e10;
    $lebegőpontos2 = 5E-10;
    ?>

    <h2>Ez az addatípus tesztelés vége</h2>
</body>
</html>