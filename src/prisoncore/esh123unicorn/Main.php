<?php

namespace prisoncore\esh123unicorn;

use prisoncore\esh123unicorn\commands\essentials\Jump;
use prisoncore\esh123unicorn\commands\essentials\Speed;
use prisoncore\esh123unicorn\commands\essentials\Heal;
use prisoncore\esh123unicorn\commands\essentials\Feed;
use prisoncore\esh123unicorn\commands\essentials\Nightvision;
use prisoncore\esh123unicorn\commands\essentials\Strength;
use prisoncore\esh123unicorn\commands\essentials\Fly;
use prisoncore\esh123unicorn\commands\opcommands\Gmc;
use prisoncore\esh123unicorn\commands\opcommands\Gms;
use prisoncore\esh123unicorn\commands\opcommands\Gma;
use prisoncore\esh123unicorn\commands\opcommands\Gmspc;
use prisoncore\esh123unicorn\commands\normal\Day;
use prisoncore\esh123unicorn\commands\normal\Night;
use prisoncore\esh123unicorn\commands\normal\Hub;
use prisoncore\esh123unicorn\commands\normal\Spawn;
use prisoncore\esh123unicorn\commands\normal\Getyaw;
use prisoncore\esh123unicorn\commands\ui\Tutorial;
use prisoncore\esh123unicorn\commands\ui\Mines;
use prisoncore\esh123unicorn\commands\ui\Blackmarket;
use prisoncore\esh123unicorn\commands\ui\Rename;
use prisoncore\esh123unicorn\commands\ui\tags\Tags;
use prisoncore\esh123unicorn\commands\ui\staff\Ban;
use prisoncore\esh123unicorn\commands\ui\staff\Kick;
use prisoncore\esh123unicorn\commands\ui\staff\WhitelistRemove;
use prisoncore\esh123unicorn\commands\ui\staff\Mute;
use prisoncore\esh123unicorn\commands\ui\shop\Shop;
use prisoncore\esh123unicorn\commands\ui\Potions;
use prisoncore\esh123unicorn\commands\ui\Ceinfo;
use prisoncore\esh123unicorn\commands\ceremover\CeRemove;
use prisoncore\esh123unicorn\commands\help\Helppageone;
use prisoncore\esh123unicorn\commands\help\Helppagetwo;
use prisoncore\esh123unicorn\commands\cmd\Tinker;
use prisoncore\esh123unicorn\commands\ui\Kit;
use prisoncore\esh123unicorn\commands\ui\Xpfix;
use prisoncore\esh123unicorn\commands\ui\Nick;
use prisoncore\esh123unicorn\commands\combine\Combine;
use prisoncore\esh123unicorn\commands\rankup\RankUp;

use prisoncore\esh123unicorn\listener\breakEvent\PickaxeLevelUp;
use prisoncore\esh123unicorn\listener\breakEvent\GetKeysOnMine;
use prisoncore\esh123unicorn\listener\breakEvent\MiningExtras;
use prisoncore\esh123unicorn\listener\trampoline\TrampolineEffect;
use prisoncore\esh123unicorn\listener\creative\CustomItems;
use prisoncore\esh123unicorn\listener\discord\ServerToDiscord;

use pocketmine\utils\config;

//event
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\entity\ProjectileHitEntityEvent;
use pocketmine\event\entity\ProjectileLaunchEvent;
use pocketmine\event\entity\ProjectileHitEvent;
use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\player\PlayerExperienceChangeEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerChatEvent;
use prisoncore\esh123unicorn\listener\teleport\PvPPortal;

use pocketmine\world\particle\FloatingTextParticle;

//tasks
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\TaskScheduler;


//Tasks
use prisoncore\esh123unicorn\tasks\Updates;
use prisoncore\esh123unicorn\tasks\Broadcaster;
use prisoncore\esh123unicorn\tasks\BossSpawnTask;
use prisoncore\esh123unicorn\tasks\ScoreUpdateTask;
use prisoncore\esh123unicorn\tasks\TeleportPvPEvent;
use prisoncore\esh123unicorn\tasks\ServerRestart;
	
//pocketmine entities
use pocketmine\entity\Entity;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\entity\Zombie;

use prisoncore\esh123unicorn\entity\EntityForm;

//item
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\item\Armor;
use pocketmine\item\Tool;
use pocketmine\item\ItemFactory;

