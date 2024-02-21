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
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

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

class MiningExtras implements Listener{
  
    private $plugin;
	
    public $permission;
	
    public $defense;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
    public function getPlugin(){
	return $this->plugin;
    }
	
    public function repairPickaxe(Player $player, $pickaxe) {
	   $inv = $player->getInventory();
	   $item = ItemFactory::getInstance()->get(409, 0, 1)->setCustomName("§bPickaxe Shard")->setLore(["§8Found from mining\n\n§aWill activate when your pickaxe is low on durablity\n\n§8Keep in inventory to use"]);
	   $damage = $inv->getItemInHand()->getDamage();
	   if($inv->getItemInHand()->getId() == $pickaxe->getId()) {//wooden
	      if($inv->contains($item)) {
		 if($inv->getItemInHand()->getDamage() >= 50) {
		    $inv->getItemInHand()->setDamage($damage - mt_rand(1, 50));
		    $player->sendMessage("§7(§a!§7) §aYour pickaxe was repaired by $damage damage");
	  	    $inv->removeItem($item);
		 }
	      }
	   }
    }
	
    public function breakBlockReward(Player $player, $blocks, $nextGoal, $money) { 
		$lowercasename = strtolower($player->getName());
	        $config = new Config($this->getPlugin()->playerFolder . $lowercasename . ".yml", Config::YAML);
	        $broken = $this->getPlugin()->getMined($player, (int) $config->get("mined"));
	        if($broken === $blocks) { 
		   $player->sendMessage("§7(§a!§7) §aYou destroyed " . $broken . " blocks"); 
		   $player->sendMessage("§7(§c!§7) §cNext goal " . $nextGoal . " blocks"); 
                   EconomyAPI::getInstance()->addMoney($player, ($money));
		   $player->sendTip("§7(§a!§7) §aYou recieved " . '$' . $money); 
		}
    }
    
    public function breakLastBlockEvent(Player $player, $blocks, $money) {
	        $lowercasename = strtolower($player->getName());
	        $config = new Config($this->getPlugin()->playerFolder . $lowercasename . ".yml", Config::YAML);
	        $broken = $this->getPlugin()->getMined($player, (int) $config->get("mined"));
	        if($broken === $blocks) { 
		   $player->sendMessage("§5You destroyed " . $blocks . " blocks"); 
		   $player->sendTip("§7(§c!§7) §cYou have reached the last mining task. You recieved " . $money . " mana");
                   EconomyAPI::getInstance()->addMoney($player, ($money));
		}
    }
	
    public function onPickaxeShardActivation(Player $player) {
	   $wpickaxe = ItemFactory::getInstance()->get(270, 0, 1);
	   $spickaxe = ItemFactory::getInstance()->get(274, 0, 1);
	   $ipickaxe = ItemFactory::getInstance()->get(257, 0, 1);
	   $dpickaxe = ItemFactory::getInstance()->get(278, 0, 1);
	   $gpickaxe = ItemFactory::getInstance()->get(285, 0, 1);
	   $this->repairPickaxe($player, $wpickaxe);
	   $this->repairPickaxe($player, $spickaxe);
	   $this->repairPickaxe($player, $ipickaxe);
	   $this->repairPickaxe($player, $dpickaxe);
	   $this->repairPickaxe($player, $gpickaxe);
    }
	
    public function onLevelBlockBreak(Player $player) {
		$this->breakBlockReward($player, 10, 50, 100);
		$this->breakBlockReward($player, 50, 100, 1000);
		$this->breakBlockReward($player, 100, 200, 2000);
		$this->breakBlockReward($player, 200, 300, 2500);
		$this->breakBlockReward($player, 300, 1000, 2750);
		$this->breakBlockReward($player, 1000, 10000, 5000);
		$this->breakBlockReward($player, 10000, 100000, 10000);
		$this->breakBlockReward($player, 100000, 1000000, 50000);
		$this->breakBlockReward($player, 1000000, 50000000, 1000000);
		$this->breakLastBlockEvent($player, 10000000, 5000000);
    }
	
    public function onBreak(BlockBreakEvent $event) {
		if ($event->isCancelled()) {
			return;
		}
		$event->getPlayer()->addXp($event->getXpDropAmount());
		$event->setXpDropAmount(0);
    }
}
