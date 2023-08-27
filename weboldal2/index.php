<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

function view($template, $tpl) {
    ob_start();
    include('template/' . $template . '.php');
    return ob_get_clean();
}

/*
 * Debug a képernyore
 */
function debugVar($var, $title = '') {
    if ($title) {
        print '<h3>' . $title . ':</h3>';
    }
    print '<pre>';
    print_r($var);
    print '</pre>';
}
//*/

#print_r($_GET);
#print_r($_SERVER);
# http://localhost:8888/weboldal2/index.php?alma=5&korte=3&barack[egy][]=7&barack[ketto]=4&barack[harom]=1

// Get the data, fill up the $data array.
include('model/data.php');

if (!isset($_GET['q'])) {
    $_GET['q'] = 'default'; // Fooldal
}
switch ($_GET['q']) {
    case 'aloldal':
        include('controller/aloldal.php');
        break;

    case 'pets':
        include('controller/pets.php');
        break;

    case 'fooldal':
    default:
            include('controller/fooldal.php');
            break;
}

/*
//!!!!DANGER!!!!!
if (isset($_GET['q'])) {
    $oldal = $_GET['q'];
} else {
    $oldal = 'fooldal';
}
include('controller/'. $oldal . '.php'); // controller/fooldal.php
*/
$full_content = view('index', [
    'title' => $title,
    'content' => $content
]);
print ($full_content);
//hf bootstrap!