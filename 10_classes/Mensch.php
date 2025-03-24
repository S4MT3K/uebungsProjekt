<?php
class Mensch
{
    private string $augenfarbe;
    private int $groesse;
    private string $haarfarbe;

    private Fingerabdruck $fingerabdruck;

    public function __construct($augenfarbe, $groesse, $haarfarbe)
    {
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

    public function getHaarfarbe() : string
    {
        return $this->haarfarbe;
    }

    public function setHaarfarbe(string $newHaarfarbe)
    {
        $this->haarfarbe = $newHaarfarbe;
    }

    public function getFingerabdruck() : Fingerabdruck
    {
        return $this->fingerabdruck;
    }
}

