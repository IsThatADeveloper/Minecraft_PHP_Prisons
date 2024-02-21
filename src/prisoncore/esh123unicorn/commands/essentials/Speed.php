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

class Speed extends CommandBase {
    
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("speed", "Activates speed boost", "§4Use: §r/speed", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("speed.use") and $sender instanceof Player) {
                 if($sender->hasEffect(Effect::SPEED)) {
                    $sender->removeEffect(Effect::SPEED);
                    $sender->sendTitle("§fSpeed Boost deactivated");
                  }else{
                    $sender->getWorld()->addSound(new PopSound($sender));
                    $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::SPEED), (99999999 * 20), (1), (true)));
                    $sender->sendTitle("§fSpeed Boost activated");
                    }
                  }else{
                    $sender->sendMessage("§cYou do not have permission to use this command \n§bYou can buy this command here §a:: §6 https://mcpeprisonblock.buycraft.net");
        }
    }
}
