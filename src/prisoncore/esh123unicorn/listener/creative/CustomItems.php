<?php

namespace prisoncore\esh123unicorn\listener\creative;

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

class CustomItems implements Listener{
  
    private $plugin;
	
    public $position;
	

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
    public function getPlugin(){
	return $this->plugin;
    }
	
    public function Parkour() {
	  $protection = Enchantment::getEnchantment(0);
	  $sharpness = Enchantment::getEnchantment(9);
	  $efficiency = Enchantment::getEnchantment(15);
	  $silktouch = Enchantment::getEnchantment(16);
	  $unbreaking = Enchantment::getEnchantment(17);
	    
	  $helmet = Item::get(298, 0, 1);
	  $helmet->setCustomName("Parkour Hat");
	  $helmet->addEnchantment(new EnchantmentInstance($protection, 1));
	  $this->addCreativeItem($helmet);
	    
	  $chestplate = Item::get(299, 0, 1);
	  $chestplate->setCustomName("Parkour Chest");
	  $chestplate->addEnchantment(new EnchantmentInstance($protection, 1));
	  $this->addCreativeItem($chestplate);
	    
	  $leggings = Item::get(300, 0, 1);
	  $leggings->setCustomName("Parkour Pants");
	  $leggings->addEnchantment(new EnchantmentInstance($protection, 1));
	  $this->addCreativeItem($leggings);
	    
	  $boots = Item::get(301, 0, 1);
	  $boots->setCustomName("Parkour boots");
	  $boots->addEnchantment(new EnchantmentInstance($protection, 1));
	  $this->addCreativeItem($boots);
	    
	  $sword = Item::get(268, 0, 1);
	  $sword->setCustomName("Parkour_Kit");
	  $sword->addEnchantment(new EnchantmentInstance($sharpness, 1));
	  $this->addCreativeItem($sword);
	    
	  $pickaxe = Item::get(269, 0, 1);
	  $pickaxe->setCustomName("Parkour_Kit");
	  $pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 1));
	  $pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 1));	  
	  $this->addCreativeItem($pickaxe);
	    
	  $axe = Item::get(270, 0, 1);
	  $axe->setCustomName("Parkour_Kit");
	  $axe->addEnchantment(new EnchantmentInstance($efficiency, 1));
	  $axe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($axe);
	    
	  $shovel = Item::get(271, 0, 1);
	  $shovel->setCustomName("Parkour_Kit");
	  $shovel->addEnchantment(new EnchantmentInstance($efficiency, 1));
	  $shovel->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($axe);
    }
	
    public function Vote() {
	  $protection = Enchantment::getEnchantment(0);
	  $sharpness = Enchantment::getEnchantment(9);
	  $efficiency = Enchantment::getEnchantment(15);
	  $silktouch = Enchantment::getEnchantment(16);
	  $unbreaking = Enchantment::getEnchantment(17);
	    
	  $helmet = Item::get(298, 0, 1);
	  $helmet->setCustomName("Vote Hat");
	  $helmet->addEnchantment(new EnchantmentInstance($protection, 1));
	  $this->addCreativeItem($helmet);
	    
	  $chestplate = Item::get(299, 0, 1);
	  $chestplate->setCustomName("Vote Chest");
	  $chestplate->addEnchantment(new EnchantmentInstance($protection, 1));
	  $this->addCreativeItem($chestplate);
	    
	  $leggings = Item::get(300, 0, 1);
	  $leggings->setCustomName("Vote Pants");
	  $leggings->addEnchantment(new EnchantmentInstance($protection, 1));
	  $this->addCreativeItem($leggings);
	    
	  $boots = Item::get(301, 0, 1);
	  $boots->setCustomName("Vote boots");
	  $boots->addEnchantment(new EnchantmentInstance($protection, 1));
	  $this->addCreativeItem($boots);
	    
	  $sword = Item::get(268, 0, 1);
	  $sword->setCustomName("Vote_Kit");
	  $sword->addEnchantment(new EnchantmentInstance($sharpness, 1));
	  $this->addCreativeItem($sword);
	    
	  $pickaxe = Item::get(269, 0, 1);
	  $pickaxe->setCustomName("Vote_Kit");
	  $pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 1));
	  $pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 1));	  
	  $this->addCreativeItem($pickaxe);
	    
	  $axe = Item::get(270, 0, 1);
	  $axe->setCustomName("Vote_Kit");
	  $axe->addEnchantment(new EnchantmentInstance($efficiency, 1));
	  $axe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($axe);
	    
	  $shovel = Item::get(271, 0, 1);
	  $shovel->setCustomName("Vote_Kit");
	  $shovel->addEnchantment(new EnchantmentInstance($efficiency, 1));
	  $shovel->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($axe);
    }
	
    public function Archer() {
	  $protection = Enchantment::getEnchantment(0);
	  $sharpness = Enchantment::getEnchantment(9);
	  $efficiency = Enchantment::getEnchantment(15);
	  $silktouch = Enchantment::getEnchantment(16);
	  $unbreaking = Enchantment::getEnchantment(17);
	    
	  $helmet = Item::get(314, 0, 1);
	  $helmet->setCustomName("Archer Hat");
	  $helmet->addEnchantment(new EnchantmentInstance($protection, 1));
	  $helmet->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($helmet);
	    
	  $chestplate = Item::get(303, 0, 1);
	  $chestplate->setCustomName("Archer Chest");
	  $chestplate->addEnchantment(new EnchantmentInstance($protection, 1));
	  $chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($chestplate);
	    
	  $leggings = Item::get(316, 0, 1);
	  $leggings->setCustomName("Archer Pants");
	  $leggings->addEnchantment(new EnchantmentInstance($protection, 1));
	  $leggings->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($leggings);
	    
	  $boots = Item::get(313, 0, 1);
	  $boots->setCustomName("Archer Shoes");
	  $boots->addEnchantment(new EnchantmentInstance($protection, 1));
	  $boots->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($boots);
	    
	  $sword = Item::get(268, 0, 1);
	  $sword->setCustomName("Vote_Kit");
	  $sword->addEnchantment(new EnchantmentInstance($sharpness, 1));
	  $this->addCreativeItem($sword);
	    
	  $pickaxe = Item::get(275, 0, 1);
	  $pickaxe->setCustomName("Archer_Kit");
	  $pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 2));
	  $pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($pickaxe);
	    
	  $axe = Item::get(273, 0, 1);
	  $axe->setCustomName("Archer_Kit");
	  $axe->addEnchantment(new EnchantmentInstance($efficiency, 2));
	  $axe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($axe);
	    
	  $shovel = Item::get(274, 0, 1);
	  $shovel->setCustomName("Archer_Kit");
	  $shovel->addEnchantment(new EnchantmentInstance($efficiency, 2));
	  $shovel->addEnchantment(new EnchantmentInstance($unbreaking, 1));
	  $this->addCreativeItem($shovel);
    }

  
    public function registerCreativeItems(): void { 
	    $this->Parkour();
	    $this->Vote();
	    $this->Archer();
    }
}
