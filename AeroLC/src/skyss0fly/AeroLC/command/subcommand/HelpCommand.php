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
        $this->setPermission("AeroLC.command.help");
    }
    
    public function onRun(CommandSender $sender, string $alias, array $args): void {
        $lang_manager = LangManager::getInstance();
        $sender->sendMessage($lang_manager->translate("plugin.in-dev"));
        $sender->sendMessage($lang_manager->translate("plugin.version", [AwroLC::getInstance()->getDescription()->getVersion()]));
        $sender->sendMessage($lang_manager->translate("plugin.selected_language"));
        //TODO
    }
} 
 
