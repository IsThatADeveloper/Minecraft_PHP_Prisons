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
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;

use onebone\tokenapi\TokenAPI; //used in replacement of coins
use onebone\economyapi\EconomyAPI; //used in replacement of coins

use pocketmine\entity\Human;

//function 
use function time;
use function count;
use function floor;
use function microtime;
use function number_format;
use function round;

use pocketmine\utils\Config;

class PickaxeLevelUp implements Listener{
  
    private $plugin;
	
    public $permission;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
    public function getPlugin(){
	return $this->plugin;
    }
	
    public function getPickaxeLevel(Player $player) { 
	    $item = $player->getInventory()->getItemInHand();
	    return $item->getLore();
    }

    public function getPickaxeNextLevel(Player $player) { 
            $level1 = ["§5§olevel: 1"];
            $level2 = ["§5§olevel: 2"];
            $level3 = ["§5§olevel: 3"];
            $level4 = ["§5§olevel: 4"];
            $level5 = ["§5§olevel: 5"];
            $level6 = ["§5§olevel: 6"];
            $levelMax = ["§5§olevel: Max"];
	    if($this->getPickaxeLevel($player) == null) { 
	       return $level1;
	    }elseif($this->getPickaxeLevel($player) == $level1) { 
	       return $level2;
	    }elseif($this->getPickaxeLevel($player) == $level2) { 
	       return $level3;
	    }elseif($this->getPickaxeLevel($player) == $level3) { 
	       return $level4;
	    }elseif($this->getPickaxeLevel($player) == $level4) { 
	       return $level5;
	    }elseif($this->getPickaxeLevel($player) == $level5) { 
	       return $level6;
	    }elseif($this->getPickaxeLevel($player) == $level6) { 
	       return $levelMax;
	    }
    }       

