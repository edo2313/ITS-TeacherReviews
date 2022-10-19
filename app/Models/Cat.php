<?php

namespace App\Models;

class Cat
{
    private string $color;
    private int $eyesNumber;
    private int $tailsNumber;

    public function __construct()
    {
        $this->color = "rosso";
        $this->eyesNumber = 2;
        $this->tailsNumber = 1;
    }

    public function meow(): string
    {
        return "Nyaa~";
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getEyesNumber(): int
    {
        return $this->eyesNumber;
    }

    public function setEyesNumber(int $eyesNumber): void
    {
        $this->eyesNumber = $eyesNumber;
    }

    public function getTailsNumber(): int
    {
        return $this->tailsNumber;
    }

    public function setTailsNumber(int $tailsNumber): void
    {
        $this->tailsNumber = $tailsNumber;
    }
}
