<?php

abstract class mozgathato {
    private $x;
    private $y; 
    
    function move($x, $y) {
        $this->hide();
        $this->x = $x;
        $this->y = $y;
        $this->draw();
    }
}

class circle implements mozgathato {

    
    private $sugar;

    function draw()
    {
        //...
    }

    function hide()
    {
        //...
    }

    function move($x, $y) {
        $this->hide();
        $this->x = $x;
        $this->y = $y;
        $this->draw();
    }
} 
