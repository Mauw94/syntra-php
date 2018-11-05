<?php
class Berekening {
    private $waarde1;
    private $waarde2;
    
    public function __construct($param1, $param2)
    {
        $this->waarde1 = $param1;
        $this->waarde2 = $param2;    
    }

    public function optel()
    {
        return $this->waarde1 + $this->waarde2;
    }

    public function aftrek()
    {
        return $this->waarde1 - $this->waarde2;
    }

    public function vermenig()
    {
        return $this->waarde1 * $this->waarde2;
    }
}

$a = 2;
$b = 4;
$bereken = new Berekening($a, $b);
echo $bereken->optel() . '<br>';
echo $bereken->aftrek() . '<br>';
echo $bereken->vermenig(). '<br>';
?>