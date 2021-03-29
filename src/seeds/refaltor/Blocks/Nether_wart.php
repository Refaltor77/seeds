<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Block;
use pocketmine\block\Flowable;
use pocketmine\event\block\BlockGrowEvent;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\math\Vector3;
use pocketmine\Player;

class Nether_wart extends Flowable{

    public function __construct(int $meta = 0)
    {
        parent::__construct(self::NETHER_WART_PLANT, $meta, $this->getName());
    }

    public function getName() : string{
        return "Nether Wart";
    }

    public function place(Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, Player $player = null) : bool{
        $down = $this->getSide(Vector3::SIDE_DOWN);
        if($down->getId() === Block::SOUL_SAND){
            $this->getLevelNonNull()->setBlock($blockReplace, $this, false, true);

            return true;
        }

        return false;
    }

    public function onNearbyBlockChange() : void{
        if($this->getSide(Vector3::SIDE_DOWN)->getId() !== Block::SOUL_SAND){
            $this->getLevelNonNull()->useBreakOn($this);
        }
    }

    public function ticksRandomly() : bool{
        return true;
    }

    public function onRandomTick() : void{
        if($this->meta < 3 and mt_rand(0, 10) === 0){ //Still growing
            $block = clone $this;
            $block->meta++;
            $ev = new BlockGrowEvent($this, $block);
            $ev->call();
            if(!$ev->isCancelled()){
                $this->getLevelNonNull()->setBlock($this, $ev->getNewState(), false, true);
            }
        }
    }

    public function getDropsForCompatibleTool(Item $item) : array{
        return [];
    }

    public function isAffectedBySilkTouch() : bool{
        return false;
    }
}