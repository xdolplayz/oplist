<?php 

namespace xdolmation\OPList;

use pocketmine\{Player, Server};
use pocketmine\command\{Command, CommandSender};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("OPList has been activated");
    }
    	public function onDisable(){
            $this->getLogger()->info("OPList has been deactivated");
        }
        public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
            switch($cmd->getName()){
                case "oplist":
                if(($sender instanceof Player and $sender->hasPermission("oplist.command"))
                or $sender instanceof ConsoleCommandSender or $sender->isOp()) {
                $ops = file_get_contents("ops.txt");
                    $sender->sendMessage("§a-------------------------");//25 "-"s
                    $sender->sendMessage("§6Opped User List:");
                    $sender->sendMessage("§9" . $ops);
                    $sender->sendMessage("§a-------------------------");//25 "-"s
                }else{
                    $sender->sendMessage("§cYou don't have permission to use this command!");
                }
                break;
            }
              return true;
        }
    }