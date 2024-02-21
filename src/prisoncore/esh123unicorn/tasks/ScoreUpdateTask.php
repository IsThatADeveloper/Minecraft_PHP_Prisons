<?php

namespace prisoncore\esh123unicorn\tasks;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\scheduler\Task as PluginTask;
use pocketmine\plugin\Plugin;
use onebone\economyapi\EconomyAPI; //money not really going to be used
use onebone\tokenapi\TokenAPI; //used in replacement of coins
use onebone\mpapi\MpAPI; //magical power for wands

use pocketmine\utils\config;

use prisoncore\esh123unicorn\Main;
use prisoncore\esh123unicorn\utils\Scoreboard;
use _64FF00\PurePerms\PurePerms;
use rankup\rank\Rank;
use rankup\RankUp;

class ScoreUpdateTask extends PluginTask {

	private $player;
        public $group;
	private $purePerms;
	private $rankUp;
	
  	public function __construct(Plugin $plugin){
  	  	$this->plugin = $plugin;
   	}

        public function onRun(): void {
	$this->purePerms = $this->plugin->getServer()->getPluginManager()->getPlugin("PurePerms");
	$this->rankUp = $this->plugin->getServer()->getPluginManager()->getPlugin("RankUp");
	//addons
	foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
	$online = count($this->plugin->getServer()->getOnlinePlayers());
	$maxonline = $player->getServer()->getMaxPlayers();
	$level = $player->getWorld();
	$p = $player->getName();
	$hp = $player->getMaxHealth();
	$nametag = $player->getNameTag();
	$displayname = $player->getDisplayName();
	
	//extras
	$ip = $player->getNetworkSession()->getIp();
	$x = intval($player->getPosition()->getX());
	$y = intval($player->getPosition()->getY());
	$z = intval($player->getPosition()->getZ());
	    
	//pureperms
	$purePerms = $this->purePerms;
   	$group = $this->getPlayerRank($player);
	$prefix = $this->getPrefix($player);
	$suffix = $this->getSuffix($player);
	$jump = $this->getJump($player);
	$speed = $this->getSpeed($player);
	$feed = $this->getFeed($player);
	$heal = $this->getHeal($player);
	$nv = $this->getNv($player);
	$speedbreaker = $this->getSpeedbreaker($player);
	$fly = $this->getFly($player);
		
	//rankup 
	$rank = $this->getRank($player);
	$rankprice = $this->getRankUpPrice($player);
		
	//economies
	$money = EconomyAPI::getInstance()->myMoney($player);
	$token = TokenAPI::getInstance()->myToken($player);	
	    
	//scoreboard
        \prisoncore\esh123unicorn\utils\Scoreboard::new($player, 'prisoncore', "§7[§3P§br§3i§bs§3o§bn§3B§bl§3o§bc§3k§bM§3C§bP§3E§7]");

        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 1, " " . "§5➜ §l§7[§6" . $p . "§7]"); //player name
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 2, " " . "§5➜ §l§3Players§1: §7[§6". $online . "§7] §5/ §7[§d ". $maxonline ."§7]");
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 3, " " . "§5➜ §l§3Mana§1: §7[§6". $money ."§7]"); //group 
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 5, " " . "§5➜ §l§3Tokens§1: §7[§6". $token ."§7]");
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 6, " " . "§5➜ §l§3Tag§1: §6". $prefix);
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 7, " " . "§5➜ §l§3Perks§1: §7[§a". $jump ."§f". $speed . "§e" . $speedbreaker ."§7::§2". $feed ."§d". $heal ."§1". $nv ."§7]");
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 8, " " . "§5➜ §l§3Current Rank§1: §7[§6". $group ."§7]");
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 9, " " . "§5➜ §l§3Current Rank§1: §7[§6". $rank ."§7]");
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 11, " " . "§5➜ §l§7[§6mcpeprisonblock.buy");
        \prisoncore\esh123unicorn\utils\Scoreboard::setLine($player, 12, " " . "§5➜ §l§6craft.net§7]");
	}
		}
	
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getPrefix(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$prefix = $purePerms->getUserDataMgr()->getNode($player, "prefix");

			if($levelName === null){
				if(($prefix === null) || ($prefix === "")){
					return "No Prefix";
				}

				return (string) $prefix;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["prefix"]) || $worldData["prefix"] == null){
					return "No Prefix";
				}

				return $worldData["prefix"];
			}
		}
	
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getSuffix(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$suffix = $purePerms->getUserDataMgr()->getNode($player, "suffix");

			if($levelName === null){
				if(($suffix === null) || ($suffix === "")){
					return "No Suffix";
				}

				return (string) $suffix;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["suffix"]) || $worldData["suffix"] == null){
					return "No Suffix";
				}

				return $worldData["suffix"];
			}
		}
	
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getJump(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$jump = $purePerms->getUserDataMgr()->getNode($player, "jump");

			if($levelName === null){
				if(($jump === null) || ($jump === "")){
					return "";
				}

				return (string) $jump;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["jump"]) || $worldData["jump"] == null){
					return "";
				}

				return $worldData["jump"];
			}
		}
	
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getFeed(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$feed = $purePerms->getUserDataMgr()->getNode($player, "feed");

			if($levelName === null){
				if(($feed === null) || ($feed === "")){
					return "";
				}

				return (string) $feed;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["feed"]) || $worldData["feed"] == null){
					return "";
				}

				return $worldData["feed"];
			}
		}
	
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getSpeed(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$speed = $purePerms->getUserDataMgr()->getNode($player, "speed");

			if($levelName === null){
				if(($speed === null) || ($speed === "")){
					return "";
				}

				return (string) $speed;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["speed"]) || $worldData["speed"] == null){
					return "";
				}

				return $worldData["speed"];
			}
		}
	
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getHeal(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$heal = $purePerms->getUserDataMgr()->getNode($player, "heal");

			if($levelName === null){
				if(($heal === null) || ($heal === "")){
					return "";
				}

				return (string) $heal;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["heal"]) || $worldData["heal"] == null){
					return "";
				}

				return $worldData["heal"];
			}
		}

		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getSpeedbreaker(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$speedbreaker = $purePerms->getUserDataMgr()->getNode($player, "speedbreaker");

			if($levelName === null){
				if(($speedbreaker === null) || ($speedbreaker === "")){
					return "";
				}

				return (string) $speedbreaker;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["speedbreaker"]) || $worldData["speedbreaker"] == null){
					return "";
				}

				return $worldData["speedbreaker"];
			}
		}
	
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getNv(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$nv = $purePerms->getUserDataMgr()->getNode($player, "nv");

			if($levelName === null){
				if(($nv === null) || ($nv === "")){
					return "";
				}

				return (string) $nv;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["nv"]) || $worldData["nv"] == null){
					return "";
				}

				return $worldData["nv"];
			}
		}
	
		/**
		 * @param Player $player
		 * @param null   $levelName
		 * @return string
		 */
		public function getFly(Player $player, $levelName = null): string{
			$purePerms = $this->purePerms;
			$fly = $purePerms->getUserDataMgr()->getNode($player, "fly");

			if($levelName === null){
				if(($fly === null) || ($fly === "")){
					return "";
				}

				return (string) $fly;
			}else{
				$worldData = $purePerms->getUserDataMgr()->getWorldData($player, $levelName);

				if(empty($worldData["fly"]) || $worldData["fly"] == null){
					return "";
				}

				return $worldData["fly"];
			}
		}
	
		/**
		 * @param Player $player
		 * @return string
		 */
		public function getPlayerRank(Player $player): string{
			$group = $this->purePerms->getUserDataMgr()->getData($player)['group'];

			if($group !== null){
				return $group;
			}else{
				return "No Rank";
			}
		}
	
    public function getRank(Player $player): string{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->plugin->rankupFolder . $lowercasename . ".yml", Config::YAML);
		return $config->get("rank");
    }
	
    public function getNextRank(Player $player): string{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->plugin->rankupFolder . $lowercasename . ".yml", Config::YAML);
		return $config->get("nextrank");
    }
	
    public function getRankUpPrice(Player $player): int{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->plugin->rankupFolder . $lowercasename . ".yml", Config::YAML);
		return (int) $config->get("rankprice");
    }
}
