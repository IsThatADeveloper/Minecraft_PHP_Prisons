<?php

namespace prisoncore\esh123unicorn\commands\ui;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\item\Armor;
use pocketmine\item\Tool;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\world\sound\PopSound;
use onebone\tokenapi\TokenAPI;
use onebone\economyapi\EconomyAPI;
use pocketmine\world\sound\AnvilUseSound;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\event\player\PlayerJoinEvent;
use DaPigGuy\PiggyCustomEnchants\CustomEnchantManager;

use pocketmine\command\ConsoleCommandSender;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

use function ucwords;

class Blackmarket extends CommandBase{
	
    private $colour;
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("bm", "Opens blackmarket", "§4Use: §r/blackmarket", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
           $this->BlackmarketPage($sender);
				}
    	public function BlackmarketPage(Player $sender) {
    
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
	$this->CratekeyPage($sender);
                break;
			    
            	case 1: 
	$this->OpitemsPage($sender);
                break;
			    
            	case 2: 
	$this->BoostersPage($sender);
                break;
			    
            	case 3: 
	$this->CustomenchantsPage($sender);
                break;
                    
            }
            }
        );
        $form->setTitle("§0§lPrisonBlackMarket");
        $form->setContent("§8§lBlackMarket");
        $form->addButton("§7[§8CrateKeys§7]");
	$form->addButton("§7[§8OpItems§7]");
        $form->addButton("§7[§8Boosters§7]");
        $form->addButton("§7[§8CustomEnchants§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
	
    public function sendKey(Player $sender, string $key, int $price, int $amount, string $name) {
	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ($price)){
	   $command = ("key " . $sender->getName() . " " . $key . " " . $amount);
	   $server = $this->getPlugin()->getServer();
	   $language = $this->getPlugin()->getServer()->getLanguage();
	   $this->getPlugin()->getServer()->dispatchCommand(new ConsoleCommandSender($server, $language), $command);
	   $sender->sendMessage("§l§aYou purchased " . $this->colour . (ucwords($key)) . " §akey");
           TokenAPI::getInstance()->reduceToken($sender, ($price));
	} else {
	   $sender->sendMessage("§l§cYou do not have enough tokens to purchase " . $this->colour . (ucwords($name)) . " §ckey");
	}
    }
    
    public function CratekeyPage(CommandSender $sender):bool{
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
				case 0:
			$this->sendKey($sender, "common", 100, 1, "§bCommon");
				break;
				case 1:
			$this->sendKey($sender, "mythic", 200, 1, "§5Mythic");
				break;
				case 2:
			$this->sendKey($sender, "legendary", 400, 1, "§6Legendary");
				break;
				case 3:
			$this->sendKey($sender, "common", 450, 5, "§bCommon");
				break;
				case 4:
			$this->sendKey($sender, "mythic", 900, 5, "§5Mythic");
				break;
				case 5:
			$this->sendKey($sender, "legendary", 1150, 5, "§6Legendary");
				break;
			}
		});					
		$form->setTitle("§a§lCrateKey");
		$form->setContent("§bCurrent Tokens§8:§a". TokenAPI::getInstance()->myToken($sender));
		$form->addButton("§7[§bCommon§7]\n§aPrice: §7[§e100§7]: 1");
		$form->addButton("§7[§5Mythic§7]\n§aPrice: §7[§e200§7]: 1");
		$form->addButton("§7[§6Legendary§7]\n§aPrice: §7[§e40§7]: 1");
		$form->addButton("§7[§bCommon§7]\n§aPrice: §7[§e450§7]: 5");
		$form->addButton("§7[§5Mythic§7]\n§aPrice: §7[§e900§7]: 5");
		$form->addButton("§7[§6Legendary§7]\n§aPrice: §7[§e1150§7]: 5");
	        $form->addButton("§cExit");
		$form->sendToPlayer($sender);
            	return true;
    }
  
    public function OpitemsPage(CommandSender $sender):bool{
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
		case 0:
	if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("1700")){
		$unbreaking = Item::get(257, 0, 1);
		$unbreaking->setCustomName("Unbreaking Pickaxe");
		$enchant1 = Enchantment::getEnchantment(17);
		$unbreaking->addEnchantment(new EnchantmentInstance($enchant1, 5));
		$sender->getInventory()->addItem($unbreaking);
		$sender->sendMessage("§l§aYou purchased an §bUnbreakingEnchant");
		$sender->getWorld()->addSound(new AnvilUseSound($sender));
		TokenAPI::getInstance()->reduceToken($sender, ("1700"));
	     } else {
		$sender->sendMessage("§l§cYou do not have enough tokens to purchase an §bUnbreakingEnchant");
	     }
		break;
		case 1:
				if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("1600")){
					$efficency = Item::get(257, 0, 1);
			    		$efficency->setCustomName("Efficency Pickaxe");
			    		$enchant2 = Enchantment::getEnchantment(15);
			    		$efficency->addEnchantment(new EnchantmentInstance($enchant2, 2));
			    		$sender->getInventory()->addItem($efficency);
					$sender->sendMessage("§l§aYou purchased an §bEfficencyEnchant");
					$sender->getWorld()->addSound(new AnvilUseSound($sender));
					TokenAPI::getInstance()->reduceToken($sender, ("1600"));
				} else {
					$sender->sendMessage("§l§cYou do not have enough tokens to purchase an §bEfficencyEnchant");
				}
			break;
			case 2:
				if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("100")){
					$silktouch = Item::get(257, 0, 1);
			    		$silktouch->setCustomName("Silk Touch Pickaxe");
			    		$enchant3 = Enchantment::getEnchantment(16);
			    		$silktouch->addEnchantment(new EnchantmentInstance($enchant3, 1));
			    		$sender->getInventory()->addItem($silktouch);
					$sender->sendMessage("§l§aYou purchased a §5CE§bSilkTouchEnchant");
					$sender->getWorld()->addSound(new AnvilUseSound($sender));
					TokenAPI::getInstance()->reduceToken($sender, ("100"));
				} else {
					$sender->sendMessage("§l§cYou do not have enough tokens to purchase a §5CE§bSilkTouchEnchant");
				}
			break;
		}
	});					
	$form->setTitle("§a§lOpEnchants");
	$form->setContent("§bCurrent Tokens§8:§a". TokenAPI::getInstance()->myToken($sender).("\n\n§cMake sure to hold the item you want enchanted\n\n§aClick on any button bellow to select the enchant you want to purchase."));
	$form->addButton("§7[§8UnbreakingEnchant§7]\n§aPrice: §7[§e1700§7]");
	$form->addButton("§7[§8EfficencyEnchant§7]\n§aPrice: §7[§e1600§7]");
	$form->addButton("§7[§8SilkTouchEnchant§7]\n§aPrice: §7[§e100§7]");
        $form->addButton("§cExit");
	$form->sendToPlayer($sender);
        return true;
    }
	
    public function BoostersPage(CommandSender $sender):bool{
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
			case 0:
				if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("600")){
                            foreach ($this->getPlugin()->getServer()->getOnlinePlayers() as $p) {
				    	    $player = $sender->getName();
                                            $effect = new EffectInstance(Effect::getEffect(3), 36000, 1, false); //30 minutes
                                            $p->addEffect($effect);
                                              }
                                        $this->getPlugin()->getServer()->broadcastMessage($player . " §bhas bought a §ehaste §bbooster, everyone is effected with haste");    
					$sender->getWorld()->addSound(new AnvilUseSound($sender));
					TokenAPI::getInstance()->reduceToken($sender, ("600"));
				} else {
					$sender->sendMessage("§l§cYou do not have enough tokens to purchase this booster");
				}
			break;
			case 1:
				if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("600")){
                            foreach ($this->getPlugin()->getServer()->getOnlinePlayers() as $p) {
				    	    $player = $sender->getName();
                                            $effect = new EffectInstance(Effect::getEffect(16), 36000, 1, false); //30 minutes
                                            $p->addEffect($effect);
                                              }
                                        $this->getPlugin()->getServer()->broadcastMessage($player . " §bhas bought a §1night vision §bbooster, everyone is effected with night vision");    
					$sender->getWorld()->addSound(new AnvilUseSound($sender));
					TokenAPI::getInstance()->reduceToken($sender, ("600"));
				} else {
					$sender->sendMessage("§l§cYou do not have enough tokens to purchase this booster");
				}
			break;
			case 2:
				if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("800")){
                            foreach ($this->getPlugin()->getServer()->getOnlinePlayers() as $p) {
				    	    $player = $sender->getName();
                                            $effect = new EffectInstance(Effect::getEffect(21), 36000, 1, false); //30 minutes
                                            $effect = new EffectInstance(Effect::getEffect(22), 36000, 1, false); //30 minutes
                                            $p->addEffect($effect);
                                              }
                                        $this->getPlugin()->getServer()->broadcastMessage($player . " §bhas bought a §dhealth §bbooster");    
					$sender->getWorld()->addSound(new AnvilUseSound($sender));
					TokenAPI::getInstance()->reduceToken($sender, ("800"));
				} else {
					$sender->sendMessage("§l§cYou do not have enough tokens to purchase this booster");
				}
			break;
			case 3:
				if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("800")){
                            foreach ($this->getPlugin()->getServer()->getOnlinePlayers() as $p) {
				    	    $player = $sender->getName();
                                            $effect = new EffectInstance(Effect::getEffect(3), 36000, 1, false); //30 minutes
                                            $effect = new EffectInstance(Effect::getEffect(1), 36000, 1, false); //30 minutes
                                            $p->addEffect($effect);
                                              }
                                        $this->getPlugin()->getServer()->broadcastMessage($player . " §bhas bought a §emining §bbooster");    
					$sender->getWorld()->addSound(new AnvilUseSound($sender));
					TokenAPI::getInstance()->reduceToken($sender, ("800"));
				} else {
					$sender->sendMessage("§l§cYou do not have enough tokens to purchase this booster");
				}
			break;

		}
	});					
	$form->setTitle("§a§lBoosters");
	$form->setContent("§bCurrent Tokens§8:§a". TokenAPI::getInstance()->myToken($sender).("\n\n§cMake sure to click the button to purchase a booster. Each booster effects each player on the server for 30 minutes"));
	$form->addButton("§7[§eHaste §bBooster§7]\n§aPrice: §7[§e600§7]");
	$form->addButton("§7[§1Night Vision §bBooster§7]\n§aPrice: §7[§e500§7]");
	$form->addButton("§7[§dHealing §bBooster§7]\n§aPrice: §7[§e500§7]");
	$form->addButton("§7[§3Mining §bBooster§7]\n§aPrice: §7[§e800§7]");
        $form->addButton("§cExit");
	$form->sendToPlayer($sender);
        return true;
    }

    public function CustomEnchantsPage(CommandSender $sender):bool{
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
				case 0:
					if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("350")){
		 				$item = Item::get(340, 0, 1);
						$enchant = CustomEnchantManager::getEnchantmentByName("distract");
					        $item->addEnchantment(new EnchantmentInstance($enchant, 1));
						$sender->getInventory()->addItem($item);
						$sender->sendMessage("§l§aYou purchased a §5CE§bDistract I");
						TokenAPI::getInstance()->reduceToken($sender, ("550"));
					} else {
						$sender->sendMessage("§l§cYou do not have enough tokens to purchase §5CE§bDistract I");
					}
				break;
				case 1:
					if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("1150")){
		 				$item = Item::get(340, 0, 1);
						$enchant = CustomEnchantManager::getEnchantmentByName("lifesteal");
					        $item->addEnchantment(new EnchantmentInstance($enchant, 1));
						$sender->getInventory()->addItem($item);
						$sender->sendMessage("§l§aYou purchased a §5CE§bLifeSteal I");
						TokenAPI::getInstance()->reduceToken($sender, ("1150"));
					} else {
						$sender->sendMessage("§l§cYou do not have enough tokens to purchase §5CE§bLifeSteal I");
					}
				break;
				case 2:
					if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("1175")){
		 				$item = Item::get(340, 0, 1);
						$enchant = CustomEnchantManager::getEnchantmentByName("maxhealth");
					        $item->addEnchantment(new EnchantmentInstance($enchant, 1));
						$sender->getInventory()->addItem($item);
						$sender->sendMessage("§l§aYou purchased a §5CE§bMaxHealth I");
						TokenAPI::getInstance()->reduceToken($sender, ("1175"));
					} else {
						$sender->sendMessage("§l§cYou do not have enough tokens to purchase a §5CE§bMaxHealth I");
					}
				break;
				case 3:
					if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("1800")){
		 				$item = Item::get(340, 0, 1);
						$enchant = CustomEnchantManager::getEnchantmentByName("driller");
					        $item->addEnchantment(new EnchantmentInstance($enchant, 1));
						$sender->getInventory()->addItem($item);
						$sender->sendMessage("§l§aYou purchased a §5CE§bDriller I");
						TokenAPI::getInstance()->reduceToken($sender, ("1800"));
					} else {
						$sender->sendMessage("§l§cYou do not have enough tokens to purchase a §5CE§bDriller I");
					}
			    	break;
				case 4:
					if(\pocketmine\Server::getInstance()->getPluginManager()->getPlugin("TokenAPI")->myToken($sender) >= ("2200")){
		 				$item = Item::get(340, 0, 1);
						$enchant = CustomEnchantManager::getEnchantmentByName("luckyminer");
					        $item->addEnchantment(new EnchantmentInstance($enchant, 1));
						$sender->getInventory()->addItem($item);
						$sender->sendMessage("§l§aYou purchased a §5CE§bLuckyMiner I");
						TokenAPI::getInstance()->reduceToken($sender, ("2200"));
					} else {
						$sender->sendMessage("§l§cYou do not have enough tokens to purchase a §5CE§bLuckyMiner I");
					}
				break;
			}
		});					
		$form->setTitle("§a§lCustomEnchants");
		$form->setContent("§bCurrent Tokens§8:§a". TokenAPI::getInstance()->myToken($sender).("\n\n§cMake sure to hold the item you want enchanted\n\n§aClick on any button bellow to select the CE you want to purchase!"));
		$form->addButton("§7[§8CEDistract I§7]\n§aPrice: §7[§e350§7]");
		$form->addButton("§7[§8CELifeSteal I§7]\n§aPrice: §7[§e1150§7]");
		$form->addButton("§7[§8CEMaxHealth I§7]\n§aPrice: §7[§e1175§7]");
		$form->addButton("§7[§8CEDriller I§7]\n§aPrice: §7[§e1800§7]");
	  	$form->addButton("§7[§8CELuckyMiner I§7]\n§aPrice: §7[§e2200§7]");
    		$form->addButton("§cExit");
		$form->sendToPlayer($sender);
            	return true;
    }
}
