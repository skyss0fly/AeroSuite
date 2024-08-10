<?php

namespace skyss0fly\AeroCES;

use pocketmine\plugin\PluginBase;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use AeroCES\enchants\Sword\Vampirism;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("AeroCES plugin enabled!");

        // Register the custom enchantment
        $vampirism = new Vampirism();
        Enchantment::registerEnchantment($vampirism);
    }

    public function onDisable(): void {
        $this->getLogger()->info("AeroCES plugin disabled!");
    }
}
