<?php 

namespace xdolmation\OPList;

use pocketmine\{Player, Server};
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
        public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
            switch($cmd->getName()){
                case "oplist":
                if(($sender instanceof Player and $sender->hasPermission("oplist.command"))
                or $sender instanceof ConsoleCommandSender or $sender->isOp()) {
                $ops = file_get_contents("ops.txt");
		$line = "§a-------------------------";
		    $sender->sendMessage($line."\n§6Opped User List:\n§9".$ops.$line);
                }else{
                    $sender->sendMessage("§cYou don't have permission to use this command!");
                }
                break;
            }
              return true;
        }
    }
