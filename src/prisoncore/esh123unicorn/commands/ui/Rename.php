<?php

namespace prisoncore\esh123unicorn\commands\ui;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\world\sound\PopSound;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Rename extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("rename", "Opens blacksmith UI", "§4Use: §r/rename", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
           $this->renameuiform($sender);
    }
	
    public function renameuiform(Player $sender){
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            		}
			switch($data){
		
                        case 0:
                            $this->rename($sender);
                            break;
                        case 1:
			    $sender->sendMessage("§cComing soon");
                            break;
                        case 2:
			    $this->rename2($sender);
                            break;
			}
    		});
		$form->setTitle("§l§a-=PrisonRename=-");
  	        $form->addButton("§8Rename Item");
    		$form->addButton("§8CeUpgrade\n§cComing Soon");
   	        $form->addButton("§8Ce Remove");
    		$form->addButton("§cEXIT");
		$form->sendToPlayer($sender);
    }
 
    public function rename(Player $sender){
	    $f = new CustomForm(function(Player $sender, ?array $data){
             if(!isset($data)) return;
		 $item = $sender->getInventory()->getItemInHand();
		  if($item->getId() == 0) {
                    $sender->sendMessage("§cYou're not holding an item");
                    return;
                }
	     if($sender->getXpLevel() >= 30){
                $sender->setXpLevel($sender->getXpLevel() - 30);
                $item->setCustomName(($data[1]));
                $sender->getInventory()->setItemInHand($item);
                $sender->sendMessage("§asuccessfully changed item name to §r$data[1]");
                }else{
	     $sender->sendMessage("§aYou have " . $sender->getXPLevel() . "xp you are missing levels. 30xp levels required");
             }
	    });
	 
          $xp = $sender->getXpLevel();
	  $f->setTitle("§l§a-=PrisonRename=-");
	  $f->addLabel("§aRename cost: §a30 XP\n§bYour XP: $xp");
          $f->addInput("§bRename Item:", "§aItem Name");
	  $f->sendToPlayer($sender);
   }
	
   public function rename2(Player $sender){   
	    $f = new CustomForm(function(Player $sender, ?array $data){
             if(!isset($data)) return;
		 $item = $sender->getInventory()->getItemInHand();
		  if($item->getId() == 0) {
                    $sender->sendMessage("You're not holding an item");
                    return;
                }
		$cmd = "ceremove $data[1]";
            	$sender->getServer()->dispatchCommand($sender, $cmd); 
                $sender->sendMessage("successfully removed §b$data[1] §ace from this item"); 
        });    

      $xp = $sender->getXpLevel();    
      $p = $sender->getName();    
      $f->setTitle("§l§a-=PrisonCeRemove=-");    
      $f->addLabel("§e$p \n§bYour XP:§a $xp");    
      $f->addInput("§bRemove Ce:", "§aCe Name");    
      $f->sendToPlayer($sender);
   }
}
