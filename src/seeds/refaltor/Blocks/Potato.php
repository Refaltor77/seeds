<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Crops;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

class Potato extends Crops
{

    public function __construct(int $meta = 0)
    {
        parent::__construct(self::POTATO_BLOCK, $meta, $this->getName());
    }

    public function getName(): string
    {
        return "Potato Block";
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