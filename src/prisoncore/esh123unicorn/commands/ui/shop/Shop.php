<?php

namespace prisoncore\esh123unicorn\commands\ui\shop;

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
use prisoncore\esh123unicorn\commands\ui\shop\ShopStore;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Shop extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct("shop", "Opens shop UI", "§4Use: §r/shop", $aliases);
        $this->plugin = Main::getInstance();
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
    public function execute(CommandSender $sender, string $commandLabel, array $args): void{
      	$this->ShopPage($sender);
    }
    	
    public function ShopPage(Player $sender) {
    
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
	$this->ToolsPage($sender);
                break;
			    
            	case 1: 
	$this->ArmorPage($sender);
                break;

            	case 2: 
	$this->SpawnerPage($sender);
                break;
			    
            	case 3: 
	$this->GeneratorPage($sender);
                break;
			    
            	case 4: 
	$this->BlocksPage($sender);
                break;
			    
            	case 5: 
	$this->FoodPage($sender);
                break;
                
            	case 6: 
	$this->FarmingPage($sender);
                break;       
            }
            }
        );
        $form->setTitle("§a§l-=Shop=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Tools§7]");
	$form->addButton("§7[§8Armor§7]");
        $form->addButton("§7[§8Spawners§7]");
        $form->addButton("§7[§8Generators§7]");
        $form->addButton("§7[§8Blocks§7]");
        $form->addButton("§7[§8Food§7]");
        $form->addButton("§7[§8Farming§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }

	
    public function ToolsPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
	$this->SwordsPage($sender);
                break;
			    
            	case 1: 
	$this->PickaxesPage($sender);
                break;

            	case 2: 
	$this->AxesPage($sender);
                break;
			    
            	case 3: 
	$this->BowPage($sender);
                break;      
            }
            }
        );
        $form->setTitle("§a§l-=Tools=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Swords§7]");
	$form->addButton("§7[§8Pickaxes§7]");
        $form->addButton("§7[§8Axes§7]");
        $form->addButton("§7[§8Bows§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }

    public function ArmorPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->LetherArmorPage($sender);
                break;
			    
            	case 1: 
	$this->IronArmorPage($sender);
                break;
			    
            	case 2: 
	$this->GoldArmorPage($sender);
                break;  
			    
            	case 3: 
	$this->DiamondArmorPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Armor=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Lether§7]");
	$form->addButton("§7[§8Iron§7]");
        $form->addButton("§7[§8Gold§7]");
        $form->addButton("§7[§8Diamond§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
	
    public function SpawnerPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->ChickenSpawnerPage($sender);
                break;
			    
            	case 1: 
	$this->ZombieSpawnerPage($sender);
                break;
			    
            	case 2: 
	$this->CowSpawnerPage($sender);
                break;  
			    
            	case 3: 
	$this->BlazeSpawnerPage($sender);
                break;
			    
            	case 4: 
	$this->IronGolemSpawnerPage($sender);
                break;
			    
            	case 5: 
	$this->VindicatorSpawnerPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Spawners=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Chicken Spawner§7]");
	$form->addButton("§7[§8Zombie Spawner§7]");
        $form->addButton("§7[§8Cow Spawner§7]");
        $form->addButton("§7[§8Blaze Spawner§7]");
        $form->addButton("§7[§8Iron Golem Spawner§7]");
        $form->addButton("§7[§8Vindicator Spawner§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }

    public function GeneratorPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->CoalGenPage($sender);
                break;
			    
            	case 1: 
	$this->IronGenPage($sender);
                break;
			    
            	case 2: 
	$this->GoldGenPage($sender);
                break;  
			    
            	case 3: 
	$this->DiamondGenPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Generator=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§0Coal §8Generator§7]");
	$form->addButton("§7[§fIron §8Generator§7]");
        $form->addButton("§7[§6Gold §8Generator§7]");
        $form->addButton("§7[§bDiamond §8Generator§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//building ui part
    public function BlocksPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->BuildingPage($sender);
                break;
			    
            	case 1: 
	$this->DecorPage($sender);
                break;
			    
            	case 2: 
	$this->ConcretePage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Building=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Building§7]");
	$form->addButton("§7[§8Decor§7]");
        $form->addButton("§7[§8Concrete§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }

    public function FoodPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->EnchantedGoldenApplePage($sender);
                break;
			    
            	case 1: 
	$this->GoldenApplePage($sender);
                break;
			    
            	case 2: 
	$this->GoldenCarrotPage($sender);
                break;
			    
            	case 3: 
	$this->SteakPage($sender);
                break;
			    
            	case 4: 
	$this->PorkchopPage($sender);
                break;
			    
            	case 5: 
	$this->MuttonPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Food=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Enchanted Golden Apple§7]");
	$form->addButton("§7[§8Golden Apple§7]");
        $form->addButton("§7[§8Golden Carrot§7]");
        $form->addButton("§7[§8Steak§7]");
        $form->addButton("§7[§8Porkchop§7]");
        $form->addButton("§7[§8Mutton§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }

//Farming ui part
    public function FarmingPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->HoePage($sender);
                break;
			    
            	case 1: 
	$this->WheatSeedsPage($sender);
                break;
			    
            	case 2: 
	$this->SugarPage($sender);
                break;
			    
            	case 3: 
	$this->MelonSeedsPage($sender);
                break;
			    
            	case 4: 
	$this->PumpkinSeedsPage($sender);
                break;
			    
            	case 5: 
	$this->PotatoesPage($sender);
                break;
			    
            	case 6: 
	$this->CarrotsPage($sender);
                break;
			    
            	case 7: 
	$this->WaterPage($sender);
                break;
			    
            	case 8: 
	$this->LavaPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Food=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Stone Hoe§7]");
	$form->addButton("§7[§8Wheat Seeds§7]");
	$form->addButton("§7[§8Sugar Seeds§7]");
        $form->addButton("§7[§8Melon Seeds§7]");
        $form->addButton("§7[§8Pumpkin Seeds§7]");
        $form->addButton("§7[§8Potatoes§7]");
        $form->addButton("§7[§8Carrots§7]");
        $form->addButton("§7[§8Water§7]");
        $form->addButton("§7[§8Lava§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
	
//First, and Second UI's done
//tools page
//swords page
    public function SwordsPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->WoodSwordPage($sender);
                break;
			    
            	case 1: 
	$this->StoneSwordPage($sender);
                break;
			    
            	case 2: 
	$this->IronSwordPage($sender);
                break;
			    
            	case 3: 
	$this->DiamondSwordPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Swords=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Wooden Sword§7]");
	$form->addButton("§7[§8Stone Sword§7]");
        $form->addButton("§7[§8Iron Sword§7]");
        $form->addButton("§7[§8Diamond Sword§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
    //pickaxes
    public function PickaxesPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->WoodPickaxePage($sender);
                break;
			    
            	case 1: 
	$this->StonePickaxePage($sender);
                break;
			    
            	case 2: 
	$this->IronPickaxePage($sender);
                break;
			    
            	case 3: 
	$this->DiamondPickaxePage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Pickaxes=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Wooden Pickaxe§7]");
	$form->addButton("§7[§8Stone Pickaxe§7]");
        $form->addButton("§7[§8Iron Pickaxe§7]");
        $form->addButton("§7[§8Diamond Pickaxe§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
    //axes
    public function AxesPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->WoodAxePage($sender);
                break;
			    
            	case 1: 
	$this->StoneAxePage($sender);
                break;
			    
            	case 2: 
	$this->IronAxePage($sender);
                break;
			    
            	case 3: 
	$this->DiamondAxePage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Axes=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Wooden Axe§7]");
	$form->addButton("§7[§8Stone Axe§7]");
        $form->addButton("§7[§8Iron Axe§7]");
        $form->addButton("§7[§8Diamond Axe§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//bows
    public function DiamondPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->BowPage($sender);
                break;
			    
            	case 1: 
	$this->ArrowPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Bows=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Bow§7]");
	$form->addButton("§7[§8Arrows§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//Tools function 3rd ui finished
//Armor 3rd ui function
//Diamond armor
    public function DiamondArmorPage(CommandSender $sender)
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
	$this->DiamondHelmetPage($sender);
                break;
			    
            	case 1: 
	$this->DiamondChestplatePage($sender);
                break;
			    
            	case 2: 
	$this->DiamondLeggingsPage($sender);
                break;
			    
            	case 3: 
	$this->DiamondBootsPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=DiamondArmor=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Diamond Helmet§7]");
	$form->addButton("§7[§8Diamond Chestplate§7]");
        $form->addButton("§7[§8Diamond Leggings§7]");
	$form->addButton("§7[§8Diamond Boots§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//Iron Armor
    public function IronArmorPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->IronHelmetPage($sender);
                break;
			    
            	case 1: 
	$this->IronChestplatePage($sender);
                break;
			    
            	case 2: 
	$this->IronLeggingsPage($sender);
                break;
			    
            	case 3: 
	$this->IronBootsPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=IronArmor=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Iron Helmet§7]");
	$form->addButton("§7[§8Iron Chestplate§7]");
        $form->addButton("§7[§8Iron Leggings§7]");
	$form->addButton("§7[§8Iron Boots§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//Gold
    public function GoldArmorPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->GoldHelmetPage($sender);
                break;
			    
            	case 1: 
	$this->GoldChestplatePage($sender);
                break;
			    
            	case 2: 
	$this->GoldLeggingsPage($sender);
                break;
			    
            	case 3: 
	$this->GoldBootsPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=IronArmor=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Gold Helmet§7]");
	$form->addButton("§7[§8Gold Chestplate§7]");
        $form->addButton("§7[§8Gold Leggings§7]");
	$form->addButton("§7[§8Gold Boots§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//Lether
    public function LeatherArmorPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->LeatherHelmetPage($sender);
                break;
			    
            	case 1: 
	$this->LeatherChestplatePage($sender);
                break;
			    
            	case 2: 
	$this->LeatherLeggingsPage($sender);
                break;
			    
            	case 3: 
	$this->LeatherBootsPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=LeatherArmor=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Iron Helmet§7]");
	$form->addButton("§7[§8Iron Chestplate§7]");
        $form->addButton("§7[§8Iron Leggings§7]");
	$form->addButton("§7[§8Iron Boots§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//Armor 3rd ui page finished
//Blocks 3rd ui page
//Building
    public function BuildingPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
			    
            	case 0: 
	$this->StonePage($sender);
                break;
			    
            	case 1: 
	$this->OakLogsPage($sender);
                break;
			    
            	case 2: 
	$this->GlassPage($sender);
                break;
			    
            	case 3: 
	$this->SandstonePage($sender);
                break;
			    
            	case 4: 
	$this->StonebricksPage($sender);
                break;
			    
            	case 5: 
	$this->QuartzPage($sender);
                break;
			    
            	case 6: 
	$this->SnowPage($sender);
                break;
			    
            	case 7: 
	$this->StoneslabPage($sender);
                break;
			    
            	case 8: 
	$this->BookshelfPage($sender);
                break;
			    
            	case 9: 
	$this->BrickPage($sender);
                break;
			    
            	case 10: 
	$this->NetherbrickPage($sender);
                break;
			    
            	case 11: 
	$this->ObsidianPage($sender);
                break;
			    
            	case 12: 
	$this->EnderchestPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Building=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8Dirt§7]");
	$form->addButton("§7[§8Stone§7]");
        $form->addButton("§7[§8Glass§7]");
	$form->addButton("§7[§8Sand Stone§7]");
	$form->addButton("§7[§8Stone Bricks§7]");
	$form->addButton("§7[§8Quartz§7]");
	$form->addButton("§7[§8Snow§7]");
	$form->addButton("§7[§8Sand Slabs§7]");
	$form->addButton("§7[§8Book Shelfs§7]");
	$form->addButton("§7[§8Bricks§7]");
	$form->addButton("§7[§8Nether Bricks§7]");
	$form->addButton("§7[§8Obsidian§7]");
	$form->addButton("§7[§8Ender Chest§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//decor
    public function DecorPage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->WhiteWoolPage($sender);
                break;
			    
            	case 1: 
	$this->OrangeWoolPage($sender);
                break;
			    
            	case 2: 
	$this->MagentaWoolPage($sender);
                break;
			    
            	case 3: 
	$this->LightBlueWoolPage($sender);
                break;
			    
            	case 4: 
	$this->YellowWoolPage($sender);
                break;
			    
            	case 5: 
	$this->LimeWoolPage($sender);
                break;
			    
            	case 6: 
	$this->PinkWoolPage($sender);
                break;
			    
            	case 7: 
	$this->GrayWoolPage($sender);
                break;
			    
            	case 8: 
	$this->LightGrayWoolPage($sender);
                break;
			    
            	case 9: 
	$this->CyanWoolPage($sender);
                break;
			    
            	case 10: 
	$this->PurpleWoolPage($sender);
                break;
			    
            	case 11: 
	$this->BlueWoolPage($sender);
                break;
			    
            	case 12: 
	$this->BrownWoolPage($sender);
                break;
			    
            	case 13: 
	$this->GreenWoolPage($sender);
                break;
			    
            	case 14: 
	$this->RedWoolPage($sender);
                break;

            	case 15: 
	$this->BlackWoolPage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Decor=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8White Wool§7]");
	$form->addButton("§7[§8Orange Wool§7]");
        $form->addButton("§7[§8Magenta Wool§7]");
	$form->addButton("§7[§8Light Blue Wool§7]");
	$form->addButton("§7[§8Yellow Wool§7]");
	$form->addButton("§7[§8Lime Wool§7]");
	$form->addButton("§7[§8Pink Wool§7]");
	$form->addButton("§7[§8Gray Wool§7]");
	$form->addButton("§7[§8Cyan Wool§7]");
	$form->addButton("§7[§8Purple Wool§7]");
	$form->addButton("§7[§8Blue Wool§7]");
	$form->addButton("§7[§8Brown Wool§7]");
	$form->addButton("§7[§8Green Wool§7]");
	$form->addButton("§7[§8Red Wool§7]");
	$form->addButton("§7[§8Black Wool§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
//concrete
    public function ConcretePage(CommandSender $sender) {
        if(!($sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {    
            	case 0: 
	$this->WhiteConcretePage($sender);
                break;
			    
            	case 1: 
	$this->OrangeConcretePage($sender);
                break;
			    
            	case 2: 
	$this->MagentaConcretePage($sender);
                break;
			    
            	case 3: 
	$this->LightBlueConcretePage($sender);
                break;
			    
            	case 4: 
	$this->YellowConcretePage($sender);
                break;
			    
            	case 5: 
	$this->LimeConcretePage($sender);
                break;
			    
            	case 6: 
	$this->PinkConcretePage($sender);
                break;
			    
            	case 7: 
	$this->GrayConcretePage($sender);
                break;
			    
            	case 8: 
	$this->LightGrayConcretePage($sender);
                break;
			    
            	case 9: 
	$this->CyanConcretePage($sender);
                break;
			    
            	case 10: 
	$this->PurpleConcretePage($sender);
                break;
			    
            	case 11: 
	$this->BlueConcretePage($sender);
                break;
			    
            	case 12: 
	$this->BrownConcretePage($sender);
                break;
			    
            	case 13: 
	$this->GreenConcretePage($sender);
                break;
			    
            	case 14: 
	$this->RedConcretePage($sender);
                break;

            	case 15: 
	$this->BlackConcretePage($sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Decor=-");
	$form->setContent("§bCurrent Money§8:§a ". EconomyAPI::getInstance()->myMoney($sender));
        $form->addButton("§7[§8White Concrete§7]");
	$form->addButton("§7[§8Orange Concrete§7]");
        $form->addButton("§7[§8Magenta Concrete§7]");
	$form->addButton("§7[§8Light Blue Concrete§7]");
	$form->addButton("§7[§8Yellow Concrete§7]");
	$form->addButton("§7[§8Lime Concrete§7]");
	$form->addButton("§7[§8Pink Concrete§7]");
	$form->addButton("§7[§8Gray Concrete§7]");
	$form->addButton("§7[§8Cyan Concrete§7]");
	$form->addButton("§7[§8Purple Concrete§7]");
	$form->addButton("§7[§8Blue Concrete§7]");
	$form->addButton("§7[§8Brown Concrete§7]");
	$form->addButton("§7[§8Green Concrete§7]");
	$form->addButton("§7[§8Red Concrete§7]");
	$form->addButton("§7[§8Black Concrete§7]");
        $form->addButton("§cExit");
        $form->sendToPlayer($sender);
    }
	
//Tools
	
//Swords
    public function WoodSwordPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 268, 0, 250, "Wooden Sword");
    }
	
    public function StoneSwordPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 272, 0, 500, "Stone Sword");
    }
	
    public function IronSwordPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 267, 0, 1000, "Iron Sword");
    }
	
    public function DiamondSwordPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 276, 0, 2000, "Diamond Sword");
    }
	
