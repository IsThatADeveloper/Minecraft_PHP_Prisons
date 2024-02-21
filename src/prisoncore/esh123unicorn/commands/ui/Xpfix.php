<?php

namespace prisoncore\esh123unicorn\commands\ui;

use prisoncore\esh123unicorn\Main;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\command\CommandSender;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\world\sound\PopSound;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Xpfix extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("xpfix", "Fixes item in your hand using XP", "§4Use: §r/xpfix", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args):void
    {
        if($sender instanceof Player){
           $this->xpfixform($sender);
       } else {
           $sender->sendMessage("§cUse this command ingame");
	    }
    }
	
    public function xpfixform(Player $player){
        $form = new SimpleForm(function (Player $player, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
	$xp = $player->getXpLevel();
	$inv = $player->getInventory();
	$hand = $inv->getItemInHand();
        if($xp >= 15) {
           $player->subtractXpLevel(15);
	   $hand->setDamage(0);
	   $player->sendMessage("§7(§a!§7) §aYou fixed ". $hand->getCustomName() . " for 15 xp levels");
	   }else{
	     $player->sendMessage("§7(§c!§7) §cYou don't only have 15 levels");
	   }
           break;
	   }
	});
	$xp = $player->getXpLevel();
        $form->setTitle("§l-=§aPrison XPFixUI§r§l=-");
	$form->setContent("§e§7[§aHold the item you want to fix and use this command§7]");
	$form->setContent("§aYour xp§7: §a§l$xp");
	$form->addButton("§e§7[§3XpFix§7]");
	$form->addButton("§7[§3YourXp§7]");
        $form->addButton("§l§6CLOSE");
        $form->sendToPlayer($player);
        return $form;
    }
}

