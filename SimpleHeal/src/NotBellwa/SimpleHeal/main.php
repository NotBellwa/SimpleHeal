<?php
declare(strict_types=1);
namespace NotBellwa\SimpleHeal;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class main extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        if($command->getName() === "heal"){
            if($sender instanceof Player){
                if($sender->hasPermission("heal.command")){
                    $sender->setHealth(20);
                    $sender->sendMessage(C::GREEN . "You have been healed");
                }else{
                    $sender->sendMessage(C::GREEN . "No Perms");
                }
            }
        }
        return true;
    }
}
