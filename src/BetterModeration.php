<?php

/*  					
 *			        _
 * 				  | |                  
 * __  ____ ___      _| |___  _____  _ __  
 * \ \/ / _` \ \ /\ / / __\ \/ / _ \| '_ \ 
 *  >  < (_| |\ V  V /| |_ >  < (_) | | | |
 * /_/\_\__, | \_/\_/  \__/_/\_\___/|_| |_|
 *         | |                             
 *         |_|                             
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author xqwtxon
 * @link https://github.com/xqwtxon/
 *
*/

declare(strict_types=1);

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\permission\Permission;
use pocketmine\permission\DefaultPermission;

class BetterModeration extends PluginBase {
     
     public function onLoad() :void {
          
     }
     
     public function onEnable() :void {
          
     }
     
     public function onDisable() :void {
          
     }
     
     private function registerPermission() :void {
          $permission = $this->getPermission();
          $permission = new Permission($permission);
          PermissionManager::getInstance()->addPermission($permission);
     }
     
     public function getPermission() : string {
          if($this->getConfig()->get("Moderator Permission") === false) return "bm.moderator";
          return $this->getConfig()->get("Permission");
     }
     
     private function registerCommands() :void {
          foreach([
               new BanCommand(),
               new KickCommand(),
               new FreezeCommand(),
               new MuteCommand(),
               new PardonCommand(),
               new BanIPCommand(),
               new PardonIPCommand(),
               ] as $command){
                    $this->getServer()->getCommandMap()->register($this->getDescription()->getName(), $command);
               }
     }
     
     private function unloadCommands() :void {
          $command = ["ban","kick","pardon","ban-ip","pardon-ip"];
     }
}