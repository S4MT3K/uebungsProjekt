<?php
class Fingerabdruck
{
    private string $text;

    public function __construct()
    {
        $text = "hübscher Finger";
        $this->text = $text;
    }

    public function getFingerabdruckFromUser() : string
    {
        return $this->text;
    }
}