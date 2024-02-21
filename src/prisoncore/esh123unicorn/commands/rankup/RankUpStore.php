<?php

namespace prisoncore\esh123unicorn\commands\rankup;

use prisoncore\esh123unicorn\Main;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use onebone\economyapi\EconomyAPI;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\item\Item;

use pocketmine\level\particle\EnchantmentTableParticle;
use pocketmine\level\particle\ExplodeParticle;

use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI;

use pocketmine\command\ConsoleCommandSender;

use pocketmine\utils\config;

use function trim;

class RankUpStore {
	
    private $plugin;
	
    private $rank;
    private $nextrank;

    public function __construct(Main $plugin) {
    	$this->plugin = $plugin;
    }
	
    public function getPlugin() {
	return $this->plugin;
    }
	
    public function getRank(Player $sender): string {
	    $lowercasename = strtolower($sender->getName());
	    $config = new Config($this->getPlugin()->rankupFolder . $lowercasename . ".yml", Config::YAML);
	    return $config->get("rank");
    }
	
    public function setRank(Player $sender, string $currentRank, string $nextRank, int $price) {
	    $lowercasename = strtolower($sender->getName());
	    $config = new Config($this->getPlugin()->rankupFolder . $lowercasename . ".yml", Config::YAML);
	    $config->set("rank", $currentRank);
	    $config->set("nextrank", $nextRank);
	    $config->set("rankprice", $price);
	    $config->save();
    }
	
    public function rankupIncrease(Player $sender, string $nextRank, string $secondNextRank, int $price, int $nextPrice) {
	    $eco = $this->getPlugin()->getServer()->getPluginManager()->getPlugin("EconomyAPI");
	    if($eco->myMoney($sender) >= $price) {
	       EconomyAPI::getInstance()->reduceMoney($sender, ($price)); 
	       $this->setRank($sender, $nextRank, $secondNextRank, $nextPrice);
	       $this->getPlugin()->setPlayerPermission($sender, "mine.permission" . $nextRank);
	       $sender->sendMessage("You ranked up to " . $nextRank);
	    }else{
	       $sender->sendMessage("You don't have enough money to rankup");
	    }
	    if($nextRank == "None") {
	       $this->setRank($sender, "-", "-", "-");
	       $sender->sendMessage("You are at the max rank");
	    }
	    if($secondNextRank == "None") {
	       $this->setRank($sender, $nextRank, "-", $nextPrice);
	    }
    }
	
    public function RankUp(Player $sender) { 
	    if($this->getRank($sender) == "A") { 
	       $this->rankupIncrease($sender, "B", "C", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "B") { 
	       $this->rankupIncrease($sender, "C", "D", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "C") { 
	       $this->rankupIncrease($sender, "D", "E", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "D") { 
	       $this->rankupIncrease($sender, "E", "F", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "E") { 
	       $this->rankupIncrease($sender, "F", "G", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "F") { 
	       $this->rankupIncrease($sender, "G", "H", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "G") { 
	       $this->rankupIncrease($sender, "H", "I", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "H") { 
	       $this->rankupIncrease($sender, "I", "J", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "I") { 
	       $this->rankupIncrease($sender, "J", "K", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "J") { 
	       $this->rankupIncrease($sender, "K", "L", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "L") { 
	       $this->rankupIncrease($sender, "M", "N", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "M") { 
	       $this->rankupIncrease($sender, "N", "O", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "N") { 
	       $this->rankupIncrease($sender, "O", "P", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "O") { 
	       $this->rankupIncrease($sender, "P", "Q", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "P") { 
	       $this->rankupIncrease($sender, "Q", "R", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "Q") { 
	       $this->rankupIncrease($sender, "R", "S", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "R") { 
	       $this->rankupIncrease($sender, "S", "T", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "S") { 
	       $this->rankupIncrease($sender, "T", "U", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "T") { 
	       $this->rankupIncrease($sender, "U", "V", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "U") { 
	       $this->rankupIncrease($sender, "V", "W", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "V") { 
	       $this->rankupIncrease($sender, "W", "X", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "W") { 
	       $this->rankupIncrease($sender, "X", "Y", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "X") { 
	       $this->rankupIncrease($sender, "Y", "Z", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "Y") { 
	       $this->rankupIncrease($sender, "Z", "None", "100000", "100000");
		    
	    }elseif($this->getRank($sender) == "Z") { 
	       $this->rankupIncrease($sender, "None", "None", "100000", "100000");
	    }
    }
}
	       
	
	
	
