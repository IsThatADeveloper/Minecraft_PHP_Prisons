<?php

namespace prisoncore\esh123unicorn\listener\entity;

use prisoncore\esh123unicorn\Main;

use pocketmine\entity\Entity;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use prisoncore\esh123unicorn\entity\Plots;

class EntityAttackEvent implements Listener{
  
    private $plugin;
	
    public $permission;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
    public function getPlugin(){
	return $this->plugin;
    }

    public function onHitUpdateTagEvent(EntityDamageByEntityEvent $event) { 
	    $damager = $event->getDamager();
	    $entity = $event->getEntity();
	    //if($entity instanceof Plots) {
	    	if($damager instanceof Player) {
		   $damager->sendMessage("Hi");
		}
    }
}
