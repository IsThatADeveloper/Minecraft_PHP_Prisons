<?php

namespace prisoncore\esh123unicorn\commands\ui;

use prisoncore\esh123unicorn\Main;
use DaPigGuy\PiggyCustomEnchants\enchants\CustomEnchant;
use DaPigGuy\PiggyCustomEnchants\PiggyCustomEnchants;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\command\Command;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\world\sound\PopSound;
use onebone\tokenapi\TokenAPI;
use onebone\mpapi\MpAPI;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\inventory\Inventory;
use pocketmine\item\Armor;
use pocketmine\item\Tool;
use pocketmine\math\Vector3;

//sound
use pocketmine\world\sound\AnvilUseSound;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\network\mcpe\protocol\Sound;
use pocketmine\network\mcpe\protocol\LaunchSound;
use pocketmine\network\mcpe\protocol\GhastShootSound;
use pocketmine\network\mcpe\protocol\GhastSound;
use pocketmine\network\mcpe\protocol\GenericSound;
use pocketmine\network\mcpe\protocol\FizzSound;
use pocketmine\network\mcpe\protocol\EndermanTeleportSound;
use pocketmine\network\mcpe\protocol\DoorSound;
use pocketmine\network\mcpe\protocol\DoorCrashSound;
use pocketmine\network\mcpe\protocol\BumpSound;
use pocketmine\network\mcpe\protocol\ClickSound;
use pocketmine\network\mcpe\protocol\BlazeShootSound;
use pocketmine\network\mcpe\protocol\AnvilFallSound;