//Pickaxes
	
    public function WoodPickaxePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 270, 0, 100, "Wooden Pickaxe");
    }
	
    public function StonePickaxePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 274, 0, 500, "Stone Pickaxe");
    }

    public function IronPickaxePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 257, 0, 1000, "Iron Pickaxe");
    }

    public function DiamondPickaxePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 278, 0, 2000, "Diamond Pickaxe");
    }

//Axe ui

    public function WoodAxePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 271, 0, 100, "Wooden Axe");
    }
	
    public function StoneAxePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 275, 0, 500, "Stone Pickaxe");
    }

    public function IronAxePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 258, 0, 1000, "Iron Pickaxe");
    }

    public function DiamondAxePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 279, 0, 2000, "Diamond Pickaxe");
    }
	
//Bow
    public function BowPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 261, 0, 2000, "Bow");
    }
	
//Arrows
    public function ArrowPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 262, 0, 20, "Arrow");
    }
	
//Armor
	
//Leather Armor

    public function LeatherHelmetPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 298, 0, 250, "Leather Hat");
    }
	
    public function LeatherChestplatePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 299, 0, 500, "Leather Chestplate");
    }
	
    public function LeatherLeggingsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 300, 0, 500, "Leather Leggings");
    }
	
    public function LeatherBootsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 301, 0, 250, "Leather Shoes");
    }

