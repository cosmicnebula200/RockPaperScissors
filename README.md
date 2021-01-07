# RockPaperScissors

A simple rock, paper, scissors game for PocketMine!

# How to install

1. Download the phar [here](https://poggit.pmmp.io/ci/cosmicnebula200/RockPaperScissors/RockPaperScissors/dev:2).
2. Upload it to your server's plugin directory.
3. Restart your server.

# Commands
rps:

    usage: /rps <args>
    description: A simple rps game.
    permission: rps.command
   
# Permissions

rps.command:
    
    description: Gives access to the rps command.
    default: true
    
# Config
All messages are configurable with this plugin:

    WinMessage: "&l&a[RPS] -> Opponent has chosen &d {BotMove} &a, You Win!!!"
    LoseMessage: "&l&a[RPS] -> Opponent has chosen &d {BotMove} &a, You Lose :C"
    TiedMessage: "&l&a[RPS] -> Opponent has chosen &d {BotMove} &a, You both Tied"
    
    NoArgsMessage: "&l&a[RPS] -> please choose one from rock , paper or scissors and enter /rps YOUR_MOVE"
    
    notValidArg: "&l&a[RPS] -> please choose one from rock , paper or scissors ONLY"

You can also configure commands ran when a player wins a game of rock paper scissors:

    commands:
    - "say {PLAYER} has won a rps game do `/rps <args>` to play :)"
    - "say You can add more commands on config.yml"
    
# Support

Contact CosmicNebula#2508 or alternatively TPE#1061 on discord if you need any assistance or have any suggestions.
    
    