//sound
use pocketmine\world\sound\PopSound;
use pocketmine\world\sound\AnvilUseSound;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\network\mcpe\protocol\Sound;

//pocketmine
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use pocketmine\console\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\inventory\ShapedRecipe;
use pocketmine\utils\Utils;

//economy
use onebone\economyapi\EconomyAPI; //money not really going to be used
use onebone\tokenapi\TokenAPI; //used in replacement of coins
use onebone\mpapi\MpAPI; //magical power for wands

//form ui
use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;

//form gui
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\NBT;

//world
use pocketmine\world\World;
use pocketmine\world\WorldExpection;
use pocketmine\world\WorldProvider;
use pocketmine\world\ProviderManager;
use pocketmine\world\Position;

use pocketmine\lang\Language;
use pocketmine\lang\Translatable;

use prisoncore\esh123unicorn\entity\Plots;

//function 
use function time;
use function count;
use function floor;
use function microtime;
use function number_format;
use function round;
use function array_diff;
use function scandir;

use prisoncore\esh123unicorn\utils\Scoreboard;
use _64FF00\PurePerms\PurePerms;

use twisted\bettervoting\event\PlayerVoteEvent;

use prisoncore\esh123unicorn\listener\entity\EntityAttackEvent;
use prisoncore\esh123unicorn\entity\RegisterEntity;

class Main extends PluginBase implements Listener {
	
private const UNKNOWN_COMMAND = 'Command "{command}" doesn\'t exist!';
	
    /** @var ProviderInterface */
    private $provider;
	
    public $mute = [];
    public $mutetime;
	
    public $applecooldown = [];
	
    public $config;
	
    public $time;
	
    public $group;
    private $purePerms;
    private $rankUp;
    private $cooldown;
	
    public $playerFolder;
    public $banFolder;
    public $kickFolder;
    public $rankupFolder;
	
    public $prisonblock = "§l§6§k|8§r§3P§br§3i§bs§3o§bn§3B§bl§3o§bc§3k§bM§3C§bP§3E§6§k§l8|§r§c";
	
    /**
     * @var Main
     */
    public static Main $instance;
	
    /**
     * @var string
     */
    public static string $prefix;

