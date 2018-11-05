<?php
class sorteer {
    private $sorteer;
    public function __construct(array $sorteer)
    {
        $this->sorteer = $sorteer;
    }

    public function sorteerArray() {
        sort($this->sorteer, SORT_NATURAL);
    }

    public function getSorteerArray()
    {
        return $this->sorteer;
    }
}

$strings = array("ha", "bla", "ka", "tja", "rha");
echo 'original: ' . '<br>';
foreach ($strings as $string) {
    echo $string . ' ';
}
echo '<br>';
$obj = new sorteer($strings);
$obj->sorteerArray();
$strings = $obj->getSorteerArray();
echo 'sorted: ' . '<br>';
foreach ($strings as $string) {
    echo $string . ' ';
}
?>