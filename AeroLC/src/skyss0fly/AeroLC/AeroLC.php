<?php

/**
 * AeroLC - an advanced land protection plugin for PocketMine-MP 5.
 * Copyright (C) 2024 AeroAPI
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace AeroAPI\AeroLC;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;

use CortexPE\Commando\PacketHooker;

use AeroAPI\AeroAPI;

use AeroAPI\AeroLC\command\AeroLCCommand;
use AeroAPI\AeroAPI\utils\ConfigManager;
use AeroAPI\AeroAPI\utils\LangManager;

class AeroLC extends PluginBase {
    
    private static AeroLC $instance; //Unique instance. Singleton class
    
    private AeroAPI $api;
    private LangManager $lang_manager;
    private ConfigManager $config_manager;
    
    public function onLoad(): void {
        self::$instance = $this;
    }
    
    public function onEnable(): void {
        $this->getServer()->getCommandMap()->register("Cerberus", new CerberusCommand($this, "cerberus", "protect land", ["crb", "cerb"]));
        
        if(!PacketHooker::isRegistered()) {
            PacketHooker::register($this);
        }
        
        $this->api = CerberusAPI::getInstance();
        $this->lang_manager = LangManager::getInstance();
        $this->config_manager = ConfigManager::getInstance();
        
        $this->getLogger()->notice($this->lang_manager->translate("plugin.in-dev"));
        $this->getLogger()->info($this->lang_manager->translate("plugin.version", [$this->getDescription()->getVersion()]));
        $this->getLogger()->info($this->lang_manager->translate("plugin.selected_language"));
        
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    }
    
    public static function getInstance(): Cerberus {
        return self::$instance;
    }
    
    public function getAPI(): CerberusAPI {
        return $this->api;
    }
    
    public function getConfigManager(): ConfigManager {
        return $this->config_manager;
    }
    
    public function getLangManager(): LangManager {
        return $this->lang_manager;
    }
    
    /**
     * Returns the full path to a data file in the plugin's resources folder.
     * 
     * This method is available in PocketMine since API 5.5.0. It's added here for compatibility with older PocketMine versions.
     */
    public function getResourcePath(string $filename): string {
        return $this->getFile() . "/resources/" . $filename;
    }
}
