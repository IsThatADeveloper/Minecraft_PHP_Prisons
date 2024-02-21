<?php

namespace prisoncore\esh123unicorn\commands\normal;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\world\sound\PopSound;
use pocketmine\world\World;
use pocketmine\world\WorldExpection;
use pocketmine\world\WorldProvider;
use pocketmine\world\ProviderManager;
use pocketmine\world\Position;
use pocketmine\plugin\Plugin;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Spawn extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("spawn", "Teleports to prison spawn", "§4Use: §r/spawn", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        	 if(!$sender instanceof Player){
            	    $sender->sendMessage("§cUse command in-game");
		 }else{
		    $sender->teleport($this->getPlugin()->getServer()->getWorldManager()->getWorldByName("world")->getSafeSpawn());
                    $sender->sendTitle("§aWarping...");
		 }
    }
}
