<?php

namespace prisoncore\esh123unicorn\commands\cmd;

use prisoncore\esh123unicorn\Main;
use DaPigGuy\PiggyCustomEnchants\enchants\CustomEnchant;
use DaPigGuy\PiggyCustomEnchants\PiggyCustomEnchants;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\world\sound\PopSound;
use onebone\tokenapi\TokenAPI;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Tinker extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("tinker", "Sells books for tokens", "§4Use: §r/tinker", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("tinker.use") and $sender instanceof Player) {
	       $item = $sender->getInventory()->getItemInHand();
		  	 if($item->getId() == 403) {
                            $book = Item::get(Item::ENCHANTED_BOOK);
                            $air = Item::get(Item::AIR);
                            $inv = $sender->getInventory();
			    $inv->setItemInHand($air);
                            $amount = mt_rand(2, 70);
                            TokenAPI::getInstance()->addToken($sender, $amount);
			$sender->sendMessage("§7(§a!§7)§r §aYou sold an enchanted book for $amount tokens");
                      }else{
                         $sender->sendMessage("§7(§c!§7)§r §cYou're not holding a book");
                         }
                      } else {
                         $sender->sendMessage("§cYou do not have permission to use this command");
	}
    }
}
