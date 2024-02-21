<?php

namespace prisoncore\esh123unicorn\commands\ui\staff;

use prisoncore\esh123unicorn\Main;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
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

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class WhitelistRemove extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("whitelist-remove", "Opens whitelist remove UI", "§4Use: §r/whitelist-remove", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("whitelistremove.use") and $sender instanceof Player) {
           $this->whitelistuiform($sender);
       } else {
           $sender->sendMessage("§cYou do not have permission to use this command");
	    }
        }
        
	public function whitelistuiform(Player $sender){
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            		}
			switch($data){
                        case 0:
                            $this->whitelist($sender);
                            break;
      }
    });
    $form->setTitle("§l§a-=PrisonWhitelist=-");
    $form->addButton("§8Whitelist Remove");
    $form->addButton("§cEXIT");
    $form->sendToPlayer($sender);
 }	

 public function whitelist(Player $sender){
	    $form = new CustomForm(function(Player $sender, ?array $data){
 		  $result = $data[0];
            if ($result === null) {
                return true;
	    	}
			$cmd = "whitelist remove $data[0]";
		        $p = $sender->getName();
			$this->getPlugin()->getServer()->dispatchCommand($sender, $cmd);
		});
		$form->setTitle("§a§b-=WhitelistUI=-");
		$form->addInput("§cPlayerName");
		$form->sendToPlayer($sender);
		      
	}
}
