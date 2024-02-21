<?php

namespace prisoncore\esh123unicorn\commands\ui\staff;

use prisoncore\esh123unicorn\Main;
use prisoncore\messages\Translation;
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

class Kick extends CommandBase{
	
    public $playerList = [];
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("kick", "Opens kick UI", "§4Use: §r/kick", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if($player->hasPermission("kick.use") and $sender instanceof Player) {
           $this->kickuiform($sender);
       } else {
           $sender->sendMessage("§cYou do not have permission to use this command");
	    }
    }
	
    public function creatKickSave(string $type, $reason) {
	$randNumber = mt_rand(0, 1000000);
	$lowercasename = strtolower($player->getName());
	$config = new Config($this->plugin->banFolder . $lowercasename . "-" . $randNumber . ".yml", Config::YAML);
	$config->setAll([
		"player" => $player->getName(), 
		"ip" => $player->getNetworkSession()->getIp(), 
		"type" => $type, 
		"reason" => $reason
	]);
	$config->save();
    }
	
    public function kickuiform(Player $player){
	    $list = [];
	    foreach($this->getPlugin()->getServer()->getOnlinePlayers() as $p) {
		    $list[] = $p->getName();
	    }
				
	    $this->playerList[$player->getName()] = $list;

	    $form = new CustomForm(function(Player $player, ?array $data){
            if(!isset($data)) return;
		    
		    	$indexlist = $data[0];
		    	$playername = $this->playerList[$player->getName()][$indexlist];
		    
	    		foreach($this->getPlugin()->getServer()->getOnlinePlayers() as $target) {
				if($target->getName() == $playername) {
		    
			$target->kick($data[1]);
			$this->getPlugin()->message($player, Translation::getMessage("messageBan", ["type" => "kicked", "target" => $playername, "reason" => ($data[1])]));
			$this->getPlugin()->getServer()->broadcastMessage(Translation::getMessage("broadcastBan", ["player" => $player->getName(), "type" => "kicked", "target" => $playername, "reason" => ($data[1])]));
			$this->creatKickSave("kicked", $data[1]);
			}
		   }
	    });
	    $form->setTitle("§l§a-=KickUI=-");
	    $form->addDropdown("PlayerName: ", $this->playerList[$player->getName()]);
	    $form->addInput("Reason: ");
	    $form->sendToPlayer($player);
    }
}
