<?php
# https://www.php.net/manual/en/pdo.connections.php
# $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);

$dbh = new PDO('mysql:host=localhost;dbname=elso_database', 'root', 'root');

//$dbh->query("...", PDO::FETCH_ASSOC)

# Jött törlő kérés
if (isset($_GET["op"]) && $_GET["op"] == 'delete') {
    $stmt = $dbh->prepare("DELETE FROM elso_tabla WHERE `elso_tabla`.`id` = ?");        
    $stmt->execute([$_GET['id']]);
}

$data = false;
if (isset($_GET["op"]) && $_GET["op"] == 'edit') {
    $stmt = $dbh->prepare("SELECT * FROM elso_tabla WHERE `elso_tabla`.`id` = ?");        
    $stmt->execute([$_GET['id']]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

# Jött adat
if (isset($_POST["name"])) {
    // Valid
    if (trim($_POST["name"]) !== '' ) {
        // SQL INJECTION !!!
        //$dbh->query("INSERT INTO `elso_tabla` (`id`, `name`, `created_at`, `modified_at`) VALUES (NULL, '" . $_POST["name"] . "', CURRENT_TIMESTAMP, NOW());", PDO::FETCH_ASSOC);        
        // Csak value https://palocz.hu/sql-injection/
        if ($_GET["op"] == 'edit') {
            $stmt = $dbh->prepare("UPDATE `elso_tabla` SET `name` = ?, `modified_at` = NOW() WHERE `elso_tabla`.`id` = ?;");        
            $stmt->execute([$_POST['name'], $_GET["id"]]);    
        } else {
            $stmt = $dbh->prepare("INSERT INTO `elso_tabla` (`id`, `name`, `created_at`, `modified_at`) VALUES (NULL, ?, CURRENT_TIMESTAMP, NOW());");        
            $stmt->execute([$_POST['name']]);    
        }
    }
    // dbtest.php?id=4&op=edit
    header('Location: dbtest.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if ($data === false) {?>

    <form action="dbtest.php" method="POST">
        <input type="text" name="name">
        <input type="submit" value="New">
    </form>

<?php } else {?>

    <form action="dbtest.php?id=<?php print urlencode($data["id"]);?>&op=edit" method="POST">
        <input type="text" name="name" value="<?php print htmlspecialchars($data["name"]);?>">
        <input type="submit" value="Save">
    </form>

<?php }?>

<ul>
<?php
$stm = $dbh->query('SELECT * FROM elso_tabla ORDER BY name', PDO::FETCH_ASSOC);
foreach ($stm as $row) {
    print '<li>';
    // XSS támagás elleni védelem.
    // <tag>[TEXT content]</tag>
    // <tag attributum="[ATTRIBUTUM VALE]">textcontent</tag>
    print(htmlspecialchars($row['name']));
    // <img src="http://[URL]">textcontent</tag>
    // urlencode()
    //print ('<img src="http://domain.hu/img/' . urlencode($img_path) . '" />')
    
    //CSRF Támadás

    print ' <a href="dbtest.php?id=' . urlencode($row["id"]) . '&op=edit">Edit</a>';
    print ' <a href="dbtest.php?id=' . urlencode($row["id"]) . '&op=delete">Delete</a>';
    print '</li>';
}

/*
ezt a kódót kibőviteni + 1 szöveges mező, 
megjelenés:
Név (titulus)
Név (titulus)

Űrlap
----- [Save]

Név: ....
Titulus ...
[Save]
*/

?>
</ul>
</body>
</html>