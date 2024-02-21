<?php

namespace prisoncore\esh123unicorn\listener\breakEvent;

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

use pocketmine\entity\Human;

//function 
use function time;
use function count;
use function floor;
use function microtime;
use function number_format;
use function round;

use pocketmine\utils\Config;

use onebone\tokenapi\TokenAPI; //used in replacement of coins
use onebone\economyapi\EconomyAPI; //used in replacement of coins
use pocketmine\item\ItemFactory;

class GetKeysOnMine implements Listener{
  
    private $plugin;
	
    public $permission;
	
    public $defense;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
    public function getPlugin(){
	return $this->plugin;
    }
	
    public function keyDisplayName($key, $type) {
	if($type == "display") { 
	   if($key == "common") { 
	      return ("§bCommon §aKey");
	   }elseif($key == "vote") { 
	      return ("§a§lVote§r §aKey");
	   }elseif($key == "mythic") { 
	      return ("§5Mythic §aKey"); 
	   }elseif($key == "legendary") { 
	      return ("§6Legendary §aKey");
	   }
	}elseif($type == "command") {
   	        if($key == "common") { 
	           return $key;
	        }elseif($key == "vote") { 
	           return $key;
	        }elseif($key == "mythic") { 
	           return $key; 
	        }elseif($key == "legendary") { 
	           return $key;
	        }
	}
    }
		   
    public function keyPlayerEvent(Player $player, string $key, int $amount, $randomizer) {
	$name = $player->getName();
	$keytype = ("key " . $this->keyDisplayName($key, "command") . $name);
        if(mt_rand(1, $randomizer) === 25) {
	   $player->sendMessage("§7(§a!§7) §aYou found " . $amount . $this->keyDisplayName($key, "display"));
	   $server = $this->getPlugin()->getServer();
	   $language = $this->getPlugin()->getServer()->getLanguage();
           $this->plugin->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), $keytype . $amount);
	}
    }
	
    public function getMoney(Player $player, int $number, $type) {
	    $amount = mt_rand(1, $number);
	    if($type == "token") {
	       TokenAPI::getInstance()->addToken($player, ($amount));
	       if($amount > 2) {
	          $player->sendMessage("§7(§a!§7) §aYou found " . $amount . " Tokens");
	       }else{
	          $player->sendMessage("§7(§a!§7) §aYou found " . $amount . " Token");
	       }
	    }elseif($type == "money") {
           	    EconomyAPI::getInstance()->addMoney($player, ($amount));
	            $player->sendMessage("§7(§a!§7) §aYou found ". '$' . $amount);
	    }
    }
	
    public function reward(Player $player) { 
	//mana and tokens
        if(mt_rand(1, 1000000) === 25) {
	   $this->getMoney($player, 100000, "money");
	   $this->getMoney($player, 100000, "token");
	}
	    
        if(mt_rand(1, 1000000) === 25) {
	   $player->sendMessage("§7(§a!§7) §aYou found a §bPickaxe Shard");
	   $inv = $player->getInventory();
	   $item = ItemFactory::getInstance()->get(409, 0, 1)->setCustomName("§bPickaxe Shard")->setLore(["§8Found from mining\n\n§aWill activate when your pickaxe is low on durablity\n\n§8Keep in inventory to use"]);
	   $inv->addItem($item);
	}
	    
	//blocks
        if(mt_rand(1, 1000000) === 25) {
	   $inv = $player->getInventory();
	   $amount = mt_rand(1, 64);
	   $stone = ItemFactory::getInstance()->get(1, 0, $amount);
	   $player->getInventory()->addItem($stone);
	   $player->sendMessage("§7(§a!§7) §aYou found $amount stone");
	}
	    
        if(mt_rand(1, 1000000) === 25) {
	   $inv = $player->getInventory();
	   $amount = mt_rand(1, 64);
	   $gold = ItemFactory::getInstance()->get(14, 0, $amount);
	   $player->getInventory()->addItem($gold);
	   $player->sendMessage("§7(§a!§7) §aYou found $amount gold ore");
	}
	    
        if(mt_rand(1, 1000000) === 25) {
	   $inv = $player->getInventory();
	   $amount = mt_rand(1, 64);
	   $iron = ItemFactory::getInstance()->get(15, 0, $amount);
	   $player->getInventory()->addItem($iron);
	   $player->sendMessage("§7(§a!§7) §aYou found $amount iron ore");
	}
	    
        if(mt_rand(1, 1000000) === 25) {
	   $inv = $player->getInventory();
	   $amount = mt_rand(1, 64);
	   $coal = ItemFactory::getInstance()->get(16, 0, $amount);
	   $player->getInventory()->addItem($coal);
	   $player->sendMessage("§7(§a!§7) §aYou found $amount coal ore");
	}
	  
	//keys
	    
	//common
	$this->keyPlayerEvent($player, "common", 1, 750000);
	$this->keyPlayerEvent($player, "common", 2, 750000);
	$this->keyPlayerEvent($player, "common", 3, 750000);
	$this->keyPlayerEvent($player, "common", 4, 1000000);
	$this->keyPlayerEvent($player, "common", 5, 1500000);
	 
	//mythic
	$this->keyPlayerEvent($player, "mythic", 1, 1500000);
	$this->keyPlayerEvent($player, "mythic", 2, 1500000);
	$this->keyPlayerEvent($player, "mythic", 3, 1500000);
	$this->keyPlayerEvent($player, "mythic", 4, 1500000);
	$this->keyPlayerEvent($player, "mythic", 5, 2000000);
	
	//vote
	$this->keyPlayerEvent($player, "vote", 1, 100000);
	$this->keyPlayerEvent($player, "vote", 2, 1000000);
	$this->keyPlayerEvent($player, "vote", 3, 1000000);
	    
	//legendary
	$this->keyPlayerEvent($player, "legendary", 1, 5000000);
	$this->keyPlayerEvent($player, "legendary", 2, 5000000);
	$this->keyPlayerEvent($player, "legendary", 3, 5000000);
	$this->keyPlayerEvent($player, "legendary", 4, 5000000);
	$this->keyPlayerEvent($player, "legendary", 5, 10000000);
    }
}
