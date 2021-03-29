<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\block\BlockToolType;
use pocketmine\block\Flowable;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\math\Vector3;
use pocketmine\Player;

class TallGrass extends Flowable
{
    public function __construct(int $meta = 0)
    {
        parent::__construct(self::TALL_GRASS, $meta, $this->getName());
    }
    public function canBeReplaced() : bool{
        return true;
    }

    public function getName() : string{
        static $names = [
            0 => "Dead Shrub",
            1 => "Tall Grass",
            2 => "Fern"
        ];
        return $names[$this->getVariant()] ?? "Unknown";
    }

    public function place(Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, Player $player = null) : bool{
        $down = $this->getSide(Vector3::SIDE_DOWN)->getId();
        if($down === self::GRASS or $down === self::DIRT){
            $this->getLevelNonNull()->setBlock($blockReplace, $this, true);

            return true;
        }

        return false;
    }

    public function onNearbyBlockChange() : void{
        if($this->getSide(Vector3::SIDE_DOWN)->isTransparent()){ //Replace with common break method
            $this->getLevelNonNull()->setBlock($this, BlockFactory::get(Block::AIR), true, true);
        }
    }

    public function getToolType() : int{
        return BlockToolType::TYPE_SHEARS;
    }

    public function getToolHarvestLevel() : int{
        return 1;
    }

    public function getDrops(Item $item) : array{
        if($this->isCompatibleWithTool($item)){
            return parent::getDrops($item);
        }
        if(mt_rand(0, 15) === 0){
            return [];
        }

        return [];
    }

    public function getFlameEncouragement() : int{
        return 60;
    }

    public function getFlammability() : int{
        return 100;
    }
}