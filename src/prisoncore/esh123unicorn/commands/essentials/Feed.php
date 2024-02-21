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

class Feed extends CommandBase{

    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("feed", "Fills hunger to max", "§4Use: §r/feed", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("feed.use") and $sender instanceof Player) {
                    $sender->getWorld()->addSound(new PopSound($sender));
                    $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::SATURATION), (60 * 1), (1), (false)));
                    $sender->setFood(20);
                    $sender->sendTitle("§aYour hunger is full!");
                } else {
                    $sender->sendMessage("§cYou do not have permission to use this command \n§bYou can buy this command here §a:: §6 https://mcpeprisonblock.buycraft.net/");
                }
            }
        }
