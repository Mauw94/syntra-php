<?php

class Klant {
    
    public $naam;
    public $tel;
    public $email;
    
    function __construct()
    {
        
    }

    public function emailVerification() {
        $from = "le_from@example.com";
        $to = "le_to@example.com";
        $bcc = "le_bcc@example.com";

        $header = "FROM: " . $from . "\r\n".
            "Reply-To: " . $from . "\r\n".
            "Return-Path: " . $from . "\r\n".
            "Message-ID: <" . time() . "." . $from . ">\r\n".
            "BCC: " . $bcc;

        $msg = "Click the link below to verify your e-mail.";
        $msg = wordwrap($msg, 70);
        mail($to, "Verify e-mail", $msg, $header);
    }

    public function canOrder($con, $email) {
        $today = date("Y-m-d");
        $sql = "SELECT bestelnr FROM broodje WHERE besteldatum = '$today'";
        $result = mysqli_query($con, $sql);        
        $output = mysqli_fetch_assoc($result);
        $bestelNr = $output['bestelnr'];

        $sqlFindNr = "SELECT * FROM klant WHERE bestelnr = '$bestelNr' AND email = '$email'";
        $resultNr = mysqli_query($con, $sqlFindNr);
        $output = mysqli_fetch_assoc($resultNr);
        if ($output != null) {
            return false;
        } else {
            return true;
        }
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