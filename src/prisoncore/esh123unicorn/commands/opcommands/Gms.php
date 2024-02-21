<?php

namespace prisoncore\esh123unicorn\commands\opcommands;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\world\sound\PopSound;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Gms extends CommandBase{
    
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("gms", "Change your gamemode to survival", "§4Use: §r/gms", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("gms.use") and $sender instanceof Player) {
                    $sender->getWorld()->addSound(new PopSound($sender));
                    $sender->setGamemode(0);
                    $sender->sendTitle("§agamemode set to survival!");
                } else {
                    $sender->sendMessage("§cCommand is unknown");
        }
    }
}
