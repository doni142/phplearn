<?php

class MyClass {
    public static $count = 0;

    public function __construct() {
        self::$count++;
    }
}

echo Myclass::$count;
$obj1 = new MyClass();
echo MyClass::$count;
$obj2 = new MyClass();
echo MyClass::$count; 

class MathUtils {
    public static function add($a, $b) {
        return $a + $b;
    }
}
echo MathUtils::add(2, 3);