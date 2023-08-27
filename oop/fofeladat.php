<?php

// itt kezdődik a feladat->
/* 
Tervezz meg egy osztály struktúrát a következő helyzetre:
Egy szervezetben két féle munkavállaló (employee) lehetséges: worker, vagy manager.
Egy manager kivételével minden munkavállalónak van egy managere.
Legyen képes arra a struktúra, hogy egy managerre rábökve ki tudja számítani annak a managernek,
és az összes "alatta levő" munkavállaló fizetésének az összegét. */

use Doctrine\Inflector\Rules\Word;

class Worker {
    private $fizetes;

    public function __construct($fizetes)
    {
        $this->fizetes = $fizetes;
    }

    public function getFizetes()
    {
        return $this->fizetes;
    }
}

class Manager extends Worker {
    public $workers = [];

    public function addWorker(Worker $workers)
    {
        $this->workers[] = $workers;
    }

    public function getFizetes()
    {
        $osszeg = parent::getFizetes();
        foreach($this->workers as $worker) {
            $osszeg += $worker->getFizetes();
        }
        return $osszeg;
    }
}

$m1 = new Manager(100);
$m1->addWorker(new Worker(10));
$m1->addWorker(new Worker(20));
$m1->addWorker(new Worker(30));

$m2 = new Manager(200);
$m2->addWorker(new Worker(40));
$m2->addWorker(new Worker(50));
$m2->addWorker(new Worker(60));
$m2->addWorker($m1);

print $m2->getFizetes();
