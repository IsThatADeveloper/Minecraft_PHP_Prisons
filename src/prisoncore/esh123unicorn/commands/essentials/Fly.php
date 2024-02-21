<?php

namespace prisoncore\esh123unicorn\commands\essentials;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\world\sound\PopSound;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Fly extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("fly", "Activates fly boost", "§4Use: §r/fly", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
	$this->fly($sender);
    }
	
    public function fly(Player $sender) {
        if($sender->hasPermission("fly.use") and $sender instanceof Player) {
            if (!isset($args[0])) {
                $sender->sendMessage("§7(§c!§7) §cUsage /§cfly {on/off} {playername}");
                return false;
            }
            if (!isset($args[1])) {
                $sender->sendMessage("§7(§c!§7) §cUsage /§cfly {on/off} {playername}");
                return false;
            }
            if ($args[0]) {
                switch (strtolower($args[0])) {
                    case 'on':
                      $target = $this->getPlugin()->getServer()->getPlayer($args[1]);
                      if ($target->isOnline()) {
			  $p = $sender->getName();
			  $tname = $target->getName();
			  $target->setAllowFlight(true);
                          $sender->sendPopup("§7(§a!§7) §aFly has been enabled");
                          $target->sendMessage("§7(§a!§7) §aFly has been enabled for $p");
                        } else {
                          $sender->sendMessage("§7(§c!§7) §c$args[1] is not online");
                        }
                        break;
                    case 'off':
                        $target = $this->getPlugin()->getServer()->getPlayer($args[1]);
                        if ($target->isOnline()) {
			    $p = $sender->getName();
			    $tname = $target->getName();
		            $target->setAllowFlight(false);
                            $sender->sendPopup("§7(§c!§7) §cFly has been disabled");
                            $target->sendMessage("§7(§c!§7) §cFly has been disabled for $p");
                        } else {
                            $sender->sendMessage("§7(§c!§7) §c$args[1] is not online");
                        }
                        break;
                }
            }
        } else {
            $sender->sendMessage("§7(§c!§7) §cYou do not have permission to use this command");
            return false;
            }
     return false;
    }
}

