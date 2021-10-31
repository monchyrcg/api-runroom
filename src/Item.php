<?php

declare(strict_types=1);

namespace Runroom\GildedRose;

class Item {

    public string $name;
    public int $sell_in;
    public int $quality;

    const name_age = 'Aged Brie';
    const name_backstage = 'Backstage passes to a TAFKAL80ETC concert';
    const name_sulfure = 'Sulfuras, Hand of Ragnaros';

    function __construct(string $name, int $sell_in, int $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function sellIsNegative(): void
    {
        if(!$this->equalName(self::name_age)){
            if(!$this->equalName(self::name_backstage)){
                if ($this->greaterThan('quality', 0)){
                    if(!$this->equalName(self::name_sulfure)){
                        $this->minusValue('quality');
                    }
                }
            } else {
                $this->setValue('quality',  0);
            }
        } else {
            if ($this->lessThan('quality', 50)){
                $this->addValue('quality');
            }
        }
    }

    public function qualityEqualFifty(): void
    {
        $this->addValue('quality');
        if($this->equalName(self::name_backstage)){
            if ($this->lessThan('sell_in', 11)){
                if ($this->lessThan('quality', 50)){
                    $this->addValue('quality');
                }
            }
            if ($this->lessThan('sell_in', 6)){
                if ($this->lessThan('quality', 50)){
                    $this->addValue('quality');
                }
            }
        }
    }

    public function equalName(string $name): bool
    {
        return $this->name == $name;
    }

    public function lessThan(string $name, int $value): bool
    {
        return $this->$name < $value;
    }

    public function greaterThan(string $name, int $value): bool
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

    public function setValue(string $name, int $value): void
    {
        $this->$name = $value;
    }
}
