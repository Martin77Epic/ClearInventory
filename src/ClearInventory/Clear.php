<?php

namespace ClearInventory;


use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;3
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\inventory\PlayerInventory;
use pocketmine\inventory\Inventory;
use pocketmine\Server;

class Clear extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::AQUA . "ClearInventory by Martin77Epic enabled");
    }
    public function onDisable()
    {
        $this->getLogger()->info(TextFormat::AQUA . "ClearInventory by Martin77Epic disabled");
    }

    /**
     * @param CommandSender $sender
     * @param Command $cmd
     * @param string $label
     * @param array $args
     */
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        if ($command->getName() === "ci") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission(m77e . ci)) {

                    $sender->sendMessage(TextFormat::GREEN . "Succesfully cleared your inv");
                    $sender->getInventory()->clearAll();
                    if ($sender instanceof ConsoleCommandSender) {
                        $sender->sendMessage(TextFormat::DARK_RED . "This Command works only in-game");
                    }
                } else {
                    if ($command->getName() == cia) {
                        if ($sender->hasPermission(m77e . cia)) {
                            $sender->sendMessage(TextFormat::GREEN . "Succesfully cleared all Inventorys");
                            foreach ($this->getServer()->getOnlinePlayers() as $onlinePlayers) ;
                            $onlinePlayers->getInventory()->clearAll();
                        }

                    }

                }
            }
            
                
            }
        return true;
        }

    
    
    


}
