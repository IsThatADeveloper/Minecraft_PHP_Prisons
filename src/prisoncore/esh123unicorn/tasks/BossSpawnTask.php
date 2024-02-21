<?php

namespace prisoncore\esh123unicorn\tasks;

//math and level
use pocketmine\world\Location;
use pocketmine\world\WorldExpection;
use pocketmine\world\WorldProvider;
use pocketmine\world\ProviderManager;
use pocketmine\world\World;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\scheduler\Task as PluginTask;
use pocketmine\Server;
use pocketmine\plugin\Plugin;
use pocketmine\world\Position;
use Bosses\Entities\ForgottenKing;
use Bosses\Entities\ForgottenNome;
use Bosses\Entities\ForgottenSkeleton;
use pocketmine\console\ConsoleCommandSender;

use prisoncore\esh123unicorn\Main;

class BossSpawnTask extends PluginTask {
  
    private $plugin;
	
    public function __construct(Plugin $plugin){
	      $this->plugin = $plugin;
    }

    public function getPlugin(){
	      return $this->plugin;
    }
  
    public function onRun(): void{
	 $server = $this->getPlugin()->getServer();
	 $language = $this->getPlugin()->getServer()->getLanguage();
         $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "despawnboss");
         $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "spawnboss");
    }
}
