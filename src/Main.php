<?php

declare(strict_types=1);

namespace _4ulag\Autorespawn;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\mcpe\protocol\GameRulesChangedPacket;
use pocketmine\network\mcpe\protocol\types\BoolGameRule;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlayerJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        
		$packet = GameRulesChangedPacket::create(
  		["doImmediateRespawn" => new BoolGameRule(true, false)]
		);

		$player->getNetworkSession()->sendDataPacket($packet);
    }
}
