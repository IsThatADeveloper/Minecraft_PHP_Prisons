<?php

namespace prisoncore\esh123unicorn\commands\ui;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
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
use prisoncore\esh123unicorn\commands\ui\shop\ShopStore;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Potions extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("potions", "Opens potions shop", "§4Use: §r/potions", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
	
    public function getStore() { 
	    return new ShopStore($this->getPlugin());
    }
	
    //getShop(Player $player, int $id, int $meta, int $price, $name = null) {
    //$this->getStore()->getShop($player, id, meta, price, name);
	
//mainui part
    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
           $this->PotionPage($sender);
    }
  
    public function PotionPage(Player $sender) {
      $form = new SimpleForm(function (Player $sender, $data){
      if ($data === null) {
          return;
      }
      switch ($data) {
              case 0: 
      $this->Potions($sender);
              break;
              }
          }
      );
      $form->setTitle("§a§l-=PotionsShop=-");
      $form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
      $form->sendToPlayer($sender);
    }
  
    public function PotionsPage(CommandSender $sender)
    {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->LeapingPage($sender);
                break;
			    
            	case 1: 
	$this->SplashLeapingPage($sender);
                break;
			    
            	case 2: 
	$this->Speed1Page($sender);
                break;
			    
            	case 3: 
	$this->Speed2Page($sender);
                break;
			    
            	case 4: 
	$this->SplashSpeedPage($sender);
                break;
			    
            	case 5: 
	$this->Regeneration1Page($sender);
                break;
			    
            	case 6: 
	$this->Regeneration2Page($sender);
                break;
			    
            	case 7: 
	$this->SplashRegenerationPage($sender);
                break;
			    
            	case 8: 
	$this->Strength1Page($sender);
                break;
			    
            	case 9: 
	$this->Strength2Page($sender);
                break;
			    
            	case 10: 
	$this->SplashStrengthPage($sender);
                break;
			    
            	case 11: 
	$this->NightVision1Page($sender);
                break;	    

            	case 12: 
	$this->NightVision2Page($sender);
                break;	   
            }
            }
        );
        $form->setTitle("§a§l-=Potions=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§aPotion of Leaping §l§3I§r§7]");
	$form->addButton("§7[§aSplash Potion of Leaping §l§3I§r§7]");
        $form->addButton("§7[§bPotion of Speed §l§3I§r§7]");
        $form->addButton("§7[§bPotion of Speed §l§3II§r§7]");
        $form->addButton("§7[§bSplash Potion of Speed §l§3I§r§7]");
        $form->addButton("§7[§dPotion of Regeneration §l§3I§r§7]");
        $form->addButton("§7[§dPotion of Regeneration §l§3II§r§7]");
        $form->addButton("§7[§dSplash Potion of Regeneration §l§3I§r§7]");
        $form->addButton("§7[§cPotion of Strength §l§3I§r§7]");
        $form->addButton("§7[§cPotion of Strength §l§3II§r§7]");
        $form->addButton("§7[§cSplash Potion of Strength §l§3I§r§7]");
        $form->addButton("§7[§9Potion of Night Vision §l§3I§r§7]");
        $form->addButton("§7[§9Potion of Night Vision §l§3II§r§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
  
    public function LeapingPage(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 9, 1000, "Potion of Leaping");
    }
	
    public function Speed1Page(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 16, 1000, "Speed I Potion");
    }
	
    public function Speed2Page(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 14, 2000, "Speed II Potion");
    }

    public function SplashSpeedPage(CommandSender $sender) {
	$this->getStore()->getShop($player, 438, 14, 500, "Splash Potion Of Speed I");
    }
	
    public function Regeneration1Page(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 28, 1000, "Regeneration I Potion");
    }
	
    public function Regeneration2Page(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 30, 2000, "Regeneration II Potion");
    }

    public function SplashRegenerationPage(CommandSender $sender) {
	$this->getStore()->getShop($player, 438, 29, 500, "Splash Potion Of Regeneration I");
    }
	
    public function Strength1Page(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 31, 1000, "Strength I Potion");
    }
	
    public function Strength2Page(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 33, 2000, "Strength II Potion");
    }
	
    public function SplashStrengthPage(CommandSender $sender) {
	$this->getStore()->getShop($player, 438, 31, 500, "Splash Potion Of Strength I");
    }
	
    public function NightVision1Page(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 5, 1000, "Night Vision I Potion");
    }
	
    public function NightVision2Page(CommandSender $sender) {
	$this->getStore()->getShop($player, 373, 6, 2000, "Night Vision II Potion");
    }
}
