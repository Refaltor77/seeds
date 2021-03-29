<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Crops;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

class Beetroot extends Crops
{
    public function __construct(int $meta = 0)
    {
        parent::__construct(self::BEETROOT_BLOCK, $meta, $this->getName());
    }

    public function getName() : string{
        return "Beetroot Block";
    }

    public function getDropsForCompatibleTool(Item $item) : array{
        if($this->meta >= 0x07){
            return [];
        }
        return [];
    }

    public function getPickedItem() : Item{
        return ItemFactory::get(Item::BEETROOT_SEEDS);
    }
}