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

class Ban extends CommandBase{
	
    public $playerList = [];
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("ban", "Opens ban UI", "§4Use: §r/ban", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
           if($player->hasPermission("ban.use") and $sender instanceof Player) {
              $this->banuiform($sender);
           } else {
              $sender->sendMessage("§cYou do not have permission to use this command");
	   }
    }
	
    public function createBanSave(string $type, $reason) {
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
	
    public function banuiform(Player $player){
	    $list = [];
	    foreach($this->getPlugin()->getServer()->getOnlinePlayers() as $p) {
		    $list[] = $p->getName();
	    }
				
	    $this->playerList[$player->getName()] = $list;
	    
	    $form = new CustomForm(function(Player $player, ?array $data){
            if(!isset($data)) return;
		    
		    	$indexlist = $data[1];
		    	$playername = $this->playerList[$player->getName()][$indexlist];
		    
                	$index = $data[0];
			$arrayName = array("§8[§8Ban Player]", "§8[§8IPBan Player]");
		    	$arrayValue = $arrayName[$index];
		    	
		    	if($arrayValue == "§8[§8Ban Player]") {
				   $this->getPlugin()->getServer()->getNameBans()->addBan($playername, $data[2]);
				   $this->getPlugin()->message($player, Translation::getMessage("broadcastBan", ["type" => "banned", "target" => $playername, "reason" => ($data[2])]));
				   $this->getPlugin()->getServer()->broadcastMessage(Translation::getMessage("broadcastBan", ["player" => $player->getName(), "type" => "banned", "target" => $playername, "reason" => ($data[2])]));
				   $this->createBanSave("Banned", $data[2]);
			}elseif($arrayValue == "§8[§8IPBan Player]") {
				$config = new Config($this->getPlugin()->playerFolder . strtolower($playername) . ".yml", Config::YAML);
				$ip = $config->get("ip");
				$this->getPlugin()->message($player, Translation::getMessage("broadcastBan", ["type" => "Ip banned", "target" => $playername, "reason" => ($data[2])]));
				$this->getPlugin()->getServer()->broadcastMessage(Translation::getMessage("broadcastBan", ["player" => $player->getName(), "type" => "Ip banned", "target" => $playername, "reason" => ($data[2])]));
				$this->getPlugin()->getServer()->getIPBans()->addBan($ip, $data[2]);
				$this->createBanSave("Ip banned", $data[2]);
	    		}
	    });
	    $form->setTitle("§l§a-=BanUI=-");
	    $array = array("§8[§8Ban Player]", "§8[§8IPBan Player]");
	    $form->addDropdown("§8Ban Options", $array);
	    $form->addDropdown("PlayerName: ", $this->playerList[$player->getName()]);
	    $form->addInput("Reason: ");
	    $form->sendToPlayer($player);
    }
}
