<?php

namespace prisoncore\esh123unicorn\commands\help;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\level\sound\PopSound;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Helppageone extends CommandBase{
    
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("help-1", "Essentials help page 1", "§4Use: §r/help-1", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
       if($player->hasPermission("helppageone.use") and $sender instanceof Player) {
                    //essentials
                    $sender->sendMessage("§b=============Help pg1==============");
                    $sender->sendMessage("§a/speed -Gives you speed boost");
                    $sender->sendMessage("§a/jump -Gives you jump boost");
                    $sender->sendMessage("§a/feed -Feeds you");
                    $sender->sendMessage("§a/heal -Heals you");
                    $sender->sendMessage("§a/nv -Gives you nightvision boost");
                    $sender->sendMessage("§a/strength -Gives you strenght boost");
                    //opcommands
                    $sender->sendMessage("§a/gmc -Changes your gamemode");
                    $sender->sendMessage("§a/gma -Changes your gamemode");
                    $sender->sendMessage("§a/gms -Changes your gamemode");
                    $sender->sendMessage("§a/gmspc -Changes your gamemode");
                    //normal
                    $sender->sendMessage("§a/day -Changes the time to day");
                    $sender->sendMessage("§a/night -Changes the time to night");
                    $sender->sendMessage("§b=============Help pg1==============");
                } else {
                    $sender->sendMessage("§cYou do not have permission to use this command");
       }
    }
}
