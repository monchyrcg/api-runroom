<?php

namespace Runroom\GildedRose;

class GildedRose {

    private array $items;

    function __construct(array $items) {
        $this->items = $items;
    }

    function update_quality(): void {
        /**
         * @param array<string, int, int> $items
         */
        foreach ($this->items as $item) {
            if(!$item->equalName('Aged Brie') && !$item->equalName('Backstage passes to a TAFKAL80ETC concert')) {
                if ($item->greaterThan('quality', 0)){
                    if(!$item->equalName('Sulfuras, Hand of Ragnaros')){
                        $item->minusValue('quality');
                  }
                }
            } else {
                if ($item->lessThan('quality', 50)) {
                    $item->qualityEqualFifty();
                }
            }

            if(!$item->equalName('Sulfuras, Hand of Ragnaros')){
                $item->minusValue('sell_in');
            }

            if ($item->lessThan('sell_in', 0)){
                $item->sellIsNegative();
            }
        }
    }
}
