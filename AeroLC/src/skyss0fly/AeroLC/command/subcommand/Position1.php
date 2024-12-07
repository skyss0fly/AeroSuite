<?php

declare(strict_types=1);

namespace skyss0fly\AeroLC\command\subcommand;

use pocketmine\command\CommandSender;

use CortexPE\Commando\BaseSubCommand;

use skyss0fly\AeroLC\AeroLC;
use skyss0fly\AeroLC\utils\ConfigManager;
use skyss0fly\AeroLC\utils\LangManager;

class HelpSubcommand extends BaseSubCommand {
    protected function prepare(): void {
        $this->setPermission("AeroLC.command.pos1");
    }
    
    public function onRun(CommandSender $sender, string $alias, array $args): void {
        $lang_manager = LangManager::getInstance();
        $this->setFirstPosition($sender->getPosition()->getX(), $sender->getPosition()->getY(), $sender->getPosition()->getZ());
        //TODO
    }
} 
 
