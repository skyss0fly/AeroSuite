<?php

declare(strict_types=1);

namespace skyss0fly\AeroLC\command\subcommand;

use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use CortexPE\Commando\BaseSubCommand;
use skyss0fly\AeroLC\AeroLC;
use skyss0fly\AeroLC\utils\ConfigManager;

class Position1Subcommand extends BaseSubCommand {
    protected function prepare(): void {
        $this->setPermission("AeroLC.command.pos1");
    }
    
    public function onRun(CommandSender $sender, string $alias, array $args): void {
        // Ensure the sender is a Player
        if (!$sender instanceof Player) {
            $sender->sendMessage("This command can only be used in-game!");
            return;
        }

        // Get the player's current position
        $position = $sender->getPosition();
        $x = $position->getX();
        $y = $position->getY();
        $z = $position->getZ();

        // Store or process the position (example with ConfigManager)
        $configManager = AeroLC::getInstance()->getConfigManager(); // AeroLC has a method getConfigManager
        $configManager->setFirstPosition($x, $y, $z);

        // Feedback to the player
        $sender->sendMessage("Position 1 set to: X={$x}, Y={$y}, Z={$z}");
    }
}
