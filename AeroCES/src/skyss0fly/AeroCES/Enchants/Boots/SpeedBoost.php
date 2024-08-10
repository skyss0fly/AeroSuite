<?php
declare(strict_types=1);

namespace skyss0fly\AeroCES;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;

class SpeedBoost extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->registerCustomEnchants();
    }

    private function registerCustomEnchants(): void {
        $speedBoost = new Enchantment("speed_boost", "Speed Boost", Enchantment::RARITY_RARE, Enchantment::SLOT_FEET, Enchantment::SLOT_NONE, 3);
        Enchantment::registerEnchantment($speedBoost);
    }

    /**
     * @param PlayerMoveEvent $event
     */
    public function onPlayerMove(PlayerMoveEvent $event): void {
        $player = $event->getPlayer();
        $boots = $player->getArmorInventory()->getBoots();

        if ($boots instanceof Item) {
            $enchantment = $boots->getEnchantment(Enchantment::getEnchantmentByName("speed_boost"));

            if ($enchantment !== null) {
                $level = $enchantment->getLevel();               
                $effect = new EffectInstance(Effect::getEffect(Effect::SPEED), 20, $level - 1, false, false);
                $player->addEffect($effect);
            }
        }
    }
}

