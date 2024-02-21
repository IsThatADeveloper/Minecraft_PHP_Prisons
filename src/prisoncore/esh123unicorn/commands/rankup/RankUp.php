<?php

namespace prisoncore\esh123unicorn\commands\rankup;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\item\Armor;
use pocketmine\item\Tool;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\world\sound\PopSound;
use onebone\tokenapi\TokenAPI;
use onebone\economyapi\EconomyAPI;
use pocketmine\world\sound\AnvilUseSound;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\event\player\PlayerJoinEvent;
use prisoncore\esh123unicorn\commands\rankup\RankUpStore;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class RankUp extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("rankup", "rankup", "§4Use: §r/rankup", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
  
    public function getStore() { 
	    return new RankUpStore($this->getPlugin());
    }
	
    //mainui part
    public function execute(CommandSender $sender, string $commandLabel, array $args): void{
      	  $this->getStore()->RankUp($sender);
    }
}