//Gold Armor
	
    public function GoldHelmetPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 314, 0, 500, "Gold Helmet");
    }
	
    public function GoldChestplatePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 315, 0, 550, "Gold Chestplate");
    }
	
    public function GoldLeggingsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 316, 0, 550, "Gold Leggings");
    }
	
    public function GoldBootsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 317, 0, 500, "Gold Boots");
    }
	
//Iron Armor
	
    public function IronHelmetPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 306, 0, 750, "Iron Helmet");
    }
	
    public function IronChestplatePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 307, 0, 1000, "Iron Chestplate");
    }
	
    public function IronLeggingsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 308, 0, 1000, "Iron Leggings");
    }
	
    public function IronBootsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 309, 0, 750, "Iron Boots");
    }

//Diamond Armor
	
    public function DiamondHelmetPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 310, 0, 1750, "Diamond Helmet");
    }
	
    public function DiamondChestplatePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 311, 0, 2000, "Diamond Chestplate");
    }
	
    public function DiamondLeggingsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 312, 0, 2000, "Diamond Leggings");
    }
	
    public function DiamondBootsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 313, 0, 1750, "Diamond Boots");
    }
	
//Spawners
	
    public function ChickenSpawnerPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "spawner chicken " . $sender->getName(), 200000, "Chicken Spawner");
    }
	
    public function ZombieSpawnerPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "spawner zombie " . $sender->getName(), 500000, "Zombie Spawner");
    }
	
    public function CowSpawnerPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "spawner cow " . $sender->getName(), 800000, "Cow Spawner");
    }
	
    public function BlazeSpawnerPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "spawner blaze " . $sender->getName(), 1000000, "Blaze Spawner");
    }
	
    public function IronGolemSpawnerPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "spawner irongolem " . $sender->getName(), 1200000, "Iron Golem Spawner");
    }
	
    public function VindicatorSpawnerPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "spawner vindicator " . $sender->getName(), 1400000, "Vindicator Spawner");
    }

