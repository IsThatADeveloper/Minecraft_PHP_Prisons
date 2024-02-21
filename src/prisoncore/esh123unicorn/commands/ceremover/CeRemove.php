<?php

namespace prisoncore\esh123unicorn\commands\ceremover;

use DaPigGuy\PiggyCustomEnchants\enchants\CustomEnchant;
use DaPigGuy\PiggyCustomEnchants\PiggyCustomEnchants;
use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\player\Player;
use DaPigGuy\PiggyCustomEnchants\CustomEnchantManager;
use pocketmine\utils\TextFormat as TF;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class CeRemove extends CommandBase{
    
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("ceremove", "Transfer a custom enchant from your item into a book", "§4Use: §r/ceremove <enchant>", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("ceremover.command.ceremove") and $sender instanceof Player) {
            if(isset($args[0])){
                $ench = CustomEnchantManager::getEnchantmentByName($args[0]);
                if($ench !== null){
                    $item = $sender->getInventory()->getItemInHand();
                    if($item->getEnchantment($ench->getId()) !== null){
                        $lvl = $item->getEnchantment($ench->getId())->getWorld();
                        $ebook = Item::get(Item::ENCHANTED_BOOK);
                        $piggy = $this->owner->getServer()->getPluginManager()->getPlugin("PiggyCustomEnchants");
                        if($piggy instanceof PiggyCustomEnchants) {
                            $ebook->addEnchantment(new EnchantmentInstance(new CustomEnchant($piggy, $ench->getId(), $ench->getRarity()), $lvl));
                            if($sender->getInventory()->canAddItem($ebook)) {
                                $newItem = clone $item;
                                $newItem->removeEnchantment($ench->getId());
                                $inv = $sender->getInventory();
                                //$inv->removeItem($item);
                                //$inv->addItem($newItem);
                                $inv->setItemInHand($newItem);
                                $inv->addItem($ebook);
                                $sender->sendMessage(TF::GREEN . "Enchantment " . $args[0] . " was successfully separated into a book from " . $item->getName());
                            }
                            else {
                                $sender->sendMessage(TF::RED . "You do not have enough space in your inventory to collect the enchantment book");
                            }
                        }
                        else {
                            $sender->sendMessage(TF::LIGHT_PURPLE . "This error was no supposed to occur, contact an Owner as soon as possible");
                        }
                    }
                    else {
                        $sender->sendMessage(TF::RED . "You do not have that enchantment on your currently held item");
                    }
                }
                else {
                    $sender->sendMessage(TF::RED . "Such enchantment does not exist");
                }
            }
            else {
                $sender->sendMessage($this->getUsage());
            }
        }
    }
}
