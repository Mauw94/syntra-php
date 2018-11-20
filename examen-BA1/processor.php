<?php
class Processor {

    private $winnaar = FALSE;
    public $geluksgetal; 
    private $gewonnen = 0;
    private $con;

    /*
    * Geeft de connectie mee met de constructor
    */
    function __construct($con)
    {
        $this->con = $con;
    }
    /*
    * bereken The Lucky Number op basis van het ingegeven nr en geeft het terug
    */
    public function calculateLuckyNumber($getal) {
        $rnd = rand(4, 6);
        $this->geluksgetal = $getal * $rnd;
        return $this->geluksgetal;
    }
    /*
    * Feliciteert de gebruiker als The Lucky Number tussen 25 en 35 ligt
    */
    public function felicitatie() {
        if ($this->geluksgetal > 25 && $this->geluksgetal < 35) {
            echo "Gefeliciteerd!";
            $this->winnaar = TRUE;
        } else {
            echo "U heeft niet gewonnen.";
        }
    }
    /*
    * Slaat de data van de gebruiker op in de db
    * Als de gebruiker gewonnen heeft ($winnaar) 
    * wordt dit ook bijgehouden in de db als een boolean (1 OF 0)
    */
    public function save($naam, $voornaam) {
        if ($this->winnaar === TRUE) {
            $this->gewonnen = 1;
        }
        $getal = $this->geluksgetal;
        $won = $this->gewonnen;
        $sql = "INSERT INTO deelnemers VALUES (NULL, '$naam', '$voornaam', '$getal', '$won')";
        if (mysqli_query($this->con, $sql)) {
            echo "<br>Added.";
        } else {
            echo "<br>Something went wrong.";
        }
    }
}
?>