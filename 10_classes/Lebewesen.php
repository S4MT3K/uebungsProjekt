<?php
class Lebewesen // Unsere Oberklasse von der wir Vererben
{
    protected string $dna; //beschützten (Protected) string $dna

    public function __construct($dna)
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
