<?php

namespace prisoncore\esh123unicorn\commands\normal;

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

class Hub extends CommandBase{

    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("hub", "Teleports to hub", "§4Use: §r/hub", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("hub.use") and $sender instanceof Player) {
                    $sender->getWorld()->addSound(new PopSound($sender));
                    $sender->sendTitle("§aWarping...");
                    $this->getPlugin()->getServer()->dispatchCommand($sender, "transferserver");
                } else {
                    $sender->sendMessage("§cYou do not have permission to use this command\n§bYou can buy this command here §a:: §6 https://mcpeprisonblock.buycraft.net/");
                }
            }
        }
