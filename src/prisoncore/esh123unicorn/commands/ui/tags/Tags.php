<?php

namespace prisoncore\esh123unicorn\commands\ui\tags;

use prisoncore\esh123unicorn\Main;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\level\sound\PopSound;
use prisoncore\esh123unicorn\commands\ui\tags\TagShop;

use prisoncore\esh123unicorn\commands\CommandBase;
use pocketmine\lang\Translatable;

class Tags extends CommandBase {
	
    protected Main $plugin;

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        $this->plugin = Main::getInstance();
        parent::__construct("tags", "Opens tags UI", "§4Use: §r/tags", $aliases);
    }

    public function getPlugin(){
	      return $this->plugin;
    }
		
    public function getStore() { 
	    return new TagShop($this->getPlugin());
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
           $this->OpenUI($sender);
				}
	
	public function OpenUI(Player $player){
        $form = new SimpleForm(function (Player $player, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:
	    $this->getStore()->setTag($player, "settag.permission.hacked", "§2§k;§r§a§l§m§o§2H§aA§2C§k§2§o;§r§2§l§oK§aE§2D§r§a§k§o§l:;§r");
                break;
                case 1:
	    $this->getStore()->setTag($player, "settag.permission.area51", "§7[§dArea§251§7]§r");
		break;
                case 2:
	    $this->getStore()->setTag($player, "settag.permission.area51", "§7[§dArea§251§7]§r");
                break;
                case 3:
	    $this->getStore()->setTag($player, "settag.permission.test", "§7[§cTest§7]§r");
                break;
                case 4:
	    $this->getStore()->setTag($player, "settag.permission.doge", "§o§l§6§k;§r§o§6D§fO§6G§fE§r§o§l§6§k;§r");
                break;
                case 5:
	    $this->getStore()->setTag($player, "settag.permission.unicorn", "§l§dU§fN§dI§fC§dO§fR§dN§r");
                break;
                case 6:
	    $this->getStore()->setTag($player, "settag.permission.bignoob", "§l§eb§r§eI§lg§r§bN§l§bo§r§bO§r§b§lb§r");
                break;
                case 7:
	    $this->getStore()->setTag($player, "settag.permission.nugget", "§o§bN§3u§l§bG§3g§r§o§be§3T§r");
                break;
                case 8:
	    $this->getStore()->setTag($player, "settag.permission.bob", "§o§l§1B§aO§1B§r");
                break;
                case 9:
	    $this->getStore()->setTag($player, "settag.permission.op", "§l§k§o::§r§4O§cP§k§o§l::§r");
                break;
                case 10:
	    $this->getStore()->setTag($player, "settag.permission.batman", "§o§l§0§k::§r§0§l§o§fb§5A§ft§5M§fa§5N§l§0§k::§r");
                break;
                case 11:
	    $this->getStore()->setTag($player, "settag.permission.meme", "§l§o§bM§6E§bM§6E§r");
                break;
                case 12:
	    $this->getStore()->setTag($player, "settag.permission.rich", "§l§k§a$§r§a$§fR§eI§fC§eH§a$§l§k§a$§r");
                break;
                case 13:
	    $this->getStore()->setTag($player, "settag.permission.blood", "§l§4B§0l§4o§0o§4d§r");
                break;
                case 14:
	    $this->getStore()->setTag($player, "settag.permission.weener", "§l§o§eWEENER§r");
                break;
                case 15:
	    $this->getStore()->setTag($player, "settag.permission.killer", "§l§4§k::§r§cKiLLeR§l§4§k::§r");
                break;
                case 16:
	    $this->getStore()->setTag($player, "settag.permission.dank", "§o§l§2DANK§r");
                break;
                case 17:
	    $this->getStore()->setTag($player, "settag.permission.gamer", "§1§l§oG§5a§1m§5e§1r");
                break;
                case 18:
	    $this->getStore()->setTag($player, "settag.permission.zombie", "§2Z§ao§2m§ab§2i§aE§r");
                break;
                case 19:
	    $this->getStore()->setTag($player, "settag.permission.prisoner", "§o§l§bP§fr§bi§fs§bo§fn§be§fr");
                break;
                case 20:
	    $this->getStore()->setTag($player, "settag.permission.notnice", "§k§c;;§r§o§4not§r§l§cNICE§k§c;;§r");
                break;
                case 21:
	    $this->getStore()->setTag($player, "settag.permission.poop", "§l§o§7P§8o§7O§8p§r");
                break;
                case 22:
	    $this->getStore()->setTag($player, "settag.permission.dealer", "§b^^§o§6DeAlEr§r§b^^§r");
                break;
                case 23:
	    $this->getStore()->setTag($player, "settag.permission.mrclean", "§cM§lr.§r§fC§ll§r§fe§la§r§fn§r");
                break;
                case 24:
	    $this->getStore()->setTag($player, "settag.permission.og", "§o§l§k§6;:§r§l§6O§fG§r§o§l§k§f;:§r");
                break;
                case 25;
	    $this->getStore()->setTag($player, "settag.permission.king", "§o§6§k::§r§l§fKING§o§k§6::§r");
                break;
                case 26:
	    $this->getStore()->setTag($player, "settag.permission.drab", "§o§4§k::§r§l§5DrAb§o§k§4::§r");
                break;
                case 27:
	    $this->getStore()->setTag($player, "settag.permission.kwel", "§l§o§3K§fe§3W§fl§r");
                break;
                case 28:
	    $this->getStore()->setTag($player, "settag.permission.egirl", "§l§o§dE§eG§kI§r§eR§kL§r§r");
                break;
                case 29:
	    $this->getStore()->setTag($player, "settag.permission.gucci", "§l§c§k§o:::§r§aG§0U§aC§0C§aI§r§k§l§o§c:::§r");
                break;
                case 30:
	    $this->getStore()->setTag($player, "settag.permission.thicc", "§o§k§e:§r§l§o§aT§bH§aI§bC§aC§r§o§k§e:§r");
                break;
                case 31:
	    $this->getStore()->setTag($player, "settag.permission.derp", "§l§f§o§k:§r§d§ldErP§l§f§o§k:§r");
                break;
                case 32:
	    $this->getStore()->setTag($player, "settag.permission.bear", "§o§l§6Bear§r");
                break;
                case 33:
	    $this->getStore()->setTag($player, "settag.permission.pvpgod", "§l§c§oPVP§r§k§b::§r§l§0God");
                break;                
		case 34:
	    $this->getStore()->setTag($player, "settag.permission.krakenoncrack", "§l§k§b§o::§r§l§o§1Kraken§bOn§1Crack§l§k§b§o::§r");
                break;                
                case 35:
	    $this->getStore()->setTag($player, "settag.permission.pegod", "§l§k§b::§r§o§4PE§0God§l§k§b::§r");
                break;
		case 36:
	    $this->getStore()->setTag($player, "settag.permission.mysterious", "§l§5M§6y§5s§6t§5e§6r§5i§6o§5u§6s§r");
                break;                
                case 37:
	    $this->getStore()->setTag($player, "settag.permission.imissher", "§l§4§o§lIMissHer§r");
                break;
		case 38:
	    $this->getStore()->setTag($player, "settag.permission.jinchuuriki", "§k§b;§r§l§c§ojinchuuriki§r§k§b;§r");
	 	break;
                case 39:
	    $this->getStore()->setTag($player, "settag.permission.vibey", "§l§o§5V§di§5B§de§5Y");
                break;
                case 40:
	    $this->getStore()->setTag($player, "settag.permission.llamallucas", "§eLLama§6LLucas");
                break;
                case 41:
	    $this->getStore()->setTag($player, "settag.permission.eggrolls", "§l§k§e;§r§l§6EGGROLLS§e§k;§r");
                break;
                case 42:
	    $this->getStore()->setTag($player, "settag.permission.exotic", "§6Exo§ftic");
                break;
                case 43:
            $player->sendMessage("§aTags closed");
                break;
            }
	});
        $form->setTitle("§l-=§aTagsUI§r§l=-");
	$form->setContent("Choose a tag to use");
	$form->addButton($player->hasPermission("settag.permission.hacked") === true ? ("§2§k;§r§a§l§m§o§2H§aA§2C§k§2§o;§r§2§l§oK§aE§2D§r§a§k§o§l:;§r") . "\n§aAVAILABLE" : ("§2§k;§r§a§l§m§o§2H§aA§2C§k§2§o;§r§2§l§oK§aE§2D§r§a§k§o§l:;§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.area51") === true ? ("§7[§dArea§251§7]§r") . "\n§aAVAILABLE" : ("§7[§dArea§251§7]§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.supervisor") === true ? ("§9§lSuPERvIsOr§r") . "\n§aAVAILABLE" : ("§9§lSuPERvIsOr§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.test") === true ? ("§7[§cTest§7]§r") . "\n§aAVAILABLE" : ("§7[§cTest§7]§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.doge") === true ? ("§o§l§6§k;§r§o§6D§fO§6G§fE§r§o§l§6§k;§r") . "\n§aAVAILABLE" : ("§o§l§6§k;§r§o§6D§fO§6G§fE§r§o§l§6§k;§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.unicorn") === true ? ("§l§dU§fN§dI§fC§dO§fR§dN§r") . "\n§aAVAILABLE" : ("§l§dU§fN§dI§fC§dO§fR§dN§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.bignoob") === true ? ("§l§eb§r§eI§lg§r§bN§l§bo§r§bO§r§b§lb§r") . "\n§aAVAILABLE" : ("§l§eb§r§eI§lg§r§bN§l§bo§r§bO§r§b§lb§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.nugget") === true ? ("§o§bN§3u§l§bG§3g§r§o§be§3T§r") . "\n§aAVAILABLE" : ("§o§bN§3u§l§bG§3g§r§o§be§3T§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.bob") === true ? ("§o§l§1B§aO§1B§r") . "\n§aAVAILABLE" : ("§o§l§1B§aO§1B§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.op") === true ? ("§l§k§o::§r§4O§cP§k§o§l::§r") . "\n§aAVAILABLE" : ("§l§k§o::§r§4O§cP§k§o§l::§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.batman") === true ? ("§o§l§0§k::§r§0§l§o§fb§5A§ft§5M§fa§5N§l§0§k::§r") . "\n§aAVAILABLE" : ("§o§l§0§k::§r§0§l§o§fb§5A§ft§5M§fa§5N§l§0§k::§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.meme") === true ? ("§l§o§bM§6E§bM§6E§r") . "\n§aAVAILABLE" : ("§l§o§bM§6E§bM§6E§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.rich") === true ? ("§l§k§a;§r§a:§fR§eI§fC§eH§a:§l§k§a;§r") . "\n§aAVAILABLE" : ("§l§k§a;§r§a:§fR§eI§fC§eH§a:§l§k§a;§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.blood") === true ? ("§l§4B§0l§4o§0o§4d§r") . "\n§aAVAILABLE" : ("§l§4B§0l§4o§0o§4d§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.weener") === true ? ("§l§o§eWEENER§r") . "\n§aAVAILABLE" : ("§l§o§eWEENER§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.killer") === true ? ("§l§4§k::§r§cKiLLeR§l§4§k::§r") . "\n§aAVAILABLE" : ("§l§4§k::§r§cKiLLeR§l§4§k::§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.dank") === true ? ("§o§l§2DANK§r") . "\n§aAVAILABLE" : ("§o§l§2DANK§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.gamer") === true ? ("§1§l§oG§5a§1m§5e§1r") . "\n§aAVAILABLE" : ("§1§l§oG§5a§1m§5e§1r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.zombie") === true ? ("§2Z§ao§2m§ab§2i§aE§r") . "\n§aAVAILABLE" : ("§2Z§ao§2m§ab§2i§aE§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.prisoner") === true ? ("§o§l§bP§fr§bi§fs§bo§fn§be§fr") . "\n§aAVAILABLE" : ("§o§l§bP§fr§bi§fs§bo§fn§be§fr") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.notnice") === true ? ("§k§c;;§r§o§4not§r§l§cNICE§k§c;;§r") . "\n§aAVAILABLE" : ("§k§c;;§r§o§4not§r§l§cNICE§k§c;;§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.poop") === true ? ("§l§o§7P§8o§7O§8p§r") . "\n§aAVAILABLE" : ("§l§o§7P§8o§7O§8p§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.dealer") === true ? ("§b^^§o§6DeAlEr§r§b^^§r") . "\n§aAVAILABLE" : ("§b^^§o§6DeAlEr§r§b^^§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.mrclean") === true ? ("§cM§lr.§r§fC§ll§r§fe§la§r§fn§r") . "\n§aAVAILABLE" : ("§cM§lr.§r§fC§ll§r§fe§la§r§fn§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.og") === true ? ("§o§l§k§6;:§r§l§6O§fG§r§o§l§k§f;:§r") . "\n§aAVAILABLE" : ("§o§l§k§6;:§r§l§6O§fG§r§o§l§k§f;:§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.king") === true ? ("§o§6§k::§r§l§fKING§o§k§6::§r") . "\n§aAVAILABLE" : ("§o§6§k::§r§l§fKING§o§k§6::§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.drab") === true ? ("§o§4§k::§r§l§5DrAb§o§k§4::§r") . "\n§aAVAILABLE" : ("§o§4§k::§r§l§5DrAb§o§k§4::§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.kwel") === true ? ("§l§o§3K§fe§3W§fl§r") . "\n§aAVAILABLE" : ("§l§o§3K§fe§3W§fl§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.egirl") === true ? ("§l§o§dE§eG§kI§r§eR§kL§r§r") . "\n§aAVAILABLE" : ("§l§o§dE§eG§kI§r§eR§kL§r§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.gucci") === true ? ("§l§c§k§o:::§r§aG§0U§aC§0C§aI§r§k§l§o§c:::§r") . "\n§aAVAILABLE" : ("§l§c§k§o:::§r§aG§0U§aC§0C§aI§r§k§l§o§c:::§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.thicc") === true ? ("§o§k§e:§r§l§o§aT§bH§aI§bC§aC§r§o§k§e:§r") . "\n§aAVAILABLE" : ("§o§k§e:§r§l§o§aT§bH§aI§bC§aC§r§o§k§e:§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.derp") === true ? ("§l§f§o§k:§r§d§ldErP§l§f§o§k:§r") . "\n§aAVAILABLE" : ("§l§f§o§k:§r§d§ldErP§l§f§o§k:§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.bear") === true ? ("§o§l§6Bear§r") . "\n§aAVAILABLE" : ("§o§l§6Bear§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.pvpgod") === true ? ("§l§c§oPVP§r§k§b::§r§l§0God") . "\n§aAVAILABLE" : ("§l§c§oPVP§r§k§b::§r§l§0God") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.krakenoncrack") === true ? ("§l§k§b§o::§r§l§o§1Kraken§bOn§1Crack§l§k§b§o::§r") . "\n§aAVAILABLE" : ("§l§k§b§o::§r§l§o§1Kraken§bOn§1Crack§l§k§b§o::§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.pegod") === true ? ("§l§k§b::§r§o§4PE§0God§l§k§b::§r") . "\n§aAVAILABLE" : ("§l§k§b::§r§o§4PE§0God§l§k§b::§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.mysterious") === true ? ("§l§5M§6y§5s§6t§5e§6r§5i§6o§5u§6s§r") . "\n§aAVAILABLE" : ("§l§5M§6y§5s§6t§5e§6r§5i§6o§5u§6s§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.imissher") === true ? ("§l§4§o§lIMissHer§r") . "\n§aAVAILABLE" : ("§l§4§o§lIMissHer§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.jinchuuriki") === true ? ("§k§b;§r§l§c§ojinchuuriki§r§k§b;§r") . "\n§aAVAILABLE" : ("§k§b;§r§l§c§ojinchuuriki§r§k§b;§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.vibey") === true ? ("§l§o§5V§di§5B§de§5Y") . "\n§aAVAILABLE" : ("§l§o§5V§di§5B§de§5Y") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.llamallucas") === true ? ("§eLLama§6LLucas") . "\n§aAVAILABLE" : ("§eLLama§6LLucas") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.eggrolls") === true ? ("§l§k§e;§r§l§6EGGROLLS§e§k;§r") . "\n§aAVAILABLE" : ("§l§k§e;§r§l§6EGGROLLS§e§k;§r") . "\n§cLOCKED");
	$form->addButton($player->hasPermission("settag.permission.exotic") === true ? ("§6Exo§ftic") . "\n§aAVAILABLE" : ("§6Exo§ftic") . "\n§cLOCKED");
        //button 43
	$form->addButton("§cTagsUI Closed");
        $form->sendToPlayer($player);
        return $form;
	 }
}
