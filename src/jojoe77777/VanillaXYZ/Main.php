<?php

namespace jojoe77777\VanillaXYZ;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\mcpe\protocol\GameRulesChangedPacket;
use pocketmine\plugin\PluginBase;
use pocketmine\network\mcpe\protocol\types\IntGameRule;

class Main extends PluginBase implements Listener {
   public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlayerJoin(PlayerJoinEvent $ev){
        $pk = GameRulesChangedPacket::create(["showcoordinates" => new IntGameRule(1, true)]);
        $ev->getPlayer()->getNetworkSession()->sendDataPacket($pk);
    }
}