//Generators UI
    public function CoalGenPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "coalgen " . $sender->getName() . " ", 300000, "Coal Generator");
    }
	
    public function IronGenPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "irongen " . $sender->getName() . " ", 900000, "Iron Generator");
    }
	
    public function GoldGenPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "goldgen " . $sender->getName() . " ", 2000000, "Gold Generator");
    }
	
    public function DiamondGenPage(CommandSender $sender) {
	  $this->getStore()->getCommandShop($sender, "diamondgen " . $sender->getName() . " ", 5000000, "Diamond Generator");
    }
	
	
//Building
    public function StonePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 1, 0, 100, "Stone");
    }
	
    public function OakLogsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 17, 0, 200, "Oak Log");
    }
	
    public function GlassPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 20, 0, 40, "Glass");
    }

    public function SandstonePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 24, 0, 300, "SandStone");
    }
	
    public function StonebricksPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 98, 0, 300, "Stone Bricks");
    }

    public function QuartzPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 155, 0, 500, "Quartz");
    }

    public function SnowPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 88, 0, 50, "Snow");
    }

    public function StoneslabPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 47, 0, 100, "Stone Slab");
    }

    public function BookshelfPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 44, 0, 400, "BookShelf");
    }
	
    public function BrickPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 45, 0, 200, "Brick");
    }

    public function NetherbricksPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 87, 0, 200, "Nether Brick");
    }

    public function ObsidianPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 49, 0, 1000, "Obsidian");
    }

    public function EnderchestPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 130, 0, 8500, "Ender Chest");
    }