    public function onEnable(): void {
	$this->saveDefaultConfig();
	$commands = $this->getConfig()->getAll();
	foreach ($commands as $commandName)
		 if(!$this->disableCommand($commandName))
		    $this->getLogger()->error(str_replace('{command}', $commandName, Main::UNKNOWN_COMMAND));
	//events
        $commandMap = $this->getServer()->getCommandMap();
	$eventMap = $this->getServer()->getPluginManager();
	    
        $eventMap->registerEvents($this, $this);
        $eventMap->registerEvents(new GetKeysOnMine($this), $this);
        $eventMap->registerEvents(new PickaxeLevelUp($this), $this);
        $eventMap->registerEvents(new MiningExtras($this), $this);
        $eventMap->registerEvents(new TrampolineEffect($this), $this);
        $eventMap->registerEvents(new PvPPortal($this), $this);
        $eventMap->registerEvents(new CustomItems($this), $this);
        $eventMap->registerEvents(new ServerToDiscord($this), $this);
	    
        //player commands
        $commandMap->register("essentials", new Jump("jump"));
        $commandMap->register("essentials", new Speed("speed"));
        $commandMap->register("essentials", new Heal("heal"));
        $commandMap->register("essentials", new Feed("feed"));
        $commandMap->register("essentials", new Nightvision("nv"));
        $commandMap->register("essentials", new Strength("strength"));
        //op player commands
        $commandMap->register("essentials", new Gmc("gmc"));
        $commandMap->register("essentials", new Gms("gms"));
        $commandMap->register("essentials", new Gma("gma"));
        $commandMap->register("essentials", new Gmspc("gmspc"));
        //commands
        $commandMap->register("essentials", new Day("day"));
        $commandMap->register("essentials", new Night("night"));
        $commandMap->register("essentials", new Hub("hub"));
        $commandMap->register("essentials", new Spawn("spawn"));
        $commandMap->register("essentials", new Getyaw("getyaw"));
        //uis
        $commandMap->register("essentials", new Tutorial("tutorial"));
        $commandMap->register("essentials", new Mines("mines"));
        $commandMap->register("essentials", new BlackMarket("bm"));
        $commandMap->register("essentials", new Rename("rename"));
        $commandMap->register("essentials", new Tags("tags"));
        $commandMap->register("essentials", new Ban("banui"));
        $commandMap->register("essentials", new Kick("kickui"));
        $commandMap->register("essentials", new WhitelistRemove("whitelist-remove"));
        $commandMap->register("essentials", new Mute("muteui"));
        $commandMap->register("essentials", new Shop("shop"));
        $commandMap->register("essentials", new Ceinfo("ceinfo"));
        $commandMap->register("essentials", new Potions("potions"));
	//ces
        $commandMap->register("essentials", new CeRemove("ce-remove"));
        $commandMap->register("essentials", new Combine("combine"));
	//guis
	//help
        $commandMap->register("essentials", new Helppageone("help-1"));
        $commandMap->register("essentials", new Helppagetwo("help-2"));
	//cmd
        $commandMap->register("essentials", new Tinker("tinker"));
        $commandMap->register("essentials", new Fly("fly"));
        $commandMap->register("essentials", new Xpfix("xpfix"));
        $commandMap->register("essentials", new Nick("nick"));   
        $commandMap->register("essentials", new Kit("kit"));
	    
        $commandMap->register("essentials", new RankUp("rankup"));
	    
	//tasks
	$this->getScheduler()->scheduleRepeatingTask(new Updates($this), 24000);
	$this->getScheduler()->scheduleRepeatingTask(new Broadcaster($this), 6000);
	$this->getScheduler()->scheduleRepeatingTask(new BossSpawnTask($this), 36000);
	$this->getScheduler()->scheduleRepeatingTask(new ScoreUpdateTask($this), 20 * 20);
	    
	        /*loader
		foreach(array_diff(scandir($this->getServer()->getDataPath() . "worlds"), ["..", "."]) as $levelName){
			$this->getServer()->getWorldManager()->loadWorld($levelName);
		}
	    	*/
	    
                if(!file_exists($this->playerFolder)) {
                   $this->playerFolder = $this->getDataFolder() . "Players/";
                   @mkdir($this->playerFolder, 0777, true);
	        }
	    
                if(!file_exists($this->banFolder)) {
                   $this->banFolder = $this->getDataFolder() . "Bans/";
                   @mkdir($this->banFolder, 0777, true);
	        }
	    
                if(!file_exists($this->kickFolder)) {
                   $this->kickFolder = $this->getDataFolder() . "Kicks/";
                   @mkdir($this->kickFolder, 0777, true);
	        }
	    
                if(!file_exists($this->rankupFolder)) {
                   $this->rankupFolder = $this->getDataFolder() . "RankUp/";
                   @mkdir($this->rankupFolder, 0777, true);
	        }
	    
	    	$this->getServer()->getNetwork()->setName($this->prisonblock); 
	    
	    $this->textParticles();
	    
            $this->getScheduler()->scheduleDelayedTask(new ClosureTask(function() : void{
	      	   $server = $this->getServer();
	           $language = $this->getServer()->getLanguage();
		   $this->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "spawnEntities");
	    }), 15);
	    
