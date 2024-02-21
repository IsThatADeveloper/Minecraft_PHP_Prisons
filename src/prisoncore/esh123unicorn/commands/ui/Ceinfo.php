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

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Ceinfo extends CommandBase{
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("ceinfo", "Opens ceinfo ui", "§4Use: §r/ceinfo", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }

    public function execute(CommandSender $Sender, string $commandLabel, array $args): void
    {
           $this->ToolPage($Sender);
    }
	
	
    public function ToolPage(Player $Sender) {
    
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->SwordPage($Sender);
                break;
			    
            	case 1: 
$this->ArmorPage($Sender);
                break;

            	case 2: 
$this->PickaxePage($Sender);
                break;       
            }
            }
        );
        $form->setTitle("§a§l-=CeInfo=-");
	$p = $Sender->getName();
	$form->setContent("§5Welcome to CeInfo§7: §b$p\n\nnselect below");
        $form->addButton("§7[§8Sword§7]");
	$form->addButton("§7[§8Armor§7]");
        $form->addButton("§7[§8Pickaxe§7]");
        $form->sendToPlayer($Sender);
    }
//sword ui part
    public function SwordPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {	    
            	case 0: 
$this->DeathBringerPage($Sender);
                break;
			    
            	case 1: 
$this->DistractPage($Sender);
                break;
			    
            	case 2: 
$this->FreezePage($Sender);
                break;	  
			    
            	case 3: 
$this->HealerPage($Sender);
                break;
			    
            	case 4: 
$this->LifestealPage($Sender);
		break;
			    
            	case 5: 
$this->VenomPage($Sender);
                break;
            }
            }
        );
        $form->setTitle("§a§l-=Swords=-");
	$form->setContent("§5Swords");
        $form->addButton("§7[§8DeathBringer§7]");
        $form->addButton("§7[§8Distract§7]");
        $form->addButton("§7[§8Freeze§7]");
        $form->addButton("§7[§8Healer§7]");
        $form->addButton("§7[§8LifeSteal§7]");
        $form->addButton("§7[§8Venom§7]");
        $form->sendToPlayer($Sender);
    }
    public function DeathBringerPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->SwordPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Destroyer=-");
	$form->setContent("§aType: §cSword\n\n§bBrings death closer to your enemy\n\n§3Max Level: §l§7[§r§e1§l§7]§r\n\n");
        $form->addButton("§7[§c§lEXIT§r §8To Swords§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function DistractPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->SwordPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Distract=-");
	$form->setContent("§aType: §cSword\n\n§bShows your enemy the future, causing a distraction\n\n§3Max Level: §l§7[§r§e1§l§7]§r\n\n");
        $form->addButton("§7[§c§lEXIT§r §8To Swords§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function HealerPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->SwordPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Healer=-");
	$form->setContent("§aType: §cSword\n\n§bConverts damage dealt into health\n\n§3Max Level: §l§7[§r§e1§l§7]§r\n\n");
        $form->addButton("§7[§c§lEXIT§r §8To Swords§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function LifestealPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->SwordPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=LifeSteal=-");
	$form->setContent("§aType: §cSword\n\n§bConverts enemies health to yours\n\n§3Max Level: §l§7[§r§e1§l§7]§r\n\n");
        $form->addButton("§7[§c§lEXIT§r §8To Swords§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function FreezePage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->SwordPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Freeze=-");
	$form->setContent("§aType: §cSword\n\n§bInflicts Freezing upon hitting enemies\n\n§3Max Level: §l§7[§r§e1§l§7]§r\n\n");
        $form->addButton("§7[§c§lEXIT§r §8To Swords§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function VenomPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->SwordPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Venom=-");
	$form->setContent("§aType: §cSword\n\n§bInflicts Poison upon hitting enemies\n\n§3Max Level: §l§7[§r§e1§l§7]§r\n\n");
        $form->addButton("§7[§c§lEXIT§r §8To Swords§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
//sword ui Finished
//armor ui
    public function ArmorPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->NinjaPage($Sender);
                break;

            	case 2: 
$this->SpeedPage($Sender);
                break;
			    
            	case 3: 
$this->MaxhealthPage($Sender);
                break;      
			    
            	case 4: 
$this->StrengthPage($Sender);
                break;    

            	case 5: 
$this->JumpPage($Sender);
                break;    
            }
            }
        );
        $form->setTitle("§a§l-=Armor=-");
	$form->setContent("§5Armor");
        $form->addButton("§7[§8Ninja§7]");
        $form->addButton("§7[§8Speed§7]");
        $form->addButton("§7[§8MaxHealth§7]");
        $form->addButton("§7[§8Strength§7]");
        $form->addButton("§7[§8Jump§7]");
        $form->sendToPlayer($Sender);
    }
    public function NinjaPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->ArmorPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Ninja=-");
	$form->setContent("§aType: §6Armor\n§bGain Speed and Absorption when low on health\n§3Max Level: §l§7[§r§e1§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Armor§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }	
    public function SpeedPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->ArmorPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Speed=-");
	$form->setContent("§aType: §6Armor\n§bGain speed when the ce is applied to your armor\n§3Max Level: §l§7[§r§e1§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Armor§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function MaxhealthPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->ArmorPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=MaxHealth=-");
	$form->setContent("§aType: §6Armor\n§bGives an extra heart when applied on armor\n§3Max Level: §l§7[§r§e1§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Armor§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }	
    public function StrengthPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->ArmorPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Strength=-");
	$form->setContent("§aType: §6Armor\n§bGives you more power to fight your enemy\n§3Max Level: §l§7[§r§e1§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Armor§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function JumpPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->ArmorPage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Jump=-");
	$form->setContent("§aType: §6Armor\n§bGain a small jump boost\n§3Max Level: §l§7[§r§e1§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Armor§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
//armor ui finished
//pickaxe ui
    public function PickaxePage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->DrillerPage($Sender);
                break;
			    
            	case 1: 
$this->QuickeningPage($Sender);
                break;

            	case 2: 
$this->LuckyminerPage($Sender);
                break;
		
            	case 6: 
$this->GoldRushPage($Sender);
                break;      
            }
            }
        );
        $form->setTitle("§a§l-=Pickaxe=-");
	$form->setContent("§5Picaxes");
        $form->addButton("§7[§8Driller§7]");
	$form->addButton("§7[§8Quickening§7]");
        $form->addButton("§7[§8LuckyMiner§7]");
        $form->addButton("§7[§8GoldRush§7]");
        $form->sendToPlayer($Sender);
    }
    public function DrillerPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->PickaxePage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Driller=-");
	$form->setContent("\n§aType: §ePickaxe\n§bBreaks mutiple on blockbreak\n§3Max Level: §l§7[§r§e1§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Pickaxes§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function QuickeningPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->PickaxePage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=Quickening=-");
	$form->setContent("\n§aType: §ePickaxe\n§bGain Haste while tool is held\n§3Max Level: §l§7[§r§e1§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Pickaxes§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function LuckyminerPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->PickaxePage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=LuckyMiner=-");
	$form->setContent("\n§aType: §ePickaxe\n§bLuckyMiner gives a chance get keys and loot from mining\n§3Max Level: §l§7[§r§e5§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Pickaxes§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
    public function GoldRushPage(CommandSender $Sender)
    {
        if(!($Sender instanceof Player)){
                return true;
            }
        $form = new SimpleForm(function (Player $Sender, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
            	case 0: 
$this->PickaxePage($Sender);
                break;  
            }
            }
        );
        $form->setTitle("§a§l-=GoldRush=-");
	$form->setContent("\n§aType: §ePickaxe\n§bA chance to get gold ore on block break\n§3Max Level: §l§7[§r§e1§l§7]§r");
        $form->addButton("§7[§c§lEXIT§r §8To Pickaxes§7]");
        $form->addButton("§7[§c§lEXIT§7]");
        $form->sendToPlayer($Sender);
    }
}
