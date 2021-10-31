<?php

namespace Runroom\GildedRose;

class GildedRose {

    private  $items;

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        foreach ($this->items as $item) {
            if(!$item->equalName('Aged Brie') && !$item->equalName('Backstage passes to a TAFKAL80ETC concert')) {
                if ($item->greaterThan('quality', 0)){
                    if(!$item->equalName('Sulfuras, Hand of Ragnaros')){
                        $item->minusValue('quality');
                  }
                }
            } else {
                if ($item->lessThan('quality', 50)){
                    $item->addValue('quality');
                    if($item->equalName('Backstage passes to a TAFKAL80ETC concert')){
                        if ($item->lessThan('sell_in', 11)){
                            if ($item->lessThan('quality', 50)){
                                $item->addValue('quality');
                            }
                        }
                        if ($item->lessThan('sell_in', 6)){
                            if ($item->lessThan('quality', 50)){
                                $item->addValue('quality');
                            }
                        }
                    }
                }
            }

            if(!$item->equalName('Sulfuras, Hand of Ragnaros')){
                $item->minusValue('sell_in');
            }

            if ($item->lessThan('sell_in', 0)){
                if(!$item->equalName('Aged Brie')){
                    if(!$item->equalName('Backstage passes to a TAFKAL80ETC concert')){
                        if ($item->greaterThan('quality', 0)){
                            if(!$item->equalName('Sulfuras, Hand of Ragnaros')){
                                $item->minusValue('quality');
                            }
                        }
                    } else {
                        $item->setValue('quality',  0);
                    }
                } else {
                    if ($item->lessThan('quality', 50)){
                        $item->addValue('quality');
                    }
                }
            }
        }
    }
}
