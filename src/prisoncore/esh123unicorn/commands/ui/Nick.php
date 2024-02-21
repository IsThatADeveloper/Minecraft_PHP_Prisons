<?php

namespace prisoncore\esh123unicorn\commands\ui;

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

class Nick extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("nick", "Used to nick yourself", "§4Use: §r/nick", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("nick.use") and $sender instanceof Player) {
           $this->nickform($sender);
       } else {
           $sender->sendMessage("§cYou do not have permission to use this command");
	    }
    }
      

    public function nickform(Player $sender){
	    $form = new CustomForm(function(Player $sender, ?array $data){
 	    $result = $data[0];
            if ($result === null) {
                return true;
	    	}
	      		$sender->setDisplayName($data[0]);
		     	$sender->sendMessage("§7(§a!§7) §aYou changed your name to ". $data[0]);
		});
		$form->setTitle("§a§b-=Nick=-");
		$form->addInput("§cNickname");
		$form->sendToPlayer($sender);
		      
	}
}
