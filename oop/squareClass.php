<?php

class square {

    private $x;
    private $y;
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

    function move($x, $y) {
        $this->hide();
        $this->x = $x;
        $this->y = $y;
        $this->draw();
    }
}