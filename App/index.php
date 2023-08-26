<?php 

$hanyadiklegnagyobb = 2;
# 1,2,3,4 -> 3
# 1,2,4,4 -> 4

$tomb = [
    1, 
    4, 
    4, 
    3,
];
$n = 3;

for ($i = 0; $i <= $n; $i++) {
    foreach($tomb as $index => $szam) {
        if ($index <= $i) {
            continue;
        }
        if ($szam > $tomb[$i] ) {
            $tomb[$index] = $tomb[$i];
            $tomb[$i] = $szam;
        }
    }
}

print($tomb[$n] . "\n");
print_r($tomb);
?>