<?php

class Myclass {
    private $name;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

$obj = new Myclass();
$obj->setName("Benő");
echo $obj->getName();