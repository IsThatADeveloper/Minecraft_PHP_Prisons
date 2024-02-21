---

# PureChat version string
# - string
version: "1.4.10-7"

# Enable this if you want to use per-world chat formats / per-world nametags for players
# - true / false
enable-multiworld-chat: false

# Please check if you have all PurePerms groups in your server here

# &0: Black, &1: Dark Blue, &2: Dark Green, &3: Dark Aqua, &4: Dark Red, &5: Dark Purple, &6: Gold, &7: Gray, &8: Dark Gray, &9: Blue
# &a: Green, &b: Aqua, &c: Red, &d: Light Purple, &e: Yellow, &f: White
# &k: Obfuscated, &l: Bold, &m: Strikethrough, &n: Underline, &o: Italic, &r: Reset

# Available PureChat tags
# {display_name} Get the player's username.
# {msg} Get the player's message.
# {prefix} Get PurePerms Prefix of the rank.
# {suffix} Get the PurePerms Suffix of the rank.
# {world} Get the PurePerms world the player is in.

# Available PureChat tags: {display_name}, {msg}, {fac_name}, {fac_rank}, {prefix}, {suffix}, {jump}, {speed}, {feed}, {nv}, {speedbreaker}, {heal}, {fly}, {rank} {world}
groups:
  Guest:
    chat: '&f☼ &8[&r{fac_name}&8]&r&f {rank} &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}&3{feed}&f{speed}&a{jump} &8[&r&7Member&8]&r &a{display_name}'
    worlds: []
  Archer:
    chat: '&f☼ &8[&r{fac_name}&8]&r&f {rank} §8[§r§5Archer§8]§r&7 &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}&e{feed}&f{speed}&a{jump} §8[§r§5Archer§8]§r &a{display_name}'
    worlds: []
  Warrior:
    chat: '&f☼ &8[&r{fac_name}&8]&r&f {rank} §8[§r§1Warrior§8]§r&7 &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}&e{feed}&f{speed}&a{jump} §8[§r§1Warrior§8]§r &a{display_name}'
    worlds: []
  Knight:
    chat: '&f☼ &8[&r{fac_name}&8]&r&f {rank} §8[§r§eKnight§8]§r&7 &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}&e{feed}&f{speed}&a{jump} §8[§r§eKnight§8]§r &a{display_name}'
    worlds: []
  Samurai:
    chat: '&f☼ &8[&r{fac_name}&8]&r&f {rank} §8[§r§5§r§6:§5:§cSamurai§5:§6:§r§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}&e{feed}&f{speed}&a{jump} §8[§r§5§r§6:§5:§cSamurai§5:§6:§r§8]§r &a{display_name}'
    worlds: []
  HitMan:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r§c§5:§6:§cHitMan§6:§5:§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r§c§5:§6:§cHitMan§6:§5:§8]§r §a{display_name}'
    worlds: []
  Kraken:
    chat: '&e{feed}&f{speed}&a{jump} &8[&r{fac_name}&8]&r&f {rank} §8[§r§1::Kraken::§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r§1::Kraken::§8]§r §a{display_name}'
    worlds: []
  Ninja:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r§5§k§l||§rNinja§k§5§l||§r§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f&l{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r§5§k§l||§rNinja§k§5§l||§r§8]§r §a{display_name}'
    worlds: []
  God:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r§1§k8§a8§r§6God§a§k8§68§r§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f&l{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r§1§k8§a8§r§6God§a§k8§68§r§8]§r §a{display_name}'
  Smexy:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §3§l[§r§5+§b§k§l;§e:§r§cSmexy§e§k§l:§b;§r§5+§r§3§l] &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f&l{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §3§l[§r§5+§b§k§:§e;§r§cSmexy§e§k§l:§b;§r§5+§r§3§l]§r §a{display_name}'
    worlds: []
  Youtuber:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §f[§r§o§cYou§r§otuber§c]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §f[§r§o§cYou§r§otuber§c]§r §a{display_name}'
    worlds: []
  Builder:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r&aBuilder§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &l&f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r&aBuilder§8]§r §a{display_name}'
    worlds: []
  HeadBuilder:
    chat: '&8[&r{fac_name}&8]&r&f {rank} &8[&r&bH&ee&ba&ed&bB&eu&ei&bl&ed&be&er&8]&r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &l&f{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} &8[&r&bH&ee&ba&ed&bB&eu&ei&bl&ed&be&er&8] §a{display_name}'
    worlds: []
  Helper:
    chat: '&8[&r{fac_name}&8]&r&f {rank} &e[Helper] &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &7{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r&eHelper§8]§r §a{display_name}'
    worlds: []
  Tester:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[&aT&5e&as&5t&ae&5r&c§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &6{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r&aT&5e&as&5t&ae&5r&c§8]§r §a{display_name}'
    worlds: []
  Moderator:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r&1Moderator§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &d{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r&1Moderator§8]§r §a{display_name}'
    worlds: []
  HeadMod:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r&6HeadMod§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &b{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r&6HeadMod§8]§r §a{display_name}'
    worlds: []
  Admin:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r&cAdmin§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &e{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r&cAdmin§8]§r §a{display_name}'
    worlds: []
  HeadAdmin:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r&bHeadAdmin&r§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &9{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r&bHeadAdmin§8]§r §a{display_name}'
    worlds: []
  CoOwner:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r&5CoOwner&r§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &3{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r&5CoOwner§8]§r §a{display_name}'
    worlds: []
  Owner:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r§7O§5w§7n§5e§7r§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &6{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r§7O§5w§7n§5e§7r§8]§r §a{display_name}'
    worlds: []
  OP:
    chat: '&8[&r{fac_name}&8]&r&f {rank} §8[§r§bOP§8]§r &8[&r&f&7{display_name}&8] {prefix} &r&7:
      &6{msg}'
    nametag: '&c{fly}&d{heal}&e{speedbreaker}&1{nv}§e{feed}§f{speed}§a{jump} §8[§r§bOP§8]§r §a{display_name}'
    worlds: []
