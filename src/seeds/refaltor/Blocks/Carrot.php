<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Crops;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

class Carrot extends Crops{
    public function __construct(int $meta = 0)
    {
        parent::__construct(self::CARROT_BLOCK, $meta, $this->getName());
    }

    public function getName(): string
    {
        return "Carrot Block";
    }


    public function getDropsForCompatibleTool(Item $item): array
    {
        return [];
    }

    public function getPickedItem(): Item
    {
        return ItemFactory::get(Item::POTATO);
    }
}