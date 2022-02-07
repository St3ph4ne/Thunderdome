<?php
require("./vendor/autoload.php");

use Beweb\Td\Dal\DAO;
use Beweb\Td\Engines\Game;
use Beweb\Td\Models\Character;
use Beweb\Td\Models\Impl\Job\Druid;
use Beweb\Td\Models\Impl\Job\Warlock;
use Beweb\Td\Models\Impl\Job\Warrior;
use Beweb\Td\Models\Impl\Race\Elf;
use Beweb\Td\Models\Impl\Race\Human;
use Beweb\Td\Models\Impl\Race\Orc;


// var_dump($character);
// echo $character->stats->attack;
// $character->showCharacterstats();
// $character = new Character(new Human,new Warrior);
//>>>>>>>>>>>>>>>>>>>>>>>
// $qty = 3;
// $my_game = new Game;
// $my_game->add_character($qty);
// $my_game->start();
//>>>>>>>>>>>>>>>>>>>>>>>


// file_get_contents(); // lit le contenu du fichier

// file_put_contents(); // écrit dans le fichier

// $values = file_get_contents("./db/datas.json");

// // echo $values."\n";

// // on recup le contenu de fichier dans un format tableau associatif
// $values_as_array = json_decode($values, true);

// foreach ($valuse_as_array as $key => $value) {
//   if($value["id"] == 1) {
//     $values_as_array["firstname"] = "kk";
//   }
// }

// // on change la valeur à l'index à la clé firstname
// $values_as_array["firstname"] = "tutu";
// var_dump($values_as_array);

// $toFile = json_encode($values_as_array);
// file_put_contents("./db/datas.json",$toFile);


$dao = new DAO("./db/datas.json");

// à faire
//>>>>>>>>>>>
$dao = new DAO("./db/races.json");
//liste des races
$datas = $dao->load();
//>>>>>>>>>>>

// à faire
//>>>>>>>>>>>
$dao = new DAO("./db/jobs.json");
//liste des classes
$datas = $dao->load();
//>>>>>>>>>>>


//================================================
// on charge de la data (on la recup)
$datas = $dao->load();
var_dump($datas);
