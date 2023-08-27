<?php
// Ellenőrizzük, történt-e sumit = a $_POST-ban van valami
if (isset($_POST['szoveg'])) {
    $error = [];
    // Az user adatok feldolgozása:
    $szoveg = trim($_POST['szoveg']);
    $nev = trim($_POST['nev']);

    // Hiba ellenőrzés.
    if ('' === $szoveg )
    {
        $error[] = "A szöveg mező nem lehet üres! Írjon be valamint!";
    }

    if ('' === $nev)
    {
        $error[] = "A név mező nem lehet üres! Írjon be valamint!";
    }

    if (empty($error))
    {
        // Nincs hiba - kiírjuk az új comment.
        file_put_contents('szoveg.txt', $nev . ': ' . $szoveg . '<br />', FILE_APPEND);
    }
}

// Yoda code
// if ('hello' == $a) { // valami, ha hello}
// „Normal”
// if ($a == 'hello') { // valami, ha hello}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
<?php if (!empty($error)) { ?>

    <ul style="border: 1px solid red; padding: 30px">
    <?php foreach ($error as $e) {?>
        <li><?php print $e ?></li>
    <?php } ?>
    </ul>
<?php } ?>
    
    <form action="post.php" method="POST">
    Név: <input type="text" name="nev">
    Szöveg: <input type="text" name="szoveg">
    <input type="submit" value="Hozzászólok">
    </form>
    <pre>
<?php
print file_get_contents('szoveg.txt');

$a = 0; // integer
if ($a == 0) {
    print "Az a 0. <br>" ;
}
if ($a === "0") {
    // ==-vel WUUUT?
    print "Az a 0? <br>";
}
?>
</pre>
</body>
</html>