<?php

namespace seeds\refaltor\Blocks;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\block\Flowable;
use pocketmine\block\Water;
use pocketmine\event\block\BlockGrowEvent;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\Player;

class Sugarcane extends Flowable
{
    public function __construct(int $meta = 0)
    {
        parent::__construct(self::SUGARCANE_BLOCK, $meta, $this->getName());
    }


    public function getName() : string{
        return "Sugarcane";
    }

    public function onActivate(Item $item, Player $player = null) : bool{
        if($item->getId() === Item::DYE and $item->getDamage() === 0x0F){
            if($this->getSide(Vector3::SIDE_DOWN)->getId() !== self::SUGARCANE_BLOCK){
                for($y = 1; $y < 3; ++$y){
                    $b = $this->getLevelNonNull()->getBlockAt($this->x, $this->y + $y, $this->z);
                    if($b->getId() === self::AIR){
                        $ev = new BlockGrowEvent($b, BlockFactory::get(Block::SUGARCANE_BLOCK));
                        $ev->call();
                        if($ev->isCancelled()){
                            break;
                        }
                        $this->getLevelNonNull()->setBlock($b, $ev->getNewState(), true);
                    }else{
                        break;
                    }
                }
                $this->meta = 0;
                $this->getLevelNonNull()->setBlock($this, $this, true);
            }

            $item->pop();

            return true;
        }

        return false;
    }

    public function onNearbyBlockChange() : void{
        $down = $this->getSide(Vector3::SIDE_DOWN);
        if($down->isTransparent() and $down->getId() !== self::SUGARCANE_BLOCK){
            $this->getLevelNonNull()->useBreakOn($this);
        }
    }

    public function ticksRandomly() : bool{
        return true;
    }

    public function onRandomTick() : void{
        if($this->getSide(Vector3::SIDE_DOWN)->getId() !== self::SUGARCANE_BLOCK){
            if($this->meta === 0x0F){
                for($y = 1; $y < 3; ++$y){
                    $b = $this->getLevelNonNull()->getBlockAt($this->x, $this->y + $y, $this->z);
                    if($b->getId() === self::AIR){
                        $ev = new BlockGrowEvent($b, BlockFactory::get(Block::SUGARCANE_BLOCK));
                        $ev->call();
                        if($ev->isCancelled()){
                            break;
                        }
                        $this->getLevelNonNull()->setBlock($b, $ev->getNewState(), true);
                        break;
                    }
                }
                $this->meta = 0;
                $this->getLevelNonNull()->setBlock($this, $this, true);
            }else{
                ++$this->meta;
                $this->getLevelNonNull()->setBlock($this, $this, true);
            }
        }
    }

    public function place(Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, Player $player = null) : bool{
        $down = $this->getSide(Vector3::SIDE_DOWN);
        if($down->getId() === self::SUGARCANE_BLOCK){
            $this->getLevelNonNull()->setBlock($blockReplace, BlockFactory::get(Block::SUGARCANE_BLOCK), true);

            return true;
        }elseif($down->getId() === self::GRASS or $down->getId() === self::DIRT or $down->getId() === self::SAND){
            $block0 = $down->getSide(Vector3::SIDE_NORTH);
            $block1 = $down->getSide(Vector3::SIDE_SOUTH);
            $block2 = $down->getSide(Vector3::SIDE_WEST);
            $block3 = $down->getSide(Vector3::SIDE_EAST);
            if(($block0 instanceof Water) or ($block1 instanceof Water) or ($block2 instanceof Water) or ($block3 instanceof Water)){
                $this->getLevelNonNull()->setBlock($blockReplace, BlockFactory::get(Block::SUGARCANE_BLOCK), true);

                return true;
            }
        }

        return false;
    }

    public function getVariantBitmask() : int{
        return 0;
    }
}