use pocketmine\utils\config;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Kit extends CommandBase{
    
    private $snowman = [];
    private $parkour = [];
    private $vote = [];
    private $archer = [];
    private $warrior = [];
    private $knight = [];
    private $samurai = [];
    private $hitman = [];
    private $kraken = [];
    private $ninja = [];
    private $god = [];
    private $smexy = [];
    private $youtuber = [];
    private $elf = [];
    private $halloween = [];
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("kit", "Opens Kit UI", "§4Use: §r/kits", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void {  
        $this->kitui($sender);
    }
    
    public function kitui(Player $player) {
		$form = new SimpleForm(function (Player $player, int $data = null){
		$result = $data;
		if($result === null){
			return true;
			}
			 switch($result){
                case 0:  
      		 if(!$player->hasPermission("kit.SnowMan")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->snowman[$player->getName()])){
	               $this->snowman[$player->getName()] = time() + 172800; //[172,800 second] [48 hours] [2 days] cool down to caim the kit
                       $this->snowman($player);
                       $this->effect($player);
	            } else {
	               if(time() < $this->snowman[$player->getName()]){
	               $minutes = ($this->snowman[$player->getName()] - time()) / 60;
	               $hours = ($this->snowman[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->snowman[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->snowman[$player->getName()]);																				
                   }
                }
                }
                break;
                case 1:         
      		 if(!$player->hasPermission("kit.Parkour")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->parkour[$player->getName()])){
	            $this->parkour[$player->getName()] = time() + 600; //[600 second] [10 minutes] [0 hours] [0 days] cool down to caim the kit
                    $this->parkour($player);
                    $this->effect($player);
	            } else {
	               if(time() < $this->parkour[$player->getName()]){
	               $minutes = ($this->parkour[$player->getName()] - time()) / 60;
	               $hours = ($this->parkour[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->parkour[$player->getName()] - time()) / 60 / 60 / 24;
                       $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($minutes)) . " §cminutes remaining");
	            } else {
	               unset($this->parkour[$player->getName()]);																				
                   }
                }
		}
                break;
                case 2:         
      		 if(!$player->hasPermission("kit.Vote")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->vote[$player->getName()])){
	            $this->vote[$player->getName()] = time() + 3600; //[3600 second] [10 minutes] [0 hours] [0 days] cool down to caim the kit
                    $this->vote($player);
                    $this->effect($player);
	            } else {
	               if(time() < $this->vote[$player->getName()]){
	               $minutes = ($this->vote[$player->getName()] - time()) / 60;
	               $hours = ($this->vote[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->vote[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($minutes)) . " §cminutes remaining");
	            } else {
	               unset($this->vote[$player->getName()]);																				
                   }
                }
                }
                break;
                case 3:         
      		 if(!$player->hasPermission("kit.Archer")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->archer[$player->getName()])){
	            $this->archer[$player->getName()] = time() + 14400; //[14400 second] [240 minutes] [4 hours] [0 days] cool down to caim the kit
                $this->archer($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->archer[$player->getName()]){
	               $minutes = ($this->archer[$player->getName()] - time()) / 60;
	               $hours = ($this->archer[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->archer[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->archer[$player->getName()]);																				
                   }
                }
                }
                break;
                case 4:         
      		 if(!$player->hasPermission("kit.Warrior")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->warrior[$player->getName()])){
	            $this->warrior[$player->getName()] = time() + 32400; //[32,400 second] [8 hours] [0 days] cool down to caim the kit
                $this->warrior($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->warrior[$player->getName()]){
	               $minutes = ($this->warrior[$player->getName()] - time()) / 60;
	               $hours = ($this->warrior[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->warrior[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->warrior[$player->getName()]);																				
                   }
                }
                }
                break;
                case 5:         
      		 if(!$player->hasPermission("kit.Knight")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->knight[$player->getName()])){
	            $this->knight[$player->getName()] = time() + 86400; //[86,400 second] [24 hours] [1 days] cool down to caim the kit
                $this->knight($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->knight[$player->getName()]){
	               $minutes = ($this->knight[$player->getName()] - time()) / 60;
	               $hours = ($this->knight[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->knight[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->knight[$player->getName()]);																				
                   }
                }
		}
                break;
                case 6:         
      		 if(!$player->hasPermission("kit.Samurai")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->samurai[$player->getName()])){
	            $this->samurai[$player->getName()] = time() + 234000; //[234,000 second] [65 hours] [2 days] cool down to caim the kit
                $this->samurai($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->samurai[$player->getName()]){
	               $minutes = ($this->samurai[$player->getName()] - time()) / 60;
	               $hours = ($this->samurai[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->samurai[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->samurai[$player->getName()]);																				
                   }
                }
                }
                break;
                case 7:         
      		 if(!$player->hasPermission("kit.Hitman")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->hitman[$player->getName()])){
	            $this->hitman[$player->getName()] = time() + 259200; //[259,200 second] [hours] [3 days] cool down to caim the kit
                $this->hitman($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->hitman[$player->getName()]){
	               $minutes = ($this->hitman[$player->getName()] - time()) / 60;
	               $hours = ($this->hitman[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->hitman[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->hitman[$player->getName()]);																				
                   }
                }
                }
                break;
                case 8:         
      		 if(!$player->hasPermission("kit.Kraken")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->kraken[$player->getName()])){
	            $this->kraken[$player->getName()] = time() + 277200; //[277,200 second] [5 hours] [3 days] cool down to caim the kit
                $this->kraken($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->kraken[$player->getName()]){
	               $minutes = ($this->kraken[$player->getName()] - time()) / 60;
	               $hours = ($this->kraken[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->kraken[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->kraken[$player->getName()]);																				
                   }
                }
                }
                break;
                case 9:         
      		 if(!$player->hasPermission("kit.Ninja")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->ninja[$player->getName()])){
	            $this->ninja[$player->getName()] = time() + 320400; //[320,400 second] [12 hours] [3 days] cool down to caim the kit
                $this->ninja($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->ninja[$player->getName()]){
	               $minutes = ($this->ninja[$player->getName()] - time()) / 60;
	               $hours = ($this->ninja[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->ninja[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->ninja[$player->getName()]);																				
                   }
                }
                }
                break;
                case 10:         
      		 if(!$player->hasPermission("kit.God")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->god[$player->getName()])){
	            $this->god[$player->getName()] = time() + 345600; //[345,600 second] [12 hours] [4 days] cool down to caim the kit
                $this->god($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->god[$player->getName()]){
	               $minutes = ($this->god[$player->getName()] - time()) / 60;
	               $hours = ($this->god[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->god[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->god[$player->getName()]);																				
                   }
                }
                }
                break;
                case 11:         
      		 if(!$player->hasPermission("kit.Smexy")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->smexy[$player->getName()])){
	            $this->smexy[$player->getName()] = time() + 432000; //[432,000 second] [12 hours] [5 days] cool down to caim the kit
                    $this->smexy($player);
                    $this->effect($player);
	            } else {
	               if(time() < $this->smexy[$player->getName()]){
	               $minutes = ($this->smexy[$player->getName()] - time()) / 60;
	               $hours = ($this->smexy[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->smexy[$player->getName()] - time()) / 60 / 60 / 24;
                       $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->smexy[$player->getName()]);																				
                   }
                }
                }
                break;
                case 12:         
      		 if(!$player->hasPermission("kit.Youtuber")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->youtuber[$player->getName()])){
	            $this->youtuber[$player->getName()] = time() + 172800; //[172,800 second] [12 hours] [5 days] cool down to caim the kit
                    $this->youtuber($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->youtuber[$player->getName()]){
	               $minutes = ($this->youtuber[$player->getName()] - time()) / 60;
	               $hours = ($this->youtuber[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->youtuber[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->youtuber[$player->getName()]);																				
                   }
                }
                }
                break;
                case 13:         
      		 if(!$player->hasPermission("kit.Elf")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->elf[$player->getName()])){
	            $this->elf[$player->getName()] = time() + 345600; //[345,600 second] [12 hours] [5 days] cool down to caim the kit
                $this->elf($player);
                   $this->effect($player);
	            } else {
	               if(time() < $this->elf[$player->getName()]){
	               $minutes = ($this->elf[$player->getName()] - time()) / 60;
	               $hours = ($this->elf[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->elf[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->elf[$player->getName()]);																				
                   }
                }
                }
                break;
                case 14:         
      		 if(!$player->hasPermission("kit.Halloween")){
	            $player->sendMessage("§7(§c!§7) §cYou dont have permission to use this kit");
	          }else{ 
	            if(!isset($this->halloween[$player->getName()])){
	            $this->halloween[$player->getName()] = time() + 36000; //[36000 second] [12 hours] [5 days] cool down to caim the kit
                    $this->halloween($player);
                    $this->effect($player);
	            } else {
	               if(time() < $this->halloween[$player->getName()]){
	               $minutes = ($this->halloween[$player->getName()] - time()) / 60;
	               $hours = ($this->halloween[$player->getName()] - time()) / 60 / 60;
	               $days = ($this->halloween[$player->getName()] - time()) / 60 / 60 / 24;
                   $player->sendTip("§7(§c!§7) §cCooldown §5" . (round($hours)) . " §chours remaining");
	            } else {
	               unset($this->halloween[$player->getName()]);
		       }
		    }
		}
                break;	
		}
	    });
            $form->setTitle("§l§a-=PrisonKits§l=-");
	    $form->setContent("");
		
	            $this->formTimer($player, $form, "kit.SnowMan", "§8[§r§c§k|§f|§r§cS§fn§co§fw§cM§fa§cn§r§k§f|§c|§r§8]§r", "snowman", $this->snowman);   
		    
	            $this->formMinuteTimer($player, $form, "kit.Parkour", "§8[§r§3Parkour§8]§r", "parkour", $this->parkour); 

	            $this->formTimer($player, $form, "kit.Vote", "§8[§r§l§a|§r§aV§2o§at§2e§aK§2i§at§k§l§a|§r§8]§r", "vote", $this->vote); 
		    
	            $this->formTimer($player, $form, "kit.Archer", "§8[§r§5Archer§8]§r", "archer", $this->archer);
		    
	            $this->formTimer($player, $form, "kit.Warrior", "§8[§r§1Warrior§8]§r", "warrior", $this->warrior);
	
	            $this->formTimer($player, $form, "kit.Knight", "§8[§r§eKnight§r§8]§r", "knight", $this->knight);
		    
	            $this->formTimer($player, $form, "kit.Samurai", "§8[§r§6§k|§5|§r§cSamurai§k§5|§6|§r§8]§r", "samurai", $this->samurai);
		
	            $this->formTimer($player, $form, "kit.Hitman", "§8[§r§5§k|§6|§r§cHitMan§k§6|§5|§r§8]§r", "hitman", $this->hitman);
		    
	            $this->formTimer($player, $form, "kit.Kraken", "§8[§r§1§l§k--§r§1Kraken§l§k--§r§8]§r", "kraken", $this->kraken);
		    
	            $this->formTimer($player, $form, "kit.Ninja", "§8[§r§5§k§l||§rNinja§k§5§l||§r§8]§r", "ninja", $this->ninja);
		
	            $this->formTimer($player, $form, "kit.God", "§8[§r§1§k8§a8§r§6God§a§k8§68§r§8]§r", "god", $this->god);
		
	            $this->formTimer($player, $form, "kit.Smexy", "§3§l[§r§5+§b§k§l|§e|§r§cSmexy§e§k§l|§b|§r§5+§r§3§l]§r", "smexy", $this->smexy);
		    
	            $this->formTimer($player, $form, "kit.Youtuber", "§f[§r§o§cYou§r§otuber§c]§r", "youtuber", $this->youtuber);
		    
	            $this->formTimer($player, $form, "kit.Elf", "§8[§r§cE§al§cf§8]§r", "elf", $this->elf);
		    
	            $this->formTimer($player, $form, "kit.Halloween", "§8[§r§6Halloween Kit§r§8]§r", "halloween", $this->halloween);
	    
            	    $form->sendToPlayer($player);
            	    return $form;
        }
	
	public function formTimer(Player $sender, $form, string $permission, $name, string $nbtTag, array $timer) {
	    if(!isset($timer[$sender->getName()])){
	       $form->addButton($sender->hasPermission($permission) === true ? "$name\n§aUNLOCKED" : "$name\n§cLOCKED");
	       }elseif(($timer[$sender->getName()] >= 0) and ($sender->hasPermission($permission))){
		    
		    
	                $days = $this->round_down((($timer[$sender->getName()] - time()) / 60 / 60 / 24), 0);
	                $hours = $this->round_down((($timer[$sender->getName()] - time()) / 60 / 60), 0);
		    
	                $day = round((($timer[$sender->getName()] - time()) / 60 / 60 / 24)); // 1=24h
	                $hour = round((($timer[$sender->getName()] - time()) / 60 / 60)); //1=60m
		    
	                $minutes = (round(($timer[$sender->getName()] - time()) / 60));
		    
		    	$h = (($day * 24) - $hour);
	                $m = (($hour * 60) - $minutes); //ex. 2 * 60 = 120 - 120
		    
		    	$mathForHours = (24 - $h);
		    	$mathForMinutes = (60 - $m);
		    
		        if($hours >= 24) {
		     	   $form->addButton("$name\n§3 " . $days . " §cDays§3 " . $mathForHours . " §cHours§3 ");
		        }elseif(24 >= $hours) {
		     	        $form->addButton("$name\n§3 " . $hours . " §cHours§3 " . $mathForMinutes . " §cMinutes");
		        }elseif($hours < 1 and 60 >= $minutes) {
		     	        $form->addButton("$name\n§3 " . $minutes . " §cMinutes");
			}
	    }
	}
		
	public function formMinuteTimer(Player $sender, $form, string $permission, $name, string $nbtTag, array $timer) {
	    if(!isset($timer[$sender->getName()])){
	       $form->addButton($sender->hasPermission($permission) === true ? "$name\n§aUNLOCKED" : "$name\n§cLOCKED");
	       }elseif(($timer[$sender->getName()] >= 0) and ($sender->hasPermission($permission))){
		    
	                $minutes = (round(($timer[$sender->getName()] - time()) / 60));
		    
			$form->addButton("$name\n§3 " . $minutes . " §cMinutes");
	    }
	}
	
        public function round_down($value, $precision) {       
            $value = (float)$value;
            $precision = (int)$precision;
            if ($precision < 0) {
                $precision = 0;
            }
            $decPointPosition = strpos($value, '.');
            if ($decPointPosition === false) {
                return $value;
            }
            return (float)(substr($value, 0, $decPointPosition + $precision + 1));       
        }
	
	public function snowman(Player $player) { 
		   	$player->sendMessage("§aYou were given §7[§r§c§k|§f|§r§cS§fn§co§fw§cM§fa§cn§r§k§f|§c|§r§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("§cS§fn§co§fw§cM§fa§cn§r_§cH§fe§ca§fd§r");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 5));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("§cS§fn§co§fw§cM§fa§cn§r_§cB§fo§cd§fy");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 5));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("§cS§fn§co§fw§cM§fa§cn§r_§cL§fe§cg§fg§ci§fn§cg§fs§f");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 5));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("§cS§fn§co§fw§cM§fa§cn§r_§cF§fe§ce§ft§f");
			$boots->addEnchantment(new EnchantmentInstance($protection, 5));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("§cS§fn§co§fw§cM§fa§cn§fs_§cI§fc§ci§fc§cl§fe§r");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 5));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("§cS§fn§co§fw§cM§fa§cn§r §cK§fi§ct§r");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("§cS§fn§co§fw§cM§fa§cn§r §cK§fi§ct§r");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("§cS§fn§co§fw§cM§fa§cn§r §cK§fi§ct§r");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 40);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 30);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
        public function parkour(Player $player) {
		   	$player->sendMessage("§aYou were given §7[§r§3Parkour§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(298, 0, 1);
			$helmet->setCustomName("Parkour Hat");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 1));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(299, 0, 1);
			$chestplate->setCustomName("Parkour Chest");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 1));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(300, 0, 1);
			$leggings->setCustomName("Parkour Pants");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 1));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(301, 0, 1);
			$boots->setCustomName("Parkour boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 1));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(268, 0, 1);
			$sword->setCustomName("Parkour_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 1));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(269, 0, 1);
			$pickaxe->setCustomName("Parkour_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 1));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(270, 0, 1);
			$axe->setCustomName("Parkour_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 1));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(271, 0, 1);
			$shovel->setCustomName("Parkour_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 1));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($shovel);
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 10);
			$player->getInventory()->addItem($apple);
	}
	
	public function vote(Player $player) {
		   	$player->sendMessage("§aYou were given §7[§r§aV§2o§at§2e§7]§r §akit!!§r");
		   	$player->sendMessage("§aWe would appreciate if you voted here :§b //minecraftpocket-servers.com/server/101993/");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(298, 0, 1);
			$helmet->setCustomName("Vote Hat");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 1));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(299, 0, 1);
			$chestplate->setCustomName("Vote Chest");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 1));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(300, 0, 1);
			$leggings->setCustomName("Vote Pant");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 1));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(301, 0, 1);
			$boots->setCustomName("Vote Shoes");
			$boots->addEnchantment(new EnchantmentInstance($protection, 1));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(268, 0, 1);
			$sword->setCustomName("Vote_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 1));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(269, 0, 1);
			$pickaxe->setCustomName("Vote_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 1));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(270, 0, 1);
			$axe->setCustomName("Vote_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 1));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(271, 0, 1);
			$shovel->setCustomName("Vote_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 1));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 10);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 1);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 1);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function archer(Player $player) {
			$player->sendMessage("§aYou were given §aYou were given §7[§r§5Archer§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(314, 0, 1);
			$helmet->setCustomName("Archer Hat");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 1));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(303, 0, 1);
			$chestplate->setCustomName("Archer Chest");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 1));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(316, 0, 1);
			$leggings->setCustomName("Archer Pants");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 1));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("Archer Shoes");
			$boots->addEnchantment(new EnchantmentInstance($protection, 1));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(272, 0, 1);
			$sword->setCustomName("Archer_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 1));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(275, 0, 1);
			$pickaxe->setCustomName("Archer_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 2));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(273, 0, 1);
			$axe->setCustomName("Archer_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 2));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(274, 0, 1);
			$shovel->setCustomName("Archer_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 2));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($shovel);
			//bow
			$bow = Item::get(261, 0, 1);
			$bow->setCustomName("Archer Bow");
			$player->getInventory()->addItem($bow);
			//- food
			//steak
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 10);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 3);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 1);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function warrior(Player $player) {
		   	$player->sendMessage("§aYou were given §7[§r§1Warrior§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(314, 0, 1);
			$helmet->setCustomName("§1Warrior Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 3));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(303, 0, 1);
			$chestplate->setCustomName("§1Warrior Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 3));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(316, 0, 1);
			$leggings->setCustomName("§1Warrior Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 3));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("§1Warrior Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 3));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 1));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(272, 0, 1);
			$sword->setCustomName("§1Warrior_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 3));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(275, 0, 1);
			$pickaxe->setCustomName("§1Warrior_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 3));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(273, 0, 1);
			$axe->setCustomName("§1Warrior_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 3));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(274, 0, 1);
			$shovel->setCustomName("§1Warrior_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 3));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 20);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 10);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 5);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 2);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function knight(Player $player) { 
		   	$player->sendMessage("§aYou were given §8[§r§eKnight§r§8]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("Knight Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 4));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(307, 0, 1);
			$chestplate->setCustomName("Knight Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 4));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(308, 0, 1);
			$leggings->setCustomName("Knight Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 4));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("Knight Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 4));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(267, 0, 1);
			$sword->setCustomName("Knight_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 5));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(256, 0, 1);
			$pickaxe->setCustomName("Knight_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(257, 0, 1);
			$axe->setCustomName("Knight_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(258, 0, 1);
			$shovel->setCustomName("Knight_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 10);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 2);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function samurai(Player $player) { 
		   	$player->sendMessage("§aYou were given §7[§r§6§k|§5|§r§cSamurai§k§5|§6|§r§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("Samurai Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 2));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("Samurai Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 2));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("Samurai Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 2));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("Samurai Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 2));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("Samurai_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 3));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("Samurai_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 3));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("Samurai_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 3));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("Samurai_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 3));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 30);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 15);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function hitman(Player $player) { 
		   	$player->sendMessage("§aYou were given §7[§r§5§k|§6|§r§cHitMan§k§6|§5|§r§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("HitMan Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 5));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("HitMan Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 5));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("HitMan Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 5));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("HitMan Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 5));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("HitMan_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 5));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("HitMan_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("HitMan_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("HitMan_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 32);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 38);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 25);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function kraken(Player $player) { 
		   	$player->sendMessage("§aYou were given §7[§r§1§l§k--§r§1Kraken§l§k--§r§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("HitMan Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 6));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("HitMan Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 6));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("HitMan Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 6));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("HitMan Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 6));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 8));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("HitMan_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 6));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("HitMan_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("HitMan_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("HitMan_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 64);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 45);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 32);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function ninja(Player $player) { 
		   	$player->sendMessage("§aYou were given §7[§r§5§k§l||§rNinja§k§5§l||§r§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("Ninja Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 7));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("Ninja Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 8));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("Ninja Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 10));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("Ninja Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 7));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("Ninja_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 7));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("Ninja_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 7));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("Ninja_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 7));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("Ninja_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 7));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 64);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 58);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 40);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function god(Player $player) { 
		   	$player->sendMessage("§aYou were given §7[§r§1§k8§a8§r§6God§a§k8§68§r§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("God Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 9));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 8));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("God Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 9));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 9));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("God Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 9));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 9));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("God Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 8));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 9));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("§5God_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 9));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 9));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("§5God_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 9));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 9));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("§5God_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 9));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 9));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("§5God_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 9));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 9));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 64);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 64);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 64);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 64);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
		
	public function smexy(Player $player) { 
		   	$player->sendMessage("§aYou were given §3§l[§r§5+§b§k§l|§e|§r§cSmexy§e§k§l|§b|§r§5+§r§3§l]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("§cSmexy Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 10));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 10));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("§cSmexy Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 10));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 10));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("§cSmexy Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 10));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 10));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("§cSmexy Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 10));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 10));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("§cSmexy_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 10));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 10));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("§cSmexy_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 10));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 10));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("§cSmexy_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 10));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 10));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("§cSmexy_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 10));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 10));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 64);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 64);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 64);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 64);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function youtuber(Player $player) { 
		   	$player->sendMessage("§aYou were given §f[§r§o§cYou§r§otuber§c]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("§o§cYou§r§otuber Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 6));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("§o§cYou§r§otuber Chestplate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 5));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("§o§cYou§r§otuber Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 5));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("§o§cYou§r§otuber Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 6));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("§o§cYou§r§otuber_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 6));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("§o§cYou§r§otuber_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("§o§cYou§r§otuber_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("§o§cYou§r§otuber_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 12);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 6);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function elf(Player $player) { 
		   	$player->sendMessage("§aYou were given §7[§r§cE§al§cf§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("§r§cE§al§cf §cH§ae§cl§am§r");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 3));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("§r§cE§al§cf §cC§ah§ce§as§ct§ap§cl§aa§ct§ae§r");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 6));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 5));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("§r§cE§al§cf §cL§ae§cg§ag§ci§an§cg§as");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 6));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 7));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("§r§cE§al§cf §cB§ao§co§at§cs§r");
			$boots->addEnchantment(new EnchantmentInstance($protection, 6));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 3));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("§r§cE§al§cf_§cK§ai§ct§r");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 6));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("§r§cE§al§cf_§cK§ai§ct§r");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("§r§cE§al§cf_§cK§ai§ct§r");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("§r§cE§al§cf_§cK§ai§ct§r");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 6));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 6));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 12);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 25);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function halloween(Player $player) { 
		   	$player->sendMessage("§aYou were given §7[§r§6Halloween Kit§r§7]§r §akit!!§r");
			//- enchants and ids
			$protection = Enchantment::getEnchantment(0);
			$sharpness = Enchantment::getEnchantment(9);
			$efficiency = Enchantment::getEnchantment(15);
			$silktouch = Enchantment::getEnchantment(16);
			$unbreaking = Enchantment::getEnchantment(17);
			//- armour and tools
			//helmet
			$helmet = Item::get(310, 0, 1);
			$helmet->setCustomName("§6Halloween Helmet");
			$helmet->addEnchantment(new EnchantmentInstance($protection, 8));
			$helmet->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($helmet);
			//chestplate
			$chestplate = Item::get(311, 0, 1);
			$chestplate->setCustomName("§6Halloween ChestPlate");
			$chestplate->addEnchantment(new EnchantmentInstance($protection, 8));
			$chestplate->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($chestplate);
			//leggings
			$leggings = Item::get(312, 0, 1);
			$leggings->setCustomName("§6Halloween Leggings");
			$leggings->addEnchantment(new EnchantmentInstance($protection, 8));
			$leggings->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($leggings);
			//boots
			$boots = Item::get(313, 0, 1);
			$boots->setCustomName("§6Halloween Boots");
			$boots->addEnchantment(new EnchantmentInstance($protection, 8));
			$boots->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($boots);
			//- tools
			//sword
			$sword = Item::get(276, 0, 1);
			$sword->setCustomName("§6Halloween_Kit");
			$sword->addEnchantment(new EnchantmentInstance($sharpness, 5));
			$sword->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($sword);
			//pickaxe
			$pickaxe = Item::get(278, 0, 1);
			$pickaxe->setCustomName("§6Halloween_Kit");
			$pickaxe->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$pickaxe->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($pickaxe);
			//axe
			$axe = Item::get(277, 0, 1);
			$axe->setCustomName("§6Halloween_Kit");
			$axe->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$axe->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($axe);	
			//shovel
			$shovel = Item::get(279, 0, 1);
			$shovel->setCustomName("§6Halloween_Kit");
			$shovel->addEnchantment(new EnchantmentInstance($efficiency, 5));
			$shovel->addEnchantment(new EnchantmentInstance($unbreaking, 4));
			$player->getInventory()->addItem($shovel);
			//- food
			//steak
			$steak = Item::get(364, 0, 10);
			$player->getInventory()->addItem($steak);
			//apple
			$apple = Item::get(260, 0, 32);
			$player->getInventory()->addItem($apple);
			//Golden apple
			$goldenapple = Item::get(322, 0, 12);
			$player->getInventory()->addItem($goldenapple);
			//enchanted golden apple
			$enchantedgoldenapple = Item::get(466, 0, 20);
			$player->getInventory()->addItem($enchantedgoldenapple);
	}
	
	public function effect(Player $player) {
            $speed = Effect::getEffect(Effect::SPEED);
            $time = 400;
            $amp = 1;
            $player->addEffect(new EffectInstance($speed,$time,$amp,true));
	}
}
