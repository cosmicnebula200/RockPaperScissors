<?php

namespace cosmicnebula200\RPS;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;



class Main extends PluginBase{

	public const CONFIG_VERSION = 1;

	public function onEnable()
	{
		if($this->getConfig()->get("config-version") !== 1){
			unlink("Plugin_data/RockPaperScissors/config.yml");
			$this->saveDefaultConfig();
			$this->getLogger()->warning("The Old config is being deleted to get the new one the plugin is getting disabled and will work after the restart");
			$this->getServer()->getPluginManager()->disablePlugin($this->getServer()->getPluginManager()->getPlugin("RockPaperScissors"));
		}else{
			$this->saveDefaultConfig();
		}
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
	{
		switch (strtolower($command->getName())){

			case "rps":

				if(count($args) == 1){

					$loseMsg = $this->getConfig()->get("LoseMessage");
					$winMsg = $this->getConfig()->get("WinMessage");
					$tieMsg = $this->getConfig()->get("TiedMessage");


					switch (mt_rand(1 ,  3)){
						case 1:
							$botmove = "paper";

							break;
						case 2:
							$botmove = "rock";
							break;
						case 3:
							$botmove = "scissors";
							break;
					}

					if($args[0] !== $botmove){
						switch ($args[0]) {
							case "rock":
								if($botmove == "paper"){
									$sender->sendMessage(str_replace("{BotMove}" , $botmove ,str_replace("&" , "§" ,$loseMsg)));
								}else{
									$sender->sendMessage(str_replace("{BotMove}" , $botmove ,str_replace("&" , "§" ,$winMsg)));
									foreach ($this->getConfig()->get("commands") as $cmd) {
										$this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{PLAYER}", $sender->getName(), $cmd));
									}

								}
								break;
							case "paper":
								if($botmove == "scissors"){
									$sender->sendMessage(str_replace("{BotMove}" , $botmove ,str_replace("&" , "§" ,$loseMsg)));
								}else{
									$sender->sendMessage(str_replace("{BotMove}" , $botmove ,str_replace("&" , "§" ,$winMsg)));
									foreach ($this->getConfig()->get("commands") as $cmd) {
										$this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{PLAYER}", $sender->getName(), $cmd));
									}
								}
								break;
							case "scissors":
								if($botmove == "rock"){
									$sender->sendMessage(str_replace("{BotMove}" , $botmove ,str_replace("&" , "§" ,$loseMsg)));
								}else{
									$sender->sendMessage(str_replace("{BotMove}" , $botmove ,str_replace("&" , "§" ,$winMsg)));
									foreach ($this->getConfig()->get("commands") as $cmd) {
										$this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{PLAYER}", $sender->getName(), $cmd));
									}
								}
								break;
						}

					}else{
						$sender->sendMessage(str_replace("{BotMove}" , $botmove ,str_replace("&" , "§" ,$tieMsg)));
					}
				}else{
					$noArgs = $this->getConfig()->get("NoArgsMessage");
					$sender->sendMessage(str_replace("&" , "§",$noArgs));
				}

		}
		return true;
	}

}
