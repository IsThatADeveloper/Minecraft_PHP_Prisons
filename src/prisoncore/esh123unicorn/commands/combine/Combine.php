<?php

namespace prisoncore\esh123unicorn\commands\combine;

use DaPigGuy\PiggyCustomEnchants\enchants\CustomEnchant;
use DaPigGuy\PiggyCustomEnchants\PiggyCustomEnchants;
use DaPigGuy\PiggyCustomEnchants\CustomEnchantManager;
use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;

use pocketmine\utils\config;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Combine extends CommandBase{

    private $xp;
    private $item;
    public $enchantment = [];
    public $status = [];
    private $notEnoughXp = "§7(§c!§7) §cYou do not have 20 xp levels";
    private $notHoldingEnchantedBook = "§7(§c!§7) §cYou are not holding an enchanted CE book";
    private $stepEnchantItem = "§7(§a!§7) §aSuccessfully started enchanting proccess. Now use the command §l§7/combine§r§a on the item you want to enchant";
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("combine", "Combine a ce book with an item", "§4Use: §r/combine", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($sender instanceof Player){
           $this->onCombineEvent($sender);
        }
    }
	    
    public function setEnchantedBook(Player $player) { 
	$lowercasename = strtolower($player->getName());
	$config = new Config($this->getPlugin()->playerFolder . $lowercasename . ".yml", Config::YAML);
	$item = $player->getInventory()->getItemInHand();
	foreach($item->getEnchantments() as $ench) {
		$config->set("enchant", $ench);
        	$config->save();
	}
    }
	
    public function setEnchantedBookLevel(Player $player) { 
	$lowercasename = strtolower($player->getName());
	$config = new Config($this->getPlugin()->playerFolder . $lowercasename . ".yml", Config::YAML);
	$item = $player->getInventory()->getItemInHand();
	foreach($item->getEnchantments() as $ench) {
		$level = $item->getEnchantment($ench->getId())->getWorld();
		$config->set("e-level", $level);
        	$config->save();
	}
    }
  
    public function getItemToEnchant(Player $player) { 
        return $player->getInventory()->getItemInHand()->getId();
    }
	
    public function setEnchantedBookNull(Player $player) {
	$lowercasename = strtolower($player->getName());
	$config = new Config($this->getPlugin()->playerFolder . $lowercasename . ".yml", Config::YAML);
	$config->set("enchant", null);
        $config->set("e-level", 0);
    }
    
    public function enchantmentCompleted() { 
        return "§7(§a!§7) §aYou have successfully enchanted the item in your hand";
    }
    
    public function onCombineEvent(Player $player) { 
        $this->xp = $player->getXpLevel();
	$air = Item::get(Item::AIR);
	$enchanted_book = Item::get(403, 0, 1);
	$lowercasename = strtolower($player->getName());
	$config = new Config($this->getPlugin()->playerFolder . $lowercasename . ".yml", Config::YAML); 
        if(!$this->xp >= 20) {
	   $player->sendMessage($this->notEnoughXp);
		
	}else{
		
	   if($player->getInventory()->getItemInHand()->getId() == $enchanted_book->getId()) {
              $player->getInventory()->setItemInHand($air);
	      $this->setEnchantedBook($player);
	      $this->setEnchantedBookLevel($player);
	      $player->sendMessage($this->stepEnchantItem);
		   
           }elseif($config->get("enchant") !== null and $player->getInventory()->getItemInHand()->getId() !== $enchanted_book->getId()) {
		   
                   $item = $player->getInventory()->getItemInHand();
                   $player->getInventory()->setItemInHand($air);
                   $id = $item->getId();
                   $newItem = Item::get($id, 0, 1);
		   $enchant = CustomEnchantManager::getEnchantmentByName($config->get("enchant"));
                   $newItem->addEnchantment(new EnchantmentInstance(new CustomEnchant($enchant, $config->get("e-level"))));
		   
                   $player->getInventory()->setItemInHand($newItem);
                   $player->setXpLevel($player->getXpLevel() - 20);
                   $player->sendMessage($this->enchantmentCompleted());
		   $this->setEnchantedBookNull($player);

	   }elseif(!$player->getInventory()->getItemInHand()->getId() == $enchanted_book->getId()) {
	      $player->sendMessage($this->notHoldingEnchantedBook);
	   }
	}
    }
}
