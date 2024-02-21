<?php

namespace prisoncore\esh123unicorn\commands;

use prisoncore\esh123unicorn\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\KnownTranslationFactory;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;
use pocketmine\utils\TextFormat;

abstract class CommandBase extends Command implements PluginOwned {

  
    protected Main $plugin;

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

     /**
     * @return theSpawn
     */
    public function getOwningPlugin(): Plugin
    {
        return Main::getInstance();
    }
  
    /**
     * @param CommandSender|Player $s
     * @param string $commandLabel
     * @param array $args
     * @return void
     */
    abstract public function execute(CommandSender $sender, string $commandLabel, array $args): void;
  
    /**
     * @param CommandSender|Player $sender
     * @param bool $checkIsPlayer
     * @return bool
     */
    public function canUse(CommandSender|Player $sender, bool $checkIsPlayer = true): bool
    {
        $pl = $this->getOwningPlugin();

        if ($this->getPermission() !== null && !$this->testPermission($sender, $this->getPermission())) return false;

        if ($checkIsPlayer && $this->isPlayer($sender)) return true;

        if ($checkIsPlayer) {
            $sender->sendMessage(MsgMgr::getOnlyIGMsg());
        }

        return !$checkIsPlayer;
    }
  
    /**
     * @param CommandSender|Player|string $sender
     * @param bool $byPrefix
     * @return bool
     */
    public function isPlayer(CommandSender|Player|string $sender, bool $byPrefix = false): bool
    {
        if (!$byPrefix && ($player = $this->getOwningPlugin()->getServer()->getPlayerExact(!is_string($sender) ? $sender->getName() : $sender)) && $player->isOnline()) return true;

        if (($player = $this->getOwningPlugin()->getServer()->getPlayerByPrefix(!is_string($sender) ? $sender->getName() : $sender)) && $player->isOnline()) return true;

        return false;
    }

    /**
     * @param Player $player
     * @param string $permission
     * @param string $commandName
     * @return bool
     */
    public static function testPermissionX(Player $player, string $permission, string $commandName): bool
    {
        if (!$player->hasPermission($permission)) {
            $player->sendMessage(KnownTranslationFactory::pocketmine_command_error_permission($commandName)->prefix(TextFormat::RED));
            return false;
        }

        return true;
    }
}
    
