<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Crops;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

class Wheat extends Crops{

    public function __construct(int $meta = 0)
    {
        parent::__construct(59, $meta, $this->getName());
    }

    public function getName() : string{
        return "Wheat Block";
    }


    public function getDropsForCompatibleTool(Item $item) : array{
        $drops = [];
        if($this->meta >= 0x07) {
            return [];
            }
        return [];
    }

    public function getPickedItem() : Item{
        return ItemFactory::get(Item::WHEAT_SEEDS);
    }
}