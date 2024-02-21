<?php

namespace prisoncore\esh123unicorn\listener\teleport;

use prisoncore\esh123unicorn\Main;

//event
use pocketmine\event\player\PlayerExperienceChangeEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;

//tasks
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\TaskScheduler;

//particles
use pocketmine\world\particle\SmokeParticle;
use pocketmine\world\particle\FlameParticle;
use pocketmine\world\particle\EnchantmentTableParticle;
use pocketmine\world\particle\EnchantParticle;

//pocketmine
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;
use pocketmine\item\Item;

use pocketmine\entity\Human;

use onebone\tokenapi\TokenAPI; //used in replacement of coins
use onebone\economyapi\EconomyAPI; //used in replacement of coins

//function 
use function time;
use function count;
use function floor;
use function microtime;
use function number_format;
use function round;

use pocketmine\utils\Config;

class PvPPortal implements Listener{
  
    private $plugin;
	
    public $position;
	

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
    public function getPlugin(){
	return $this->plugin;
    }
	
	
    /**
      * @param float|int $x
      * @param float|int $y
      * @param float|int $z
    */
    public function TeleportToPvP(Player $player) {
     	  $world = $this->getPlugin()->getServer()->getWorldByName("PvP");
     	  $player->teleport($world->getSafeSpawn());
	  $player->teleport(new Vector3(344, 155, 329, 0, 0));
    }
	
    public function warpFromSpawn(Player $player, float $x, float $z) {
	    $X = round($player->getPosition()->getX());
	    $Y = round($player->getPosition()->getY());
	    $Z = round($player->getPosition()->getZ());
	    $world = $player->getWorld();
	    if($X == $x and $Z == $z and $world->getWorldByName() == "world") {
	       $this->TeleportToPvP($player);
	    }
    }
	
    public function onPlayerMove(PlayerMoveEvent $event) : void{
	    $player = $event->getPlayer();
  
	    $this->warpFromSpawn($player, 23, -19);
	    $this->warpFromSpawn($player, 24, -19);
	    $this->warpFromSpawn($player, 25, -19);
	    $this->warpFromSpawn($player, 26, -19);
	    
	    $this->warpFromSpawn($player, 23, -18);
	    $this->warpFromSpawn($player, 24, -18);
	    $this->warpFromSpawn($player, 25, -18);
	    $this->warpFromSpawn($player, 26, -18);
    }
}    
