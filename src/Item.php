<?php

declare(strict_types=1);

namespace Runroom\GildedRose;

class Item {

    public string $name;
    public int $sell_in;
    public int $quality;

    const MINUS = '<';

    function __construct(string $name, int $sell_in, int $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function equalName(string $name): bool
    {
        return $this->name == $name;
    }

    public function lessThan(string $name, $value): bool
    {
        return $this->$name < $value;
    }

    public function greaterThan(string $name, $value): bool
    {
        return $this->$name > $value;
    }

    public function addValue(string $name): void
    {
        $this->$name++;
    }

    public function minusValue(string $name): void
    {
        $this->$name--;
    }

    public function setValue(string $name, int $value)
    {
        $this->$name = $value;
    }
}
