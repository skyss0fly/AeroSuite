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

class NightVision extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->registerCustomEnchants();
    }

    private function registerCustomEnchants(): void {
        $nightvision = new Enchantment("night_vision", "Night Vision", Enchantment::RARITY_UNCOMMON, Enchantment::SLOT_FEET, Enchantment::SLOT_NONE, 3);
        Enchantment::registerEnchantment($nightvision);
    }

    /**
     * @param PlayerMoveEvent $event
     */
    public function onPlayerMove(PlayerMoveEvent $event): void {
        $player = $event->getPlayer();
        $helmet = $player->getArmorInventory()->getHelmet();

        if ($helmet instanceof Item) {
            $enchantment = $helmet->getEnchantment(Enchantment::getEnchantmentByName("night_vision"));

            if ($enchantment !== null) {
                $level = $enchantment->getLevel();               
                $effect = new EffectInstance(Effect::getEffect(Effect::NIGHT_VISION), 20, $level - 1, false, false);
                $player->addEffect($effect);
            }
        }
    }
}
