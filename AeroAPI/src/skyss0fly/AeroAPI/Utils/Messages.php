<?php
namespace skyss0fly\AeroAPI;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class Messages {

public function sendErrorToConsole(string $str);
  $this->getLogger()->error("AeroAPI: " . $str);
}

public function sendErrorToPlayers(string $str, player $player){
if (!$player instanceof Player){
$this->sendErrorToConsole("Player Not Found!");
}
else {
$player->sendMessage(TEXTFORMAT::RED . "AeroAPI: " . $str);
}
?>
