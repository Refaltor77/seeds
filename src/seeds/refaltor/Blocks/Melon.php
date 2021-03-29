<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Block;
use pocketmine\block\BlockToolType;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

class Melon extends Block
{
    public function __construct(int $meta = 0)
    {
        parent::__construct(self::MELON_BLOCK, $meta, $this->getName());
    }

    public function getName() : string{
        return "Melon Block";
    }

    public function getHardness() : float{
        return 1;
    }

    public function getToolType() : int{
        return BlockToolType::TYPE_AXE;
    }

    public function getDropsForCompatibleTool(Item $item) : array{
        return [];
    }
}