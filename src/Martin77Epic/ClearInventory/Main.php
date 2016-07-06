<?php

namespace Martin77Epic\ClearInventory;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\inventory\Inventory;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvent($this, $this);
        $this->getLogger()->info(TextFormat::AQUA . "ClearInventory by Martin77Epic enabled");
    }
    public function onDisable()
    {
        $this->getLogger()->info(TextFormat::AQUA . "ClearInventory by Martin77Epic disabled");
    }
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        switch (strtolower($cmd->getName())) {
            case "cim":
                if (!($sender instanceof Player)) {
                    $sender->sendMessage(TextFormat::DARK_RED . "This command is only in-game avaible");
                }else{
                    if ($sender->hasPermission("m77e.cim")) {
                        $sender->sendMessage(TextFormat::GREEN . "Succesfully cleared your Inventory");
                        $sender->getInventory()->clearAll();
                    }
                }
            break;
                
            case "cia":
                    $sender->sendMessage(TextFormat::DARK_RED . "Succesfully cleared all Inventorys");
                    foreach ($this->getServer()->getOnlinePlayers() as $players) {
                        $players->getInventory()->clearAll();
            	    }
            break;

               
            case "cip":

	 	$name = strtolower($args[0]);
		$player = $sender->getServer()->getPlayer($name);
		if($player instanceof Player){
                	if (!($sender->hasPermission(m77e.cip))){
                        	$sender->sendMessage(TextFormat::DARK_BLUE . "Succesfully cleared inventory from ".$player->getName());
                   		$player->getInventory()->clearAll();
                    	}
		}
	    break;
        }
        return true;
    }
}
