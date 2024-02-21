<?php

namespace prisoncore\esh123unicorn\commands\ui;

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
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Tutorial extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("tutorial", "Opens tutorial", "§4Use: §r/tutorial", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
           $this->OpenUI($sender);
    }
	
    public function OpenUI(Player $player){
        $form = new SimpleForm(function (Player $player, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
            $player->sendMessage("§b_-_RankUp_-_\n§c-§3 Command: §a[/ru]§c, §a[/rankup]!\n§c-§3 Description: §aGives you access to more mines!\n§c-§3 Example: §aYoure §a[§eA§a] when you rankup you have access to §a[§eB§a]");
                break;
                case 1:
            $player->sendMessage("§b_-_Mines_-_\n§c-§3 Command: §a[/mines]\n§c-§3 Description: §aPaired with rankup allowing you to access the mines you have!\n§c-§3 Example: §aTps you to the mine you want using an UI");
                break;
                case 2:
            $player->sendMessage("§b_-_Economy_-_\n§c-§3 Mana Command: §a[/pay]§c, §a[/mymoney]§c, §a[/topmoney]\n§c-§3 Token Command: §a[/pay]§c, §a[/mytoken]§c, §a[/toptoken]!\n§c-§3 Description: §aEconomy plugins which you can use to purchase Ces or items on shop\n§c-§3 Example: §aWhen you mine you get rewards\n §awhich have a chance to give you mana and tokens");
                break;
                case 3:
            $player->sendMessage("§b_-_Shop_-_\n§c-§3 Commands: §a[/shop]§c, §a[/blackmarket]§c, §a[/bm]\n§c-§3 Shop Description: §aBuy items in-game\n§c-§3 BlackMarket Description: §aBuy Ces in-game\n§c-§3 Example: §aPurchasing items");
                break;
                case 4:
            $player->sendMessage("§b_-_Work_-_\n§c-§3 Commands: §a[/job]\n§c-§3 Description: §aGives you access to jobs!\n§c-§3 Example: §aGives you mana for working in jobs");
                break;
                case 5:
            $player->sendMessage("§b_-_Paid Rewards_-_\n§c-§3 Commands: §a[/fly]§c, §a[/jump]§c, §a[/feed]§c, §a[/speed]§c, §a[/heal]§c, §a[/strength]§c, §a[/nv]§c, §a[/strength]\n§c-§3 Description: §aGives you access to perks\n§c-§3 Purchasable on our buycraft !\n§c-§3 Example: §aUnlocks commands for you");
                break;
                case 6:
            $player->sendMessage("§b_-_Keys/Crates_-_\n§c-§3 Commands: §a[none]\n§c-§3 Description: §aKeys give you op items like paid kits inside of crates!\n§c-§3 Example: §aYou get them from mining");
                break;
                case 7:
            $player->sendMessage("§b_-_Auctions_-_\n§c-§3 Commands: §a[/ah] §a[/ah sell]\n§c-§3 Description: §aAuction items on a GUI and purchase items from other players!\n§c-§3 Example: §aUse mana to buy stuff and make mana from selling items");
                break;
                case 8:
            $player->sendMessage("§b_-_Warps_-_\n§c-§3 Commands: §a[/mines] §a[/warps]\n§c-§3 Description: §aTps you to where you want using customUI's!\n§c-§3 Example: §aOpen UIs to go places");
                break;
                case 9:
            $player->sendMessage("§b_-_Texting_-_\n§c-§3 Commands: §a[/msg]\n§c-§3 Description: §aMessage players!\n§c-§3 Example: §a/msg send a privite message to another player");
                break;
                case 10:
            $player->sendMessage("§b_-_PvP Rewards_-_\n§c-§3 Commands: §a[none]\n§c-§3 Description: §aGet heads by getting kill streaks!\n§c-§3 Example: §aKill 250 players in a row and get a dragons mask");
                break;
                case 11:
            $player->sendMessage("§b_-_CE's_-_\n§c-§3 Commands: §a[/ce] §a[/celist]\n§c-§3 Description: §aCustom enchants which are applied you tools to make you more powerful!\n§c-§3 Example: §aDrop the ce book ontop of your tool\n§c-§3 Obtain: §aFrom crates using keys found under the ground. §bTIP: §aMining");
                break;
                case 12:
            $player->sendMessage("§b_-_Tags and Kits_-_\n§c-§3 Commands: §a[/tag] §a[/kits]\n§c-§3 Description Tags: §aTags open an ui which gives you an option of Tags to pick from\n§c-§3 Description Kits: §aKits open an ui which gives you an option of Kits to pick from\n§c-§3 Example: §aTags: Bear. Kits: Starter kit\n§c-§3 Obtain:Vouchers for Tags and for Kits use buycraft: https://mcpeprisonblock.buycraft.net/. §bTIP for Tags: §aMining");
                break;
                case 13:
            $player->sendMessage("§b_-_BlackMarket and Shop_-_\n§c-§3 Commands: §a[/shop] §a[/blackMarket] §a[/bm]\n§c-§3 Description Shop: §aItems which can be bought using Mana\n§c-§3 Description BlackMarket: §aCes which can be bought using Tokens");
                break;
                case 14:
            $player->sendMessage("§b_-_Xp Usage_-_\n§c-§3 Commands: §a[/xpfix] §a[/xp] §a[/rename]\n§c-§3 Description xpfix: Fixes the item you are holding using xp through an ui\n§c-§3 Description xp: §aCheck your xp level using xp.");
                break;
                case 15:
            $player->sendMessage("§b_-_Gangs_-_\n§c-§3 Commands: §a[/g help]\n§c-§3 Description: Allows you to make a team called a GANG\n§c-§3Example /g create <gang>");
                break;
                case 16:
            $player->sendTitle("§cTutorial is Closed");
                break;
            }
		});
        $form->setTitle("§l-=§aPrison Tutorial§r§l=-");
 	$form->setContent("§7Use this as a guide to play this server. The commands for this ui is §a/tutorial§7\n\n§d-> §7Click on any box it will send you a private message on how to use the item or command\n\n §aGood luck §3Prisoner");
	$form->addButton("§e§7[§3RankUp§7]");
  	$form->addButton("§7[§3Mines§7]");
  	$form->addButton("§7[§3Economy§7]");
  	$form->addButton("§7[§3Shop§r§7]");
        $form->addButton("§7[§3Work§7]");
  	$form->addButton("§7[§3Paid Rewards§7]");
  	$form->addButton("§7[§3Keys/Crates§7]");
	$form->addButton("§e§7[§3Auctions§7]");
	$form->addButton("§e§7[§3Warps§7]");
	$form->addButton("§e§7[§3Texting/Typing§7]");
	$form->addButton("§e§7[§3PvP Items/Rewards§7]");
	$form->addButton("§e§7[§3CustomEnchants§7]");
	$form->addButton("§e§7[§3Tags and Kits§7]");
	$form->addButton("§e§7[§3BlackMarket and Shop§7]");
	$form->addButton("§e§7[§3Xp Usage§7]");
	$form->addButton("§e§7[§3Gangs§7]");
		
  	$form->addButton("§l§6CLOSE");
  	$form->sendToPlayer($player);
        return $form;
    }
}
