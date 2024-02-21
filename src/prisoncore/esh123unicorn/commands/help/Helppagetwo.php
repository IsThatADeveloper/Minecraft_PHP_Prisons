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

class Helppagetwo extends CommandBase{
    
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("help-2", "Essentials help page 2", "§4Use: §r/help-2", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
       if($player->hasPermission("helppagetwo.use") and $sender instanceof Player) {
                    //normal
                    $sender->sendMessage("§b=============Help==============");
                    $sender->sendMessage("§a/spawn -Tps to spawn");
                    $sender->sendMessage("§a/hub -Tps to hub");
                    //UIs
                    $sender->sendMessage("§a/mines");
                    $sender->sendMessage("§a/tutorial");
                    $sender->sendMessage("§a/bm");
                    $sender->sendMessage("§a/vote");
                    $sender->sendMessage("§a/rename");
                    $sender->sendMessage("§a/tags");
                    $sender->sendMessage("§a/kick");
                    $sender->sendMessage("§a/ban");
                    $sender->sendMessage("§a/whitelistremove");
                    $sender->sendMessage("§a/prestige");
                    $sender->sendMessage("§a/mute");
                    //gui
                    $sender->sendMessage("§a/ceinfo -Ceinfo");
                    $sender->sendMessage("§b=============Help==============");
                } else {
                    $sender->sendMessage("§cYou do not have permission to use this command");
                }
            }
        }
