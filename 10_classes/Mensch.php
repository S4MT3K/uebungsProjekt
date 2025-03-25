<?php
class Mensch extends Lebewesen //Mensch erbt Methoden und eigenschaften (prperties / member) von Lebewesen
{
    private string $augenfarbe;
    private int $groesse;
    private string $haarfarbe;

    private Fingerabdruck $fingerabdruck;

    public function __construct($augenfarbe, $groesse, $haarfarbe, $dna)
    {
        parent::__construct($dna);
        $this->augenfarbe = $augenfarbe;
        $this->groesse = $groesse;
        $this->haarfarbe = $haarfarbe;
        $this->fingerabdruck = new Fingerabdruck();
    }

    public function getAugenfarbe() : string
    {
        return $this->augenfarbe;
    }

    public function setAugenfarbe(string $newAugenfarbe) : void
    {
        $this->augenfarbe = $newAugenfarbe;
    }

    public function getGroesse() : int
    {
        return $this->groesse;
    }

    public function setGroesse(int $newGroesse) : void
    {
        if($newGroesse >= 90 && $newGroesse <= 280)
        {
            $this->groesse = $newGroesse;
        }
        else
        {
            $this->groesse = 180;
        }
    }

    public function getHaarfarbe() : string // Mit dieser Methode kann die Haarfarbe ausgegeben werden
    {
        return $this->haarfarbe;
    }

    public function setHaarfarbe(string $newHaarfarbe)
    {
        $this->haarfarbe = $newHaarfarbe;
    }

    public function getFingerabdruck() : Fingerabdruck // Mit dieser Methode kann der Fingerabdruck ausgegeben werden
    {
        return $this->fingerabdruck;
    }
}

