<?php

declare(strict_types = 1);

namespace prisoncore\esh123unicorn\messages;

use prisoncore\Main;
use pocketmine\utils\TextFormat;

interface Messages {

     const MESSAGE = [
        //staff
        "broadcastBan" => self::RED . "{player} {type} {target} for {reason}", 
        "messageBan" => self::RED . "You successfully {type} {target} for {reason}",
        "whitelist" => self::GREEN . "{type} {player} from whitelist",
        "muteTarget" => self::RED . "You have been muted for {time} minutes by {player}",
        "mutePlayer" => self::GREEN . "You successfully muted {target} for {time}",
        "unmuteTarget" => self::GREEN . "You are no longer muted",
        "unmutePlayer" => self::AQUA . "{target} has been unmuted",
        "userNotMuted" => self::YELLOW . "{target} is not muted",
    ];

    const RED = "§7(§c!§7)§r §c";

    const YELLOW = "§7(§e!§7)§r §c";
    
    const WHITE = "§7(§a!§7)§r §f";
    
    const GRAY = "§7(§8!§7)§r §7";

    const GREEN = "§7(§a!§7)§r §a";
    
    const AQUA = "§7(§3!§7)§r §3";
}
