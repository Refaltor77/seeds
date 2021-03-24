<?php

namespace seeds\refaltor;

use pocketmine\plugin\PluginBase;
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
        self::getServer()->getPluginManager()->registerEvents(new dropsListener(), $this);
    }
}