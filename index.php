<?php
require("./vendor/autoload.php");

use Beweb\Td\Engines\Game;
use Beweb\Td\Models\Character;
use Beweb\Td\Models\Impl\Job\Druid;
use Beweb\Td\Models\Impl\Job\Warlock;
use Beweb\Td\Models\Impl\Job\Warrior;
use Beweb\Td\Models\Impl\Race\Elf;
use Beweb\Td\Models\Impl\Race\Human;
use Beweb\Td\Models\Impl\Race\Orc;


$character = new Character(new Human,new Warrior);

// var_dump($character);

// echo $character->stats->attack;
// $character->showCharacterstats();



$qty = 3;

$my_game = new Game;
$my_game->add_character($qty);
$my_game->start();

