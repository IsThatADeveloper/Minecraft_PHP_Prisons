<?php

namespace prisoncore\esh123unicorn\commands\ui\tags;

use prisoncore\esh123unicorn\Main;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use onebone\economyapi\EconomyAPI;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\item\Item;

use pocketmine\level\particle\EnchantmentTableParticle;
use pocketmine\level\particle\ExplodeParticle;

use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI;

use pocketmine\utils\config;

use function trim;

class TagShop {
	
    	private $plugin;
	
	private $permission;

    	public function __construct(Main $plugin) {
    	    $this->plugin = $plugin;
    	}
	
    	public function getPlugin() {
	    return $this->plugin;
    	}
	
  	public function setTag(Player $player, $permission, $tag) { 
      	     if($player->hasPermission($permission)){
           	$this->plugin->setPlayerPrefix($player, $tag);
	   	$player->sendMessage("Your tag has been changed to " . $tag);
             }else{ 
	   	$player->sendMessage("This tag is locked\n §bYou can buy this command here §a:: §6 https://mcpeprisonblock.buycraft.net/");
	     }
	}
}
