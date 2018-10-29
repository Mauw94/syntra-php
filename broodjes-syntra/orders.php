<?php

class Orders {

    public $bestelNr;
    
    function __construct($con)
    {
        $today = date("Y-m-d");
        $this->addBestelling($today, $con);
    }

    private function addBestelling($today, $con) {
        $sql = "INSERT INTO bestellingen VALUES(null, '$today')";
        if (mysqli_query($con, $sql)) {
            $this->updateBestelNr($con);
        }
    }

    private function updateBestelNr($con) {
        $today = date("Y-m-d");
        $sql = "SELECT id FROM bestellingen WHERE datum = '$today'";
        $result = mysqli_query($con, $sql);
        while ($output = mysqli_fetch_assoc($result)) {
            $this->setBestelNr($output['id']);
        }
    }

    /**
     * Get the value of bestelNr
     */ 
    public function getBestelNr()
    {
        return $this->bestelNr;
    }

    /**
     * Set the value of bestelNr
     *
     * @return  self
     */ 
    public function setBestelNr($bestelNr)
    {
        $this->bestelNr = $bestelNr;

        return $this;
    }
}

?>