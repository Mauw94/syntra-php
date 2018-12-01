<?php

class PoeMap {

    /*
    *   PoeMap variables
    */
    public $name;
    public $tier;
    public $isUnique;
    public $level;
    public $isOnAtlas;

    /*
    *   PoeMap constructor
    */
    function __construct($name, $tier, $isUnique, $level, $isOnAtlas)
    {
        $this->name = $name;
        $this->tier = $tier;
        $this->isUnique = $isUnique;
        $this->level = $level;
        $this->isOnAtlas = $isOnAtlas;
    }
}
?>