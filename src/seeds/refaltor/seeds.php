<?php

namespace seeds\refaltor;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use seeds\refaltor\Blocks\Beetroot;
use seeds\refaltor\Blocks\Carrot;
use seeds\refaltor\Blocks\Melon;
use seeds\refaltor\Blocks\Nether_wart;
use seeds\refaltor\Blocks\Potato;
use seeds\refaltor\Blocks\Pumpkin;
use seeds\refaltor\Blocks\Sugarcane;
use seeds\refaltor\Blocks\TallGrass;
use seeds\refaltor\Blocks\Wheat;
use seeds\refaltor\events\dropsListener;

class seeds extends PluginBase
{
    /** @var seeds */
    public static $instance;

    public static function getConfigSeed(){
        return self::$instance;
    }
    public function onEnable(){
        $this->saveDefaultConfig();
        self::$instance = $this;
        BlockFactory::registerBlock(new Wheat(), true);
        BlockFactory::registerBlock(new Potato(), true);
        BlockFactory::registerBlock(new Carrot(), true);
        BlockFactory::registerBlock(new Nether_wart(), true);
        BlockFactory::registerBlock(new Melon(), true);
        BlockFactory::registerBlock(new Sugarcane(), true);
        BlockFactory::registerBlock(new Pumpkin(), true);
        BlockFactory::registerBlock(new Beetroot(), true);
        BlockFactory::registerBlock(new TallGrass(), true);
        Server::getInstance()->getPluginManager()->registerEvents(new dropsListener(), $this);
    }
}
