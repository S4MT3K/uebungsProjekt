<?php
class User extends Mensch
{
    private string $vorname;
    private string $nachname;
    private bool $bildungsgutschein;
    private DateTime $ausbildungsbeginn;
    private static int $instances = 0; //Static bedeutet, dass diese Variable NUR für die KLASSE, nicht aber für das Objekt selbst steht.
                                   //Sie ist also nur INNERHALB der aktuellen Klasse verfügbar bzw. Sichtbar.

    /**
     * @param string $vorname
     * @param string $nachname
     * @param bool $bildungsgutschein
     * @param DateTime $ausbildungsbeginn
     */

    //DEKLARATION (Blaupause, Konstruktionsplan der klasse)
    public function __construct(string $vorname, string $nachname, bool $bildungsgutschein, DateTime $ausbildungsbeginn, string $augenfarbe, int $groesse, string $haarfarbe, string $dna)
    {
        parent::__construct($augenfarbe, $groesse, $haarfarbe, $dna);
        //eine elternklasse (in diesem Fall Lebewesen) hat einen einen Konstruktor, dieser muss bei Aufrufen des eigenen Konstruktors mit aufgerufen werden
        //die dabei benötigten variablen werden dem aktuellen Konstruktor mit Übergeben
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->bildungsgutschein = $bildungsgutschein;
        $this->ausbildungsbeginn = $ausbildungsbeginn;
        //User::$instances++;
        self::$instances++;
    }

    public static function getCountOfInstances()
    {
        return self::$instances;
    }

    public function getVorname(): string
    {
        return $this->vorname;
    }
    public function setVorname(string $newVorname)
    {
        $this->vorname = $newVorname;
    }

    public function getNachname(): string
    {
        return $this->nachname;
    }

    public function setNachname(string $newNachname)
    {
        $this->nachname = $newNachname;
    }

    public function getBildungsgutschein(): bool
    {
        return $this->bildungsgutschein;
    }

    public function getAusbildungsbeginn(): DateTime
    {
        return $this->ausbildungsbeginn;
    }
}
