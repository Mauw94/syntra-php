<?php

class Koe {
    public $naam;
    public $litersMelk;
    public $datumIngave;
    public $opmerking;

    public function __construct()
    {
    }

    

    /**
     * Get the value of naam
     */ 
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set the value of naam
     *
     * @return  self
     */ 
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get the value of litersMelk
     */ 
    public function getLitersMelk()
    {
        return $this->litersMelk;
    }

    /**
     * Set the value of litersMelk
     *
     * @return  self
     */ 
    public function setLitersMelk($litersMelk)
    {
        $this->litersMelk = $litersMelk;

        return $this;
    }

    /**
     * Get the value of datumIngave
     */ 
    public function getDatumIngave()
    {
        return $this->datumIngave;
    }

    /**
     * Set the value of datumIngave
     *
     * @return  self
     */ 
    public function setDatumIngave($datumIngave)
    {
        $this->datumIngave = $datumIngave;

        return $this;
    }

    /**
     * Get the value of opmerking
     */ 
    public function getOpmerking()
    {
        return $this->opmerking;
    }

    /**
     * Set the value of opmerking
     *
     * @return  self
     */ 
    public function setOpmerking($opmerking)
    {
        $this->opmerking = $opmerking;

        return $this;
    }
}

?>