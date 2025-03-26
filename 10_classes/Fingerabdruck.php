<?php
class Fingerabdruck
{
    private string $text;

    public function __construct()
    {
        $text = random_int(0, 42);
        //$text = "hübscher Finger";
        $this->text = $text;
    }

    public function getFingerabdruckFromUser() : string
    {
        return $this->text;
    }
}