<?php
namespace skyss0fly\AeroLC;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use CortexPE\Commando\BaseCommand;

class AeroLCCommand extends BaseCommand {

    protected function prepare(): void {
        $this->registerSubCommand(new HelpSubcommand("help", "Help"));
        
        
        $this->setPermission(self::BASE_PERMISSION);
    }
    
    public function getPermission(): string {
        return self::BASE_PERMSISSION;
    }
    
    public function onRun(CommandSender $sender, string $alias, array $args): void {
        $sender->sendMessage($this->getOwningPlugin()->getLangManager()->translate("plugin.in-dev"));
    }
    
}
?>
