<?php

/*
Kell egy pet form.
A form értékeket fel kell dolgozni: 
    - a megnevezés nem lehet üres
    - a megnevezés ne szerepeljen már a pets-ek között
$data tömbhöz hozzáadni az új értéket a pets-ekhez
a $data tömböt encode-olni jsonná – json_encode()
A json értéket kiírni file_put_contents()
*/

$title = 'Pets';
$content = view('vpets', $data);

// $data = json_decode(file_get_contents('./data.json'), true);
debugVar($_POST, 'POST');

// Ellenőrizzük, történt-e sumit = a $_POST-ban van valami
if (isset($_POST['species'])){
    $error = [];
    // Az user adatok feldolgozása:
    $species = trim($_POST['species']);
    $name = trim($_POST['name']);

    // Hiba ellenőrzés a speciesben.
    if ('' === $species) {
        $error[] = "A fajta? mező nem lehet üres! Írjon be valamint!";
    }
    // Hiba ellenőrzés a nameben. 
    if ('' === $name) {
        $error[] = "A név mező nem lehet üres! Írjon be valamint!";
    }
    // Hiba ellenőrzés, ha űres.
    if (empty($error)) {
        debugVar('', 'nincs error, írd ki.');
        $new_pet = [];
        $new_pet['name'] = $name;
        $new_pet['species'] = $species;

        /** Alternatív tömb: */
        /*
        $new_pet = [
            'name' => $name,
            'species' => $species,
        ];
        //*/

        debugVar($new_pet, 'new pet data');
        
        // data's pets + new pet:
        $data['pets'][] = $new_pet;

        debugVar($data, 'data + new pet added');

        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        debugVar($json, 'new json');
        //$data['pets'][]
        // Nincs hiba - kiírjuk az új comment.
        file_put_contents('data.json', $json);
    }
}

// Yoda code
// if ('hello' == $a) { // valami, ha hello}
// „Normal”
// if ($a == 'hello') { // valami, ha hello}

//hf data.json legyen olyan rész ahol tudok hozzáadni új állatokat, csak név és típus, és szülévet. Űrlap, 1 file
//jsondecode/encode
//hozzáadás post.php 
//megpróbáln törölni állatot
//hogyan lehet szerkeszteni név az azonosító

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Állat</title>
</head>
<body>
    
<?php if (!empty($error)) { ?>

    <ul style="border: 1px solid red; padding: 30px">

    <?php foreach ($error as $e) {?>

        <li><?php print $e ?></li>

    <?php } ?>
    </ul>

<?php } ?>

    <form action="index.php?q=pets" method="POST">
    Állatneve: <input type="text" name="name">
    Fajta: <input type="text" name="species">
    <input type="submit" value="Elmentem ezt az állat">
    <input type="hidden" name="secret" value="xxx">
    </form>
    <pre>

<?php
print_r(json_decode(file_get_contents('./data.json')));
?>

</pre>
</body>
</html>