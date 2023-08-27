<?php

use Masik\MasikClass;

class Test
{
    public $publicVar;
    private $privateVar;
    protected $protectedVar;
    
    public function __construct($publicVar, $privateVar){
        $this->publicVar = $publicVar;
        $this->privateVar = $privateVar;
    }
    public function publicFunction() {
        print $this->publicVar . "\n";
        print $this->privateVar ."\n";
    }
}


$obj1 = new Test('public1', 'private1');
$obj2 = new Test('public2', 'private2');

$obj1->publicVar = "public";
$obj1->publicFunction();


interface Controller {
    public function getTitle():string;
    public function getContent():string;
}


class Aloldal implements Controller {
    public function getTitle():string {
        return 'Ez egy title';
    }

    public function getContent():string {
        return 'content';
    }
}
#----------------------
#Abstract class -bizonyos működési logikát tartalmaz

abstract class Oldal {
    public function show() {
        print $this->getTitle();
        print $this->getContent();
    }
    abstract function getTitle():string; 
    abstract function getContent():string; 
} 

class Aloldal2 extends Oldal {
    public function getTitle():string {
        return 'Ez egy title';
    }

    public function getContent():string {
        return 'content';
    }
}

trait NakedShow {
    public function show() {
        print $this->getTitle();
        print $this->getContent();
    }
}

trait HtmlShow {
    public function show() {
        print '<h1>' . $this->getTitle() . '</h1>';
        print $this->getContent();
    }
}

class Aloldal3 implements Controller {
    use NakedShow;

    public function getTitle():string {
        return 'Ez egy title';
    }

    public function getContent():string {
        return 'content';
    }    
}

$obj5 = new Aloldal3();
$obj5->show();

# kulcsszavak
# class(extend), interface(implements), trait(use)
# private, public, protected
# 
# include('./oopfile.php');
spl_autoload_register(function ($class_name){
    print ($class_name). "\n";
    $class_name = strtr($class_name, '\\', '/');
    include('./' . $class_name . '.php');
});

$obj6 = new fileBan();
$obj7 = new MasikClass;