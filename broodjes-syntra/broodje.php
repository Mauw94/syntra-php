<?php
/*
{
    "soort":"smos",
    "brood":"wit",
    "groenten": ["sla", "ei"],
    "bestelnr": 19
}
*/
class Broodje {
    public $bestelNr;
    public $soort;
    public $brood;
    public $groeten = array();
    public $saus;
    public $aantal;
    public $bestelDatum;
    
    function __construct()
    {
        
    }

    function __toString()
    {
        return $this->soort . ' ' . $this->brood . ' ' . $this->groeten . ' ' . $this->saus . ' ' . $this->aantal . ' ' . $this->bestelDatum;
    }

    /**
     * Get the value of saus
     */ 
    public function getSaus()
    {
        return $this->saus;
    }

    /**
     * Set the value of saus
     *
     * @return  self
     */ 
    public function setSaus($saus)
    {
        $this->saus = $saus;

        return $this;
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

    /**
     * Get the value of soort
     */ 
    public function getSoort()
    {
        return $this->soort;
    }

    /**
     * Set the value of soort
     *
     * @return  self
     */ 
    public function setSoort($soort)
    {
        $this->soort = $soort;

        return $this;
    }

    /**
     * Get the value of brood
     */ 
    public function getBrood()
    {
        return $this->brood;
    }

    /**
     * Set the value of brood
     *
     * @return  self
     */ 
    public function setBrood($brood)
    {
        $this->brood = $brood;

        return $this;
    }

    /**
     * Get the value of groeten
     */ 
    public function getGroeten()
    {
        return $this->groeten;
    }

    /**
     * Set the value of groeten
     *
     * @return  self
     */ 
    public function setGroeten($groeten)
    {
        $this->groeten = $groeten;

        return $this;
    }

    /**
     * Get the value of aantal
     */ 
    public function getAantal()
    {
        return $this->aantal;
    }

    /**
     * Set the value of aantal
     *
     * @return  self
     */ 
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * Get the value of bestelDatum
     */ 
    public function getBestelDatum()
    {
        return $this->bestelDatum;
    }

    /**
     * Set the value of bestelDatum
     *
     * @return  self
     */ 
    public function setBestelDatum($bestelDatum)
    {
        $this->bestelDatum = $bestelDatum;

        return $this;
    }
}

?>