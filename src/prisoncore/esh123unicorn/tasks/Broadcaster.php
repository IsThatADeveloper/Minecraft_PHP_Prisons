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
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use function time;
use function shuffle;

use prisoncore\esh123unicorn\Main;

class Broadcaster extends PluginTask {

    private $plugin;
	
    public function __construct(Plugin $plugin){
	      $this->plugin = $plugin;
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function onRun(): void{
	    if($this->getPlugin()->time == 0) {
            $mt = mt_rand(1, 7);
	    if($mt === 1) {
	       $this->getPlugin()->getServer()->broadcastMessage("->> §aEnjoying our server, to help us out vote here https://minecraftpocket-servers.com/server/101993/§6!");
	    }
	    if($mt === 2) {
	       $this->getPlugin()->getServer()->broadcastMessage("->> §aWant to know how to use plots? Then do /p help§6!");
	    }
	    if($mt === 3) {
	       $this->getPlugin()->getServer()->broadcastMessage("->> §aWish to know what Ces do then try /ce info or do /ce list§6!");
	    }
	    if($mt === 4) {
	       $this->getPlugin()->getServer()->broadcastMessage("->> §aThink you can help us out apply for staff on our discord https://discord.gg/MagRpwR§6!");
	    }
	    if($mt === 5) {
	       $this->getPlugin()->getServer()->broadcastMessage("->> §aWant amazing kits, visit our shop§6: mcpeprisonblock.buycraft.net/§6!");
	    }
	    if($mt === 6) {
	       $this->getPlugin()->getServer()->broadcastMessage("->> §aWant to make your own gang do /g create <gang> §6!");
	    }
	    if($mt === 7) {
	       $this->getPlugin()->getServer()->broadcastMessage("->> §aWant an amazing tag do /tags to pick one!");
	    }
		 
	    $this->getPlugin()->time + 6000;
	    }
		    
    $this->getPlugin()->time - 1;
    }
}
  
