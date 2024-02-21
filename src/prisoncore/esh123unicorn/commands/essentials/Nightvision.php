<?php

namespace prisoncore\esh123unicorn\commands\essentials;

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

class Nightvision extends CommandBase{
   
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("nv", "Activates nightvision boost", "§4Use: §r/nv", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("nv.use") and $sender instanceof Player) {
                 if($sender->hasEffect(Effect::NIGHT_VISION)) {
                    $sender->removeEffect(Effect::NIGHT_VISION);
                    $sender->sendTitle("§1Night Vision deactivated");
                  }else{
                    $sender->getWorld()->addSound(new PopSound($sender));
                    $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::NIGHT_VISION), (99999999 * 20), (1), (true)));
                    $sender->sendTitle("§1Night Vision activated");
                    }
                  }else{
                    $sender->sendMessage("§cYou do not have permission to use this command \n§bYou can buy this command here §a:: §6 https://mcpeprisonblock.buycraft.net");
        }
    }
}
