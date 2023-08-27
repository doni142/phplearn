<?php

$tomb = [1, 2, 3, 4, 5];
function maximumszam($tomb) {
    $max = $tomb[0];
    foreach($tomb as $ertek) {
        if ($max < $ertek) {
            $max = $ertek;
        }
    }
    return $max;
}
print 'Ez a maximumszám fv-m: ';
print maximumszam($tomb, function ($a, $b) {return ord($a) < ord($b);});
print "\n";

$tomb = ["a", "b", "c", "d", "e"];
function maximumkarakter($tomb) {
    $max = $tomb[0];
    foreach($tomb as $ertek) {
        if (ord($max) < ord($ertek)) {
            $max = $ertek;
        }
    }
    return $max;
}
print 'Ez a maximumkarakter fv-m: ';
print maximumkarakter($tomb, function ($a, $b) {return ord($a) < ord($b);});
print "\n";

function maximum($tomb) {
    $max = $tomb[0];
    foreach ($tomb as $ertek) {
        if ($max->kisebb($ertek)) {
            $max = $ertek;
        }
    }
    return $max;
}

interface osszehasonlito { 
    public function kisebb($masik);
}

class szam implements osszehasonlito {
    public $szam;
    public static $nagysagrend = 1;
    public static $format = "[szam] Ft";
    
    function __construct($szam)
    {
        $this->szam = $szam;
    }

    function kisebb($masik)
    {
        return $this->szam < $masik->szam;
    }

    public function __toString()
    {
        // '[szam] Ft' ,  [szam] -> 5 --- '5 FT'
       return strtr(static::$format, ['[szam]'=>(string)$this->szam * static::$nagysagrend]);
    }
}
class betu {
    public $betu;
    function __construct($betu)
    {
        $this->betu = $betu;
    }

    public function kisebb($masik)
    {
        return $this->betu < $masik->betu;
    }

    public function __toString()
    {
        return $this->betu;
    }
}

szam::$nagysagrend = 100;
szam::$nagysagrend = '$[szam]';
$tomb = [
    new szam(1),
    new szam(2),
    new szam(3), 
    new szam(4),
    new szam(5)
];
// $a = szam(6);
// $a->szam;
print maximum($tomb);
print "\n";

$tomb = [
    new betu('a'),
    new betu('b'),
    new betu('c'),
    new betu('d'),
    new betu('e')
];
print maximum($tomb);
print "\n";


$tomb = [1, 2, 3, 4, 5];
print maximum($tomb, function ($a, $b) {return $a < $b;});
print ' = Ez a maximum fv-m szám tömbbel';
print "\n";

$tomb = ['a', 'b', 'c', 'd', 'e'];
print maximum($tomb, function ($a, $b) {return ord($a) < ord($b);});
print ' = Ez a maximum fv-m betű tömbbel';
print "\n";


print 'Ez a maximum fv-m szám class-al => ';
print maximum($tomb, function ($a, $b) {return $a < $b;});
print "\n";


print 'Ez a maximum fv-m betű class-al => ';
print maximum($tomb, function ($a, $b) {return ord($a) < ord($b);});
print "\n";

/////////

class dbConnection {
    static private $egyetlen = null;
    public function __construct()
    {
        //
    }
    public static function addide() {
        if (is_null(static::$egyetlen)) {
            static::$egyetlen = new dbConnection();
        }
        return static::$egyetlen;
    }
}
$db = new dbConnection();

///
// $db = new dbConnection::addide();


abstract class mozgathato {
    private $x;
    private $y;

    abstract function hide();
    abstract function draw();
    
    function move($x, $y) {
        $this->hide();
        $this->x = $x;
        $this->y = $y;
        $this->draw();
    }
}

class circle extends mozgathato {
    
    private $sugar;

    function draw()
    {
        //...
    }

    function hide()
    {
        //...
    }

} 
class negyzet extends Mozgathato {

    /* private $x;
    private $y; */
    private $szelesseg;
    private $magassag;

    function draw()
    {
        //...
    }

    function hide()
    {
        //...
    }

}
