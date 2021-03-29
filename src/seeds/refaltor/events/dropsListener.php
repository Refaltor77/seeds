<?php

namespace seeds\refaltor\events;

use pocketmine\block\Block;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use seeds\refaltor\seeds;

class dropsListener implements Listener
{
    public function onBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $item = $event->getItem();


        if ($block->getId() === Block::WHEAT_BLOCK && $block->getDamage() === 7){
            foreach(seeds::getConfigSeed()->getConfig()->get("blé") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::CARROT_BLOCK && $block->getDamage() === 7){
            foreach(seeds::getConfigSeed()->getConfig()->get("carrote") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::POTATO_BLOCK && $block->getDamage() === 7){
            foreach(seeds::getConfigSeed()->getConfig()->get("patate") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::NETHER_WART_PLANT && $block->getDamage() === 7){
            foreach(seeds::getConfigSeed()->getConfig()->get("verrue du nether") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::MELON_BLOCK){
            foreach(seeds::getConfigSeed()->getConfig()->get("melon") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::SUGARCANE_BLOCK){
            foreach(seeds::getConfigSeed()->getConfig()->get("canne a sucre") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::PUMPKIN){
            foreach(seeds::getConfigSeed()->getConfig()->get("citrouille") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::CACTUS){
            foreach(seeds::getConfigSeed()->getConfig()->get("cactus") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::BEETROOT_BLOCK && $block->getDamage() === 7){
            foreach(seeds::getConfigSeed()->getConfig()->get("beterave") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
        if ($block->getId() === Block::TALL_GRASS){
            foreach(seeds::getConfigSeed()->getConfig()->get("haute herbe") as $drop){
                $drop = explode(":", $drop);
                if (mt_rand(1, $drop[3]) === 1){
                    $event->setDrops([Item::get($drop[0], $drop[1], $drop[2])]);
                }
            }
        }
    }
}
