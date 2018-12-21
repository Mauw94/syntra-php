<?php

class InsertArtikel {
    
    private $con;
    private $datumVandaag;

    function __construct($con)
    {
        $this->con = $con;
        $this->datumVandaag = date('Y-m-d');
    }

    function insert($i) {
        $gepind = false;
        $artikel = $_POST['verkochte'.$i];
        $bedrag = $_POST['bedrag'.$i];
        if (isset($_POST['gepind'.$i])) {
            $gepind = $_POST['gepind'.$i];
        }
        $date = $this->datumVandaag;
        if ($gepind == 'on') {
            $gepind = true;
        }
        $sql = "INSERT INTO verkochte_artikelen VALUES(NULL, '$artikel', '$bedrag', '$gepind', '$date')";
        if (!mysqli_query($this->con, $sql)) {
            echo mysqli_error($this->con);
        }
    }
}