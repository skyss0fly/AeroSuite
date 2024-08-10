
<?php
declare(strict_types=1);

namespace skyss0fly\AeroCES;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\Player;

class Vampirism extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->registerCustomEnchants();
    }

    private function registerCustomEnchants(): void {

        $vampirism = new Enchantment("vampirism", "Vampirism", Enchantment::RARITY_RARE, Enchantment::SLOT_WEAPON, Enchantment::SLOT_NONE, 3);
        Enchantment::registerEnchantment($vampirism);
    }

    /**
     * @param EntityDamageByEntityEvent $event
     */
    public function onEntityDamageByEntity(EntityDamageByEntityEvent $event): void {
        $damager = $event->getDamager();
        $entity = $event->getEntity();

        if ($damager instanceof Player) {
            $item = $damager->getInventory()->getItemInHand();

            if ($item instanceof Item) {
                $enchantment = $item->getEnchantment(Enchantment::getEnchantmentByName("vampirism"));

                if ($enchantment !== null) {
                    $level = $enchantment->getLevel();
                    $damage = $event->getFinalDamage();

                    // Calculate the amount of health to restore based on the enchantment level and damage dealt
                    $healthToRestore = $damage * 0.1 * $level;

                    // Restore health to the player
                    $damager->setHealth(min($damager->getMaxHealth(), $damager->getHealth() + $healthToRestore));
                }
            }
        }
    }
}