	   $DiscordLogger = new ServerToDiscord($this);
	   $DiscordLogger->ServerTurnOn();
    }
	
    /**
     * On plugin loading. (That's before enabling)
     */
    public function onLoad(): void
    {
        self::$instance = $this;
    }

    public static function getInstance(): self
    {
        return self::$instance;
    }
	
    public function onDisable(): void {
	   $server = $this->getServer();
	   $language = $this->getServer()->getLanguage();
           $this->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "despawnEntities");
	    
	   $DiscordLogger = new ServerToDiscord($this);
	   $DiscordLogger->ServerTurnOff();
    }
	
    public function getKit() {
	   return new Kit("kit", $this);
    }
	
   /**
   * @param Player $player
   */
    public function registerPlayer(Player $player): void{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->playerFolder . $lowercasename . ".yml", Config::YAML);
		if((!$config->exists("mined"))){
			$config->setAll(["player" => $player->getName(), "ip" => $player->getNetworkSession()->getIp(), "mined" => 0, "vote" => 0, "enchant" => null, "e-level" => 0]);
			$config->save();
		}
   }
	
   /**
   * @param Player $player
   * @return bool
   */
   public function playerExists(Player $player): bool{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->playerFolder . $lowercasename . ".yml", Config::YAML);
		return (($config->exists("player")) && ($config->exists("ip")) && ($config->exists("mined")) && ($config->exists("vote")) && ($config->exists("enchant")) && ($config->exists("e-level"))) ? true : false;
   }
	
    /**
    * @param Player $player
    * @return string
    */
    public function getMined(Player $player): int{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->playerFolder . $lowercasename . ".yml", Config::YAML);
		return (int) $config->get("mined");
    }
	
    public function getRank(Player $player): string{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->rankupFolder . $lowercasename . ".yml", Config::YAML);
		return $config->get("rank");
    }
	
    public function getNextRank(Player $player): string{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->rankupFolder . $lowercasename . ".yml", Config::YAML);
		return $config->get("nextrank");
    }
	
    public function getRankUpPrice(Player $player): int{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->rankupFolder . $lowercasename . ".yml", Config::YAML);
		return (int) $config->get("rankprice");
    }
	
    /**
    * @param Player $player
    * @return string
    */
    public function getIp(Player $player): int{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->playerFolder . $lowercasename . ".yml", Config::YAML);
		return (int) $config->get("ip");
    }
	
    /**
    * @param Player $player
    * @return string
    */
    public function getVote(Player $player): int{
	        $lowercasename = strtolower($player->getName());
		$config = new Config($this->playerFolder . $lowercasename . ".yml", Config::YAML);
		return (int) $config->get("vote");
    }
	
    //scoreboard addons
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
	
    /*public function onVote(PlayerVoteEvent $event) {
	    $player = $event->getPlayer();
	    $lowercasename = strtolower($player->getName());
	    $config = new Config($this->playerFolder . $lowercasename . ".yml", Config::YAML);
	    $config->set("vote", $this->getVote($player) + 1);
	    $config->save();
	    $player->getInventory()->addItem(Item::get(369, 0, 1)); //blaze rod
	    $player->getInventory()->addItem(Item::get(368, 0, 1)); //epearl
            EconomyAPI::getInstance()->addMoney($player, ("10000"));
            TokenAPI::getInstance()->addToken($player, ("10"));
	    $server = $this->getServer();
	    $language = $this->getServer()->getLanguage();
	    $this->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "key vote ". $player->getName() . " 3");
	    $player->sendMessage("§7(§a!§7) §7Thanks for voting on §bPrisonBlock§cMCPE §7by using §a/vote§3!");
	    $this->getServer()->broadcastMessage("§3 " . $player->getName() . " §aVoted§f using §3/vote§b! §aVote §fat §bhttps://minecraftpocket-servers.com/server/101993/§f & Get an extra §avote key§r");
    }*/
	
    public function textParticles() { 
	$manager = $this->getServer()->getWorldManager();
	$manager->getDefaultWorld()->addParticle(new Vector3(45.4, 80.0, 2.3), new FloatingTextParticle("", "§3Buycraft§c::§e mcpeprisonblock.buycraft.net"));
	$manager->getDefaultWorld()->addParticle(new Vector3(45.4, 81.0, 2.3), new FloatingTextParticle("", "§aVote§c::§b mcpe.guru/PrisonBlock"));
	$manager->getDefaultWorld()->addParticle(new Vector3(45.4, 82.0, 2.3), new FloatingTextParticle("", "§1Discord§c::§5 https://discord.gg/XCpEuaB"));
	$manager->getDefaultWorld()->addParticle(new Vector3(18.4, 86.0, 15.5), new FloatingTextParticle("§eDo §a/§btutorial for help§7", "§bWelcome §ato §3PrisonBlock§cMCPE§7"));
	$manager->getDefaultWorld()->addParticle(new Vector3(26.8, 87.5, 30.4), new FloatingTextParticle("", "§3Crates §aAnd §cEvents§7"));
	$manager->getDefaultWorld()->addParticle(new Vector3(32.5, 83.5, 15.0), new FloatingTextParticle("", "§bStores§7"));
	$manager->getDefaultWorld()->addParticle(new Vector3(31.4, 82.9, 9.4), new FloatingTextParticle("", "§cRules §aAnd §bInfo§7"));
	$manager->getDefaultWorld()->addParticle(new Vector3(24.5, 88.0, -9.0), new FloatingTextParticle("", "§bP§cv§bP §aup ahead"));
	$manager->loadWorld("PvP");
	$manager->getWorldByName("PvP")->addParticle(new Vector3(337.1, 156.8, 329.4), new FloatingTextParticle("", "§3Treasure Chests [10] minute refill time"));
    }
	
    public function setRank(Player $player) {
	$lowercasename = strtolower($player->getName());
	$config = new Config($this->rankupFolder . $lowercasename . ".yml", Config::YAML);
	$config->setAll([
		"player" => $player->getName(), 
		"rank" => "A", 
		"nextrank" => "B",
		"nextprice" => "10000"
	]);
	$config->save();
    }

    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer(); 
	$this->textParticles();
	if(!$this->playerExists($player)){
	    $this->getLogger()->info("Creating new player profile");
	    $this->getLogger()->info("Creating new player mining profile");
	    $this->getLogger()->info("Profile can be found plugin_data/PrisonBlockCore/data.". strtolower($player->getName()) .".yml");
	    $this->setRank($player);
	    $this->registerPlayer($player);
	}
	    
	//scoreboard
	$this->purePerms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
	//addons
	$online = count($this->getServer()->getOnlinePlayers());
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
	    
	if(!$event->getPlayer()->hasPlayedBefore()) {
	    $this->getServer()->broadcastMessage("§l§3Welcome to §7[§3P§br§3i§bs§3o§bn§3B§bl§3o§bc§3k§bM§3C§bP§3E§7] ". $player->getName() . $player->getId());
            $this->OpenJoinUI($player);
	    $player->sendMessage("§7(§a!§7) you recieved 3 mythic keys for joining for the first time");
	    $int = "3";
	    $server = $this->getServer();
	    $language = $this->getServer()->getLanguage();
	    $this->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), "key ". $player->getName() . " mythic " . $int);
	 }else{
	    $event->setJoinMessage(" ");
	    $this->OpenJoinUI($player);
	}
    }
	
    public function onPlayerKill(PlayerDeathEvent $event) {
		$player = $event->getPlayer();
		$cause = $player->getLastDamageCause();
		if ($cause instanceof EntityDamageByEntityEvent) {
			$damager = $cause->getDamager();
			if ($damager instanceof Player) {
				$damager->addXp($player->getXpDropAmount());
				$player->setCurrentTotalXp(0);
			}
		}
    }
	

    public function OpenJoinUI($player){
              $form = new SimpleForm(function (Player $player, int $data = null){
                if($data === null){
                   return true;
                }
			 switch($result){
                case 0:
                   $this->getServer()->dispatchCommand($player, "tutorial");
                break;
                case 1:
                   $this->getServer()->dispatchCommand($player, "mines");
                break;
                case 2:
                   $this->getServer()->dispatchCommand($player, "vote");
                break;
            }
	});
        $p = $player->getName();
        $form->setTitle("§a§l-=§bWelcome to the Server!§a=-");
        $form->setContent(("§7===========================\n§eWelcome ") .$p. ("\n\n§l§dShop§r §7:: https://mcpeprisonblock.buycraft.net/ \n\n§l§aVote §r§7:: https://mcpe.guru/PrisonBlock \n\n§b§lDiscord§r §7:: https://discord.gg/RpePmxY/n§7 \n===========================\n\n\n\n§bDo helpui for tutorial"));
        $form->addButton("§aTutorial \n §l§b➜§aTutorial UI");
        $form->addButton("§bM§3i§bn§3e§bs \n §l§b➜§aOpens PrisonsUI");
        $form->addButton("§dVoteUI \n §l§b➜§aVote UI");
        $form->addButton("§c§lEXIT");
        $form->sendToPlayer($player);
        return $form;
      }
	
      public function storeDataBlockBreak(BlockBreakEvent $event) {
	$player = $event->getPlayer();
	if($player instanceof Player){
	   $lowercasename = strtolower($player->getName());
	   $config = new Config($this->playerFolder . $lowercasename . ".yml", Config::YAML);
	   $config->set("mined", $this->getMined($player) + 1);
	   $config->save();
	   }
    }	
	
    public function onPrestige(Player $player) {
	        if($player->hasPermission("prestige1.use")) {
                   EconomyAPI::getInstance()->addMoney($player, ("300"));
		}
    }
	
	//spawn function
    public function onPlayerLogin(PlayerLoginEvent $event){
		$event->getPlayer()->teleport($this->getServer()->getWorldManager()->getWorldByName("world")->getSafeSpawn());
    }
    	
	//disable command function
    public function disableCommand(string $commandName): bool
    {
		$map = $this->getServer()->getCommandMap();
		$command = $map->getCommand($commandName);
		if($command === null)
			return false;
		$map->unregister($command);
		return true;
	}
    	//death function 
	public function onDeath(PlayerDeathEvent $event){
	$p = $event->getPlayer();
	$name = $p->getName();
	$ent = $event->getEntity();
	$cause = $ent->getLastDamageCause();
	if($cause instanceof EntityDamageByEntityEvent){
	$killer = $cause->getDamager();
       	$killer2 = $killer->getName();
	$weapon = $killer->getInventory()->getItemInHand()->getName();
        Server::getInstance()->broadcastMessage("§7(§c!§7) §e" . $name . "§c was killed by §e" . $killer2 . "§c using " . $weapon);
	}
	//event pt2
        if ($cause instanceof EntityDamageByEntityEvent) {
		$killer = $cause->getDamager();
                $inv = $killer->getInventory();
        	$killer2 = $killer->getName();
                $head = Item::get(397, 3, 1);
                $head->setCustomName("§e$name's Head");
                $inv->addItem($head);
                EconomyAPI::getInstance()->reduceMoney($name, ("50"));
                EconomyAPI::getInstance()->addMoney($killer2, ("50"));
		$killer->sendPopup("§7(§a!§7) §aYou killed $name and gained 50 mana");
		$p->sendPopup("§7(§c!§7) §cYou were killed by $killer2 and lost 50 mana");
	}
    }
	
    public function onMute(PlayerChatEvent $event) { 
	    $player = $event->getPlayer();
	    if(!isset($this->mute[$player->getName()])){
	       //chat normal
	    }elseif(time() < $this->mute[$player->getName()]){
	       $event->setCancelled();
	       $player->sendMessage("§7(§c!§7) §cYou are muted, you cannot speak.");
	    }
    }
	
    public function getMuteTime(): int{
	return (int) $this->mutetime;
    }
	
    public function eatGoldenApple(PlayerItemConsumeEvent $event) {
	    $item = $event->getItem();
	    $player = $event->getPlayer();
	    $enchantedgoldenapple = Item::get(466, 0, 1);
	    if($item->getId() == $enchantedgoldenapple->getId()) {
	       if(!isset($this->applecooldown[$player->getName()])){
	          $this->applecooldown[$player->getName()] = time() + 60;
	       } else {
	          if(time() < $this->applecooldown[$player->getName()]){
		     $event->setCancelled();
	             $seconds = ($this->applecooldown[$player->getName()] - time());
                     $player->sendTip("§7(§c!§7) §cYou have already consumed an enchanted golden apple, " . $seconds . " seconds remaining");																			
		  }
	       }
	    }
    }
	
    public function getStore(string $Store) {
	    $extra = new MiningExtras($this);
	    $key = new GetKeysOnMine($this);
	    $levelup = new PickaxeLevelUp($this);
	    if($Store == "extra") {
	       return $extra;
	    }elseif($Store == "keys") {
	       	    return $key;
	    }elseif($Store == "levelup") {
	       	    return $levelup;
	    }
    }
	
    public function onMiningRewards(BlockBreakEvent $event) {
            $player = $event->getPlayer();
	    $level = $player->getWorld();
	    if($level === $this->getServer()->getWorldManager()->getWorldByName("world") or $level == $this->getServer()->getWorldManager()->getWorldByName("bosses") or $level == $this->getServer()->getWorldManager()->getWorldByName("plots")) {
	       //do nothing
	 }else{
	    $this->getStore("extra")->onLevelBlockBreak($player);
	    $this->getStore("extra")->onPickaxeShardActivation($player);
	    $this->getStore("keys")->reward($player);
	    $this->getStore("levelup")->onBlockBreakLevelSytem($player);
	    $this->onPrestige($player);
	    }
    }
	
    public function setPlayerPrefix(Player $player, $prefix) { 
	$levelname = $player->getWorld()->getWorldManager()->getWorldByName();
	$purechat = $this->getServer()->getPluginManager()->getPlugin("PureChat");
	return $purechat->setPrefix($prefix, $player, $levelname);
    }
	
    public function setPlayerPermission(Player $player, $permission) { 
	$levelname = $this->getServer()->getWorldManager()->getWorldByName($player->getWorld());
	$purechat = $this->getServer()->getPluginManager()->getPlugin("PureChat");
	return $purechat->setPrefix($player, $permission, $levelname);
    }
}