    public function onBlockBreakLevelSytem(Player $player) {
	$number = (25);
	$amount200 = mt_rand(1, 200);
	$amount300 = mt_rand(1, 300);
	$amount400 = mt_rand(1, 400);
	$amount500 = mt_rand(1, 500);
	$amount1000 = mt_rand(1, 1000);
        if($amount1000 === $number) {
            $level = $player->getWorld();
            $inv = $player->getInventory();
            $itemInHand = $player->getInventory()->getItemInHand()->getId();
	    $wpickaxe = ItemFactory::getInstance()->get(270, 0);
	    $gpickaxe = ItemFactory::getInstance()->get(285, 0);
            $spickaxe = ItemFactory::getInstance()->get(274, 0);
            $ipickaxe = ItemFactory::getInstance()->get(257, 0);
	    $dpickaxe = ItemFactory::getInstance()->get(278, 0);
            $level1 = ["§5§olevel: 1"];
            $level2 = ["§5§olevel: 2"];
            $level3 = ["§5§olevel: 3"];
            $level4 = ["§5§olevel: 4"];
            $level5 = ["§5§olevel: 5"];
            $level6 = ["§5§olevel: 6"];
            $levelMax = ["§5§olevel: Max"];
            $name = $player->getInventory()->getItemInHand();
            $lore = $player->getInventory()->getItemInHand()->getLore();
            if ($itemInHand == $wpickaxe->getId()){
            $player->sendMessage("§7(§a!§7) §bYour pickaxe has leveled up");
		     if($lore !== null) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 1"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
		     }
		     if($lore == $level1) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 2"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level2) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 3"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level3) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 4"]);
		     $item->setDamage(0);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level4) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: Max"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $levelMax) {
			$player->sendMessage("§7(§a!§7) §aYour pickaxe prestiged");
		     }
            }elseif ($itemInHand == $gpickaxe->getId()){
            $player->sendMessage("§7(§a!§7) §bYour pickaxe has leveled up");
		     if($lore !== null) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 1"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
		     }
		     if($lore == $level1) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 2"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level2) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 3"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level3) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 4"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level4) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 5"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level5) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: Max"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $levelMax) {
			$player->sendMessage("§7(§a!§7) §aYour pickaxe prestiged");
		     }
            }elseif ($itemInHand == $spickaxe->getId()){
            $player->sendMessage("§7(§a!§7) §bYour pickaxe has leveled up");
		     if($lore !== null) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 1"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
		     }
		     if($lore == $level1) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 2"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level2) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 3"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level3) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 4"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level4) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 5"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level5) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: Max"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $levelMax) {
			$player->sendMessage("§7(§a!§7) §aYour pickaxe prestiged");
		     }
            }elseif ($itemInHand == $ipickaxe->getId()){
            $player->sendMessage("§7(§a!§7) §bYour pickaxe has leveled up");
		     if($lore !== null) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 1"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
		     }
		     if($lore == $level1) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 2"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level2) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 3"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level3) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 4"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level4) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 5"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level5) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 6"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level6) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: Max"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $levelMax) {
			$player->sendMessage("§7(§a!§7) §aYour pickaxe prestiged");
		     }
            }elseif ($itemInHand == $dpickaxe->getId()){
            $player->sendMessage("§7(§a!§7) §bYour pickaxe has leveled up");
		     if($lore !== null) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 1"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
		     }
		     if($lore == $level1) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 2"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level2) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 3"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level3) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 4"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level4) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 5"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level5) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: 6"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $level6) {
                     $item = $player->getInventory()->getItemInHand();
		     $item->setLore(["§5§olevel: Max"]);
		     $item->setDamage(0);
                     $player->getInventory()->setItemInHand($item);
	 	     $player->getWorld()->addParticle(new EnchantmentTableParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
	 	     $player->getWorld()->addParticle(new FlameParticle(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ())));
                     }
		     if($lore == $levelMax) {
			$player->sendMessage("§7(§a!§7) §aYour pickaxe prestiged");
		     }
            }elseif ($itemInHand !== null){
	    }
    }
    $wpickaxe = ItemFactory::getInstance()->get(270, 0);
    $gpickaxe = ItemFactory::getInstance()->get(285, 0);
    $spickaxe = ItemFactory::getInstance()->get(274, 0);
    $ipickaxe = ItemFactory::getInstance()->get(257, 0);
    $dpickaxe = ItemFactory::getInstance()->get(278, 0);
    $level1 = ["§5§olevel: 1"];
    $level2 = ["§5§olevel: 2"];
    $level3 = ["§5§olevel: 3"];
    $level4 = ["§5§olevel: 4"];
    $level5 = ["§5§olevel: 5"];
    $level6 = ["§5§olevel: 6"];
    $levelmax = ["§5§oMax"];
    $item = $player->getInventory()->getItemInHand();
    $lore = $item->getLore();
    if($item->getCustomName() === $wpickaxe->getName()) {
       if($lore == $level1);
          $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 5;
            $amp = 0;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
       }elseif($lore == $level2){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
       }elseif($lore == $level3){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
       }elseif($lore == $level4){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 20;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $levelmax){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 20;
            $amp = 2;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
    }
    if($item->getCustomName() === $spickaxe->getName()) {
       if($lore == $level1);
          $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 5;
            $amp = 0;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
       }elseif($lore == $level2){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
       }elseif($lore == $level3){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level4){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 20;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level5){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 30;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $levelmax){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 30;
            $amp = 2;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
    }
    if($item->getCustomName() === $gpickaxe->getName()) {
       if($lore == $level1);
          $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 5;
            $amp = 0;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
       }elseif($lore == $level2){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
       }elseif($lore == $level3){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level4){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 20;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level5){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 30;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $levelmax){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 30;
            $amp = 2;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
    }
    if($item->getCustomName() === $ipickaxe->getName()) {
       if($lore == $level1);
          $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 10;
            $amp = 0;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level2){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level3){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 20;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level4){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 25;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level5){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 35;
            $amp = 2;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level6){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 38;
            $amp = 2;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $levelmax){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 40;
            $amp = 3;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
    }
    if($item->getCustomName() === $dpickaxe->getName()) {
       if($lore == $level1);
          $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 0;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level2){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 15;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level3){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 25;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level4){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 35;
            $amp = 1;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level5){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 35;
            $amp = 2;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $level6){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 45;
            $amp = 2;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
       }elseif($lore == $levelmax){
            $haste = Effect::getEffect(Effect::HASTE);
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 60;
            $amp = 3;
            $player->addEffect(new EffectInstance($haste,$time,$amp,true));
       }
    }
}
