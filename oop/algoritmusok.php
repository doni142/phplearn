<?php

// összegzés
$osszeg = 0;
$osszegek = [123, 567, 987];
foreach ($osszegek as $index); {
    //$index = $index + $osszeg;
    echo $index;
};


// Eldöntés  Absztrakt megoldás
function vanebenne ($tomb, $keresettertek){
    foreach ($tomb as $ertek) {
        if ($ertek === $keresettertek) {
            return true;      
        }
    };
    return false;
};

if (vanebenne($osszegek, 987)) {
    print('van benne');
}
else {
    print('nincs benne');
}


// kiválasztás
//foreach ($osszegek as $index) {
//    if $index };

// megszámlálás 
// maximum / minimum
// kiválogatás
// elemi rendezések