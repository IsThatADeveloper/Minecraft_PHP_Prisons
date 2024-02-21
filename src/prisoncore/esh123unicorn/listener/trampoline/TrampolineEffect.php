<?php

namespace prisoncore\esh123unicorn\listener\trampoline;

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
use pocketmine\block\Block;
use pocketmine\world\World;
use pocketmine\world\Position;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;

use pocketmine\entity\Human;

//function 
use function time;
use function count;
use function floor;
use function microtime;
use function number_format;
use function round;

use pocketmine\utils\Config;

class TrampolineEffect implements Listener{
  
    private $plugin;
	
    public $permission;
	
    public $defense;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
    public function getPlugin(){
	return $this->plugin;
    }

    public function onMove(PlayerMoveEvent $event){
		$player = $event->getPlayer();
		$x = $player->getPosition()->getX();
		$y = $player->getPosition()->getY();
		$z = $player->getPosition()->getZ();
		$world = $player->getWorld();
		$block = $world->getBlock($player->getPosition()->getSide(0));
		if($block->getID() == 165){
		   $world->addParticle(new FlameParticle($player));
		   $world->addParticle(new FlameParticle(new Vector3($x-0.3, $y, $z)));
		   $world->addParticle(new EnchantParticle(new Vector3($x, $y, $z-0.3)));
		   $world->addParticle(new EnchantmentTableParticle(new Vector3($x+0.3, $y, $z)));
		   $world->addParticle(new EnchantmentTableParticle(new Vector3($x, $y, $z+0.3)));
		   $player->setMotion(new Vector3(-1.1, 1.3, 0));
		}
    }
}

