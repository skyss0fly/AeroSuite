<?php

namespace skyss0fly/AeroAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

class Main extends PluginBase {
private $money;
public function onLoad(): void {
$this->money = new([Player, Amount]);


  
}

  public function addMoney($player Player, $amount args[1]) bool {
    $previous = args[1]->this->money($player, $amount);
    $new = $ previous + $amount[1];
    
return $this->money($player, $new);    
  }

}


  }
}
