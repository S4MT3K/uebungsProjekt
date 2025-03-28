<?php
class Mensch extends Lebewesen //Mensch erbt Methoden und eigenschaften (prperties / member) von Lebewesen
    //das keyword extends initialisiert eine vererbung der genannten klasse
{
    //private Fingerabdruck $fingerabdruck;

    //public function __construct(string $augenfarbe, int $groesse, string $haarfarbe, string $dna)
   // {
        //parent::__construct($dna);
        //eine elternklasse (in diesem Fall Lebewesen) hat einen einen Konstruktor, dieser muss bei Aufrufen des eigenen Konstruktors mit aufgerufen werden
        //die dabei benötigten variablen werden dem aktuellen Konstruktor mit Übergeben
       // $this->augenfarbe = $augenfarbe;
        //$this->groesse = $groesse;
        //$this->haarfarbe = $haarfarbe;
        //da unser Fingerabdruck zu "uns" gehört, woird dieser in der menschklasse SOFORT instanziiert (objekt orientiertes denken).
        //Sie benötigt keinerlei übergabeparameter und ist somit ein teil des Menschen.
        //$this->fingerabdruck = new Fingerabdruck();
    //}
    //Nachfolgend Getter und Setter
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

    public function getFingerabdruckObject() : Fingerabdruck // Mit dieser Methode kann der Fingerabdruck ausgegeben werden
    {
        return $this->fingerabdruck;
    }
}

