<?php

class Klant {
    
    public $naam;
    public $tel;
    public $email;
    
    function __construct()
    {
        
    }



    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
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
}
?>