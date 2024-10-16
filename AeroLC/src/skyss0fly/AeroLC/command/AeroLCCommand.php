<?php
namespace skyss0fly\AeroLC;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class AeroLCCommand extends Command {

    public function __construct(){
        parent::__construct("aerolc", "AeroLC base command", "/aerolc", []);
        $this->setPermission("aerolc.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if(!$this->testPermission($sender)){
            return false;
        }

        if($sender instanceof Player){
            $sender->sendMessage("This is the base AeroLC command!");
        } else {
            $sender->sendMessage("This command can only be used in-game.");
        }
        return true;
    }
}
