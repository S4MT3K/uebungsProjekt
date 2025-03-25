<?php
//abstrakte klassen lassen sich mit dem new keyword nicht aufrufen bzw. instanzieren, das heisst, das ein objekt nicht aus der klasse Lebewesen erstellt werden kann"
abstract class Lebewesen // Unsere Oberklasse von der wir Vererben
{
    protected string $dna; //beschützten (Protected) string $dna
    //ist innerhalb der vererbten klassen "sichtbar" bzw. Anrufbar

    public function __construct(string $dna)
    {
        $this->dna = $dna;
    }

    /**
     * @return string
     */
    public function getDna(): string //getter zum ausgeben der DNA bzw. der $variable
    {
        return $this->dna;
    }
}