//Decor
	
    public function WhiteWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 0, 60, "White Wool");
    }
	
    public function OrangeWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 1, 60, "Orange Wool");
    }

    public function MagentaWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 2, 60, "Magenta Wool");
    }

    public function LightBlueWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 3, 60, "Light Blue Wool");
    }
	
    public function YellowWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 4, 60, "Yellow Wool");
    }

    public function LimeWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 5, 60, "Lime Wool");
    }

    public function PinkWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 6, 60, "Pink Wool");
    }
	
    public function GrayWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 7, 60, "Magenta Wool");
    }

    public function LightGrayWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 8, 60, "Light Gray Wool");
    }

    public function CyanWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 9, 60, "Cyan Wool");
    }
	
    public function PurpleWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 10, 60, "Purple Wool");
    }

    public function BlueWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 11, 60, "Blue Wool");
    }
	
    public function BrownWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 12, 60, "Brown Wool");
    }
	
    public function GreenWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 13, 60, "Green Wool");
    }

    public function RedWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 14, 60, "Red Wool");
    }

    public function BlackWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 35, 15, 60, "Black Wool");
    }
	
//Concrete 
	
    public function WhiteConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 0, 150, "White Concrete");
    }
	
    public function OrangeConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 1, 150, "Orange Concrete");
    }

    public function MagentaConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 2, 150, "Magenta Concrete");
    }

    public function LightBlueConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 3, 150, "Light Blue Concrete");
    }
	
    public function YellowConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 4, 150, "Yellow Concrete");
    }

    public function LimeConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 5, 150, "Lime Concrete");
    }

    public function PinkConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 6, 150, "Pink Concrete");
    }
	
    public function GrayConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 7, 150, "Magenta Concrete");
    }

    public function LightConcreteWoolPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 8, 150, "Light Gray Concrete");
    }

    public function CyanConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 9, 150, "Cyan Concrete");
    }
	
    public function PurpleConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 10, 150, "Purple Concrete");
    }

    public function BlueConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 11, 150, "Blue Concrete");
    }
	
    public function BrownConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 12, 150, "Brown Concrete");
    }
	
    public function GreenConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 13, 150, "Green Concrete");
    }

    public function RedConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 14, 150, "Red Concrete");
    }

    public function BlackConcretePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 236, 15, 150, "Black Concrete");
    }
	
