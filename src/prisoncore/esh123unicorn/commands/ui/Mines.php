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
use onebone\economyapi\EconomyAPI;
use jojoe77777\FormAPI\CustomForm;

use pocketmine\command\ConsoleCommandSender;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Mines extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("mines", "Opens mines UI", "§4Use: §r/mines", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
    if($sender instanceof Player) {
       if($sender->hasPermission("prestige1.use")){
	   $this->OpenPrestigeUI($sender);
   	 }else{
           $this->OpenUI($sender);
    	   }
    	}
    }
	
    public function minesPermission(string $name, string $mine) { 
	    $server = $this->getPlugin()->getServer();
	    $language = $this->getPlugin()->getServer()->getLanguage();
            $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "unsetuperm " . $name . " mine.permission" . $mine);
    }
	
    public function teleportToMines(Player $player, string $mine) {
      	if($player->hasPermission("mine.permission" . $mine)){
           $player->sendTitle("§a⸕Teleporting...");
           $this->getPlugin()->getServer()->dispatchCommand($player, "warp mine" . $mine);
	}else{ 
	   $player->sendMessage("§7(§c!§7) §cMine " . ucfirst($mine) . " is locked right now. Use command /rankup to progress further!");
	}
    }
				  

	
    public function OpenUI(Player $player){
        $form = new SimpleForm(function (Player $player, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
            $this->getPlugin()->getServer()->dispatchCommand($player, "rankup");
                break;
                case 1:
            $player->sendTitle("§a⸕Teleporting...");
            $this->getPlugin()->getServer()->dispatchCommand($player, "warp plots");
                break;
                case 2:
            $player->sendTitle("§a⸕Teleporting...");
            $this->getPlugin()->getServer()->dispatchCommand($player, "warp bosses");
                break;
                case 3:
	    $this->teleportToMines($player, "op");
                break;
                case 4:
	    $this->teleportToMines($player, "a");
                break;
                case 5:
	    $this->teleportToMines($player, "b");
                break;
                case 6:
	    $this->teleportToMines($player, "c");
                break;
                case 7:
	    $this->teleportToMines($player, "d");
                break;
                case 8:
	    $this->teleportToMines($player, "e");
                break;
                case 9:
	    $this->teleportToMines($player, "f");
                break;
                case 10:
	    $this->teleportToMines($player, "g");
                break;
                case 11:
	    $this->teleportToMines($player, "h");
                break;
                case 12:
	    $this->teleportToMines($player, "i");
                break;
                case 13:
	    $this->teleportToMines($player, "j");
                break;
                case 14:
	    $this->teleportToMines($player, "k");
                break;
                case 15:
	    $this->teleportToMines($player, "l");
                break;
                case 16:
	    $this->teleportToMines($player, "m");
                break;
                case 17:
	    $this->teleportToMines($player, "n");
                break;
                case 18:
	    $this->teleportToMines($player, "o");
                break;
                case 19:
	    $this->teleportToMines($player, "p");
                break;
                case 20:
	    $this->teleportToMines($player, "q");
                break;
                case 21:
	    $this->teleportToMines($player, "r");
                break;
                case 22:
	    $this->teleportToMines($player, "s");
                break;
                case 23:
	    $this->teleportToMines($player, "t");
                break;
                case 24:
	    $this->teleportToMines($player, "u");
                break;
                case 25:
	    $this->teleportToMines($player, "v");
                break;
                case 26:
	    $this->teleportToMines($player, "2");
                break;
                case 27:
	    $this->teleportToMines($player, "x");
                break;
                case 28:
	    $this->teleportToMines($player, "y");
                break;
                case 29:
	    $this->teleportToMines($player, "z");
                break;
                case 30:
		$p = $player->getName();
      	    if(!$player->hasPermission("simplewarp.warp.minez")){
            $player->sendMessage("§7(§c!§7) §cThis is locked right now. You need to rankup to gain the ability to prestige!");
	  }else{
	    if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player) >= ("30000000")){
            $player->sendMessage("§aYou are now §bprestige §a1");
	    $this->minesPermission($p, "a");
	    $this->minesPermission($p, "b");
	    $this->minesPermission($p, "c");
	    $this->minesPermission($p, "d");
	    $this->minesPermission($p, "e");
	    $this->minesPermission($p, "f");
	    $this->minesPermission($p, "g");
	    $this->minesPermission($p, "h");
	    $this->minesPermission($p, "i");
	    $this->minesPermission($p, "j");
	    $this->minesPermission($p, "k");
	    $this->minesPermission($p, "l");
	    $this->minesPermission($p, "m");
	    $this->minesPermission($p, "n");
	    $this->minesPermission($p, "o");
	    $this->minesPermission($p, "p");
	    $this->minesPermission($p, "q");
	    $this->minesPermission($p, "r");
	    $this->minesPermission($p, "s");
	    $this->minesPermission($p, "t");
	    $this->minesPermission($p, "u");
	    $this->minesPermission($p, "v");
	    $this->minesPermission($p, "w");
	    $this->minesPermission($p, "x");
	    $this->minesPermission($p, "y");
	    $this->minesPermission($p, "z");
	    }else{
            $player->sendMessage("§7(§c!§7) §cYou are missing money to use prestige, you need 30 million to prestige");
	    }
		}
                break;
            	}
	});
        $form->setTitle("§l-=§aPrison Mines§r§l=-");
	$form->setContent("Choose A Mine or Warp To Teleport!");
		
        $form->addButton("§7[§o§cRank§dUp§r§7]");
		
        $form->addButton("§7[§aPlots§r§7]");
	$form->addButton("§7[§lBoss Battles§7§l]");
        $form->addButton($player->hasPermission("simplewarp.warp.mineop") === true ? "§7[§l§bDonator §3Mine§r§7]\n§aAVAILABLE" : "§7[§l§bDonator §3Mine§r§7]\n§cLOCKED");
		
	$form->addButton($player->hasPermission("simplewarp.warp.minea") === true ? "§7[§l§bMine §3A§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3A§r§7]\n§cLOCKED");
        $form->addButton($player->hasPermission("simplewarp.warp.mineb") === true ? "§7[§l§bMine §3B§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3B§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minec") === true ? "§7[§l§bMine §3C§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3C§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mined") === true ? "§7[§l§bMine §3D§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3D§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minee") === true ? "§7[§l§bMine §3E§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3E§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minef") === true ? "§7[§l§bMine §3F§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3F§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineg") === true ? "§7[§l§bMine §3G§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3G§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineh") === true ? "§7[§l§bMine §3H§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3H§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minei") === true ? "§7[§l§bMine §3I§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3I§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minej") === true ? "§7[§l§bMine §3J§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3J§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minek") === true ? "§7[§l§bMine §3K§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3K§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minel") === true ? "§7[§l§bMine §3L§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3L§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minem") === true ? "§7[§l§bMine §3M§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3M§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minen") === true ? "§7[§l§bMine §3N§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3N§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineo") === true ? "§7[§l§bMine §3O§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3O§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minep") === true ? "§7[§l§bMine §3P§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3P§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineq") === true ? "§7[§l§bMine §3Q§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3Q§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.miner") === true ? "§7[§l§bMine §3R§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3R§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mines") === true ? "§7[§l§bMine §3S§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3S§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minet") === true ? "§7[§l§bMine §3T§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3T§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineu") === true ? "§7[§l§bMine §3U§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3U§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineu") === true ? "§7[§l§bMine §3V§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3V§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minew") === true ? "§7[§l§bMine §3W§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3W§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minex") === true ? "§7[§l§bMine §3X§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3X§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.miney") === true ? "§7[§l§bMine §3Y§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3Y§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minez") === true ? "§7[§l§bMine §3Z§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3Z§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minez") === true ? "§7[§l§ePrestige§r§7]\n§aAVAILABLE" : "§e§7[§l§ePrestige§r§7]\n§cLOCKED");

        $form->sendToPlayer($player);
        return $form;
    }
	
    public function OpenPrestigeUI(Player $player){
            $form = new SimpleForm(function (Player $player, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
            $this->getPlugin()->getServer()->dispatchCommand($player, "rankup");
                break;
                case 1:
            $player->addTitle("§a⸕Teleporting...");
            $this->getPlugin()->getServer()->dispatchCommand($player, "warp plots");
                break;
                case 2:
            $player->addTitle("§a⸕Teleporting...");
            $this->getPlugin()->getServer()->dispatchCommand($player, "warp bosses");
                break;
                case 3:
	    $this->teleportToMines($player, "op");
                break;
                case 4:
	    $this->teleportToMines($player, "a");
                break;
                case 5:
	    $this->teleportToMines($player, "b");
                break;
                case 6:
	    $this->teleportToMines($player, "c");
                break;
                case 7:
	    $this->teleportToMines($player, "d");
                break;
                case 8:
	    $this->teleportToMines($player, "e");
                break;
                case 9:
	    $this->teleportToMines($player, "f");
                break;
                case 10:
	    $this->teleportToMines($player, "g");
                break;
                case 11:
	    $this->teleportToMines($player, "h");
                break;
                case 12:
	    $this->teleportToMines($player, "i");
                break;
                case 13:
	    $this->teleportToMines($player, "j");
                break;
                case 14:
	    $this->teleportToMines($player, "k");
                break;
                case 15:
	    $this->teleportToMines($player, "l");
                break;
                case 16:
	    $this->teleportToMines($player, "m");
                break;
                case 17:
	    $this->teleportToMines($player, "n");
                break;
                case 18:
	    $this->teleportToMines($player, "o");
                break;
                case 19:
	    $this->teleportToMines($player, "p");
                break;
                case 20:
	    $this->teleportToMines($player, "q");
                break;
                case 21:
	    $this->teleportToMines($player, "r");
                break;
                case 22:
	    $this->teleportToMines($player, "s");
                break;
                case 23:
	    $this->teleportToMines($player, "t");
                break;
                case 24:
	    $this->teleportToMines($player, "u");
                break;
                case 25:
	    $this->teleportToMines($player, "v");
                break;
                case 26:
	    $this->teleportToMines($player, "2");
                break;
                case 27:
	    $this->teleportToMines($player, "x");
                break;
                case 28:
	    $this->teleportToMines($player, "y");
                break;
                case 29:
	    $this->teleportToMines($player, "z");
                break;
                case 30:
	            $player->sendMessage("§7(§c!§7) §cComing soon");
                break;
            }
		});
        $form->setTitle("§l-=§aPrison Mines§r§l=-");
	$form->setContent("Choose A Mine or Warp To Teleport!");
		
        $form->addButton("§7[§o§cRank§dUp§r§7]");
		
        $form->addButton("§7[§aPlots§r§7]");
	$form->addButton("§7[§lBoss Battles§7§l]");
        $form->addButton($player->hasPermission("simplewarp.warp.mineop") === true ? "§7[§l§bDonator §3Mine§r§7]\n§aAVAILABLE" : "§7[§l§bDonator §3Mine§r§7]\n§cLOCKED");
		
	$form->addButton($player->hasPermission("simplewarp.warp.minea") === true ? "§7[§l§bMine §3A1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3A1§r§7]\n§cLOCKED");
        $form->addButton($player->hasPermission("simplewarp.warp.mineb") === true ? "§7[§l§bMine §3B1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3B1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minec") === true ? "§7[§l§bMine §3C1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3C1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mined") === true ? "§7[§l§bMine §3D1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3D1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minee") === true ? "§7[§l§bMine §3E1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3E1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minef") === true ? "§7[§l§bMine §3F1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3F1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineg") === true ? "§7[§l§bMine §3G1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3G1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineh") === true ? "§7[§l§bMine §3H1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3H1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minei") === true ? "§7[§l§bMine §3I1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3I1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minej") === true ? "§7[§l§bMine §3J1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3J1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minek") === true ? "§7[§l§bMine §3K1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3K1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minel") === true ? "§7[§l§bMine §3L1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3L1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minem") === true ? "§7[§l§bMine §3M1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3M1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minen") === true ? "§7[§l§bMine §3N1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3N1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineo") === true ? "§7[§l§bMine §3O1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3O1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minep") === true ? "§7[§l§bMine §3P1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3P1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineq") === true ? "§7[§l§bMine §3Q1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3Q1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.miner") === true ? "§7[§l§bMine §3R1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3R1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mines") === true ? "§7[§l§bMine §3S1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3S1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minet") === true ? "§7[§l§bMine §3T1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3T1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineu") === true ? "§7[§l§bMine §3U1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3U1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.mineu") === true ? "§7[§l§bMine §3V1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3V1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minew") === true ? "§7[§l§bMine §3W1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3W1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minex") === true ? "§7[§l§bMine §3X1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3X1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.miney") === true ? "§7[§l§bMine §3Y1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3Y1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minez") === true ? "§7[§l§bMine §3Z1§r§7]\n§aAVAILABLE" : "§7[§l§bMine §3Z1§r§7]\n§cLOCKED");
	$form->addButton($player->hasPermission("simplewarp.warp.minez") === true ? "§7[§l§ePrestige 2§r§7]\n§aAVAILABLE" : "§e§7[§l§ePrestige 2§r§7]\n§cLOCKED");
        $form->sendToPlayer($player);
        return $form;
    }
}
