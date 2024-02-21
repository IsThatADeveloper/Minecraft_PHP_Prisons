<?php

namespace prisoncore\esh123unicorn\listener\discord;

use prisoncore\esh123unicorn\Main;

use CortexPE\DiscordWebhookAPI\Message;
use CortexPE\DiscordWebhookAPI\Webhook;
use CortexPE\DiscordWebhookAPI\Embed;

//event
use pocketmine\event\player\PlayerExperienceChangeEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

//tasks
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\TaskScheduler;

//pocketmine
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\math\Vector3;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;

//function 
use function time;
use function count;
use function floor;
use function microtime;
use function number_format;
use function round;

class ServerToDiscord implements Listener{
  
    private $plugin;
	
    private $message;
	
    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }
	
    public function getPlugin(){
	return $this->plugin;
    }
	
    public function SpeakEvent(PlayerCommandPreprocessEvent $event) {
	$sender = $event->getPlayer();
	$nametag = $sender->getNameTag();
	$name = $sender->getName();
	$this->ServerMessageSent($name . ": " . $event->getMessage());
    }

    public function ServerTurnOn() {
	$webHook = new Webhook("https://discord.com/api/webhooks/896850669208760331/VKUVqj4049AH1eAIOnUahC4m1BRe0eOlK0dyNmURurLassTzctBnhB4SWiv8vEdDYo1I"); //start logger
	$embed = new Embed();
	$msg = new Message();
	$msg->setUsername("PrisonBlockMCPE DiscordBot");
	$embed->setTitle("ServerOn Logger");
	$embed->setColor(0x13a315);
	$embed->setDescription("Server has been turned on");
	$msg->addEmbed($embed);		
	$webHook->send($msg);
    }
	
    public function ServerTurnOff() {
	$webHook = new Webhook("https://discord.com/api/webhooks/896851585517375489/Luo-JK_62KqRriSzUTXLRBTyYSgo6L4i4dWKqQrhAnW8TctQZJ327Lg1gQSP8-h-ijhX"); //close logger
	$embed = new Embed();
	$msg = new Message();
	$msg->setUsername("PrisonBlockMCPE DiscordBot");
	$embed->setTitle("ServerOff Logger");
	$embed->setColor(0x722626);
	$embed->setDescription("Server has been turned off");
	$msg->addEmbed($embed);		
	$webHook->send($msg);
    }
	
    public function ServerMessageSent(string $message) {
	$webHook = new Webhook("https://discord.com/api/webhooks/896851729033875506/ktM24GKgG7d3ckKIO2B8aVRe2cWcdJNPHueCXFNc2JBb0JhU-DPSdFxSLy_RUvhK7KYw"); //message logger
	$embed = new Embed();
	$msg = new Message();
	$msg->setUsername("PrisonBlockMCPE DiscordBot");
	$embed->setTitle("ServerMessage Logger");
	$embed->setColor(0xf1efef);
	$embed->setDescription($message);
	$msg->addEmbed($embed);		
	$webHook->send($msg);
    }
}