//Food
	
    public function EnchantedGoldenApplePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 466, 0, 20000, "Enchanted Golden Apple");
    }
	
    public function GoldenApplePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 322, 0, 10000, "Golden Apple");
    }

    public function GoldenCarrotPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 396, 0, 5000, "Golden Carrot");
    }
	
    public function SteakPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 364, 0, 10, "Steak");
    }
	
    public function PorkchopPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 320, 0, 20, "PorkChop");
    }
	
    public function MuttonPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 424, 0, 30, "Mutton");
    }
	
//Farming
	
    public function HoePage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 293, 0, 500, "Diamond Hoe");
    }
	
    public function WheatSeedsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 295, 0, 10, "Wheat Seed");
    }
	
    public function SugarPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 338, 0, 50, "Sugar");
    }
	
    public function MelonSeedsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 362, 0, 100, "Melon Seed");
    }
	
    public function PumpkinSeedsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 361, 0, 100, "Pumpkin Seed");
    }
	
    public function PotatoesPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 392, 0, 100, "Potato");
    }
	
    public function CarrotsPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 391, 0, 100, "Carrot");
    }
	
    public function WaterPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 8, 0, 500, "Water");
    }
	
    public function LavaPage(CommandSender $sender) {
	  $this->getStore()->getShop($sender, 10, 0, 500, "Lava");
    }

//6 Pages with openings
//ShopUI made by esh123unicorn
//1416 lines
}
