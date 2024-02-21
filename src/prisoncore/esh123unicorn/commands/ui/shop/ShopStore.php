<?php

namespace prisoncore\esh123unicorn\commands\ui\shop;

use prisoncore\esh123unicorn\Main;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use onebone\economyapi\EconomyAPI;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

use pocketmine\level\particle\EnchantmentTableParticle;
use pocketmine\level\particle\ExplodeParticle;

use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI;

use pocketmine\command\ConsoleCommandSender;

use pocketmine\utils\config;

use function trim;

class ShopStore {
	
    	private $plugin;
	
	private $price;
	private $id;
	private $meta;
	private $name;
	private $command;

    	public function __construct(Main $plugin) {
    	    $this->plugin = $plugin;
    	}
	
    	public function getPlugin() {
	    return $this->plugin;
    	}
	
	public function getShop(Player $player, int $id, int $meta, int $price, $name = null) {
		$this->price = $price;
		$this->id = $id;
		$this->meta = $meta;
		$this->name = $name;
    		$f = new CustomForm(function(Player $player, ?array $data){
    		if(!isset($data)) return;
	  	   if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player) >= ($this->price * $data[1])){
	  	       $player->sendMessage("§7(§a!§7) §aYou purchased " . $data[1] . " " . $this->name);
		       $item = ItemFactory::getInstance()->get($this->id, $this->meta, $data[1]);
		       $player->getInventory()->addItem($item);
    		       EconomyAPI::getInstance()->reduceMoney($player, ($this->price * $data[1]));
		   }else{
	  	       $player->sendMessage("§7(§c!§7) §cYou do not have enough mana to buy " . $data[1] . " " . $this->name);
		   }
	  });
	  $fixedName = trim($this->name);
	  $f->setTitle("§l§a-=" . $fixedName . "=-");
	  $f->addLabel("§bCurrent Mana§8:§a ". EconomyAPI::getInstance()->myMoney($player) . "\n\n§aPrice§7: §a" . $this->price . " Mana");
   	  $f->addInput("Amount: ");
	  $f->sendToPlayer($player);
	}
	
	public function getCommandShop(Player $player, string $command, int $price, $name = null) {
		$this->price = $price;
		$this->name = $name;
		$this->command = $command;
    		$f = new CustomForm(function(Player $player, ?array $data){
    		if(!isset($data)) return;
	  	   if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player) >= ($this->price * $data[1])){
	  	       $player->sendMessage("§7(§a!§7) §aYou purchased " . $data[1] . " " . $this->name);
	   	       $server = $this->getPlugin()->getServer();
		       $language = $this->getPlugin()->getServer()->getLanguage();
	  	       $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), $this->command . $data[1]);
    		       EconomyAPI::getInstance()->reduceMoney($player, ($this->price * $data[1]));
		   }else{
	  	       $player->sendMessage("§7(§c!§7) §cYou do not have enough mana to buy " . $data[1] . " " . $this->name);
		   }
	  });
	  $fixedName = trim($this->name);
	  $f->setTitle("§l§a-=" . $fixedName . "=-");
	  $f->addLabel("§bCurrent Mana§8:§a ". EconomyAPI::getInstance()->myMoney($player) . "\n\n§aPrice§7: §a" . $this->price . " Mana");
   	  $f->addInput("Amount: ");
	  $f->sendToPlayer($player);
	  }
}
