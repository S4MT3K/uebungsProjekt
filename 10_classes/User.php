<?php
class User extends Mensch
{


    private string $vorname;
    private string $nachname;
    private bool $bildungsgutschein;
    private DateTime $ausbildungsbeginn;

    /**
     * @param string $vorname
     * @param string $nachname
     * @param bool $bildungsgutschein
     * @param DateTime $ausbildungsbeginn
     */
    public function __construct(string $vorname, string $nachname, bool $bildungsgutschein, DateTime $ausbildungsbeginn, $augenfarbe, $groesse, $haarfarbe, $dna)
    {
        parent::__construct($augenfarbe, $groesse, $haarfarbe, $dna);
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->bildungsgutschein = $bildungsgutschein;
        $this->ausbildungsbeginn = $ausbildungsbeginn;
    }
}

