<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Block;
use pocketmine\block\BlockToolType;
use pocketmine\block\Solid;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\Player;

class Pumpkin extends Solid
{
    public function __construct(int $meta = 0)
    {
        parent::__construct(self::PUMPKIN, $meta, $this->getName());
    }

    public function getHardness() : float{
        return 1;
    }

    public function getToolType() : int{
        return BlockToolType::TYPE_AXE;
    }

    public function getName() : string{
        return "Pumpkin";
    }

    public function place(Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, Player $player = null) : bool{
        if($player instanceof Player){
            $this->meta = ((int) $player->getDirection() + 1) % 4;
        }
        $this->getLevelNonNull()->setBlock($blockReplace, $this, true, true);

        return true;
    }

    public function getVariantBitmask() : int{
        return 0;
    }
}
