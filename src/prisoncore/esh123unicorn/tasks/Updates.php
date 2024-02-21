<?php

namespace prisoncore\esh123unicorn\tasks;

//math and world
use pocketmine\lang\Language;
use pocketmine\lang\Translatable;

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
use pocketmine\console\ConsoleCommandSender;
use function time;

use prisoncore\esh123unicorn\Main;

class Updates extends PluginTask {

    private $plugin;
	
    public function __construct(Plugin $plugin){
	      $this->plugin = $plugin;
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function onRun(): void {
	    if($this->getPlugin()->time == 12000) {
	       foreach($this->getPlugin()->getServer()->getOnlinePlayers() as $player) {
	       $server = $this->getPlugin()->getServer();
	       $language = $this->getPlugin()->getServer()->getLanguage();
	       $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "tebex secret 207ddddd9496317d0f042513e579faee510897df");
	       $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "tebex forcecheck");
	       $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "save-all");
	       $player->sendPopup("§7(§a!§7) §aYour data has been saved");
	       }
	    }
	    
	    if($this->getPlugin()->time == 0) {	 
   	       $this->getPlugin()->time + 24000;
	       $server = $this->getPlugin()->getServer();
	       $language = $this->getPlugin()->getServer()->getLanguage();
	       $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "mine reset-all");
	       $this->getPlugin()->getServer()->broadcastMessage("§b➜ §l§eAll §achest §o§l§brefilled§6!");
	       $this->getPlugin()->getServer()->broadcastMessage("§b➜ §l§bMine §o§dreseting§6!");
	    }
		    
    $this->getPlugin()->time - 1;
    }
}
         
