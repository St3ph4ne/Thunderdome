<?php
require("./vendor/autoload.php");

use Beweb\Td\Dal\DAO;
use Beweb\Td\Dal\DAOjob;
use Beweb\Td\Dal\DAOrace;
use Beweb\Td\Engines\Game;
use Beweb\Td\Models\Character;
use Beweb\Td\Models\Impl\Job\Druid;
use Beweb\Td\Models\Impl\Job\Warlock;
use Beweb\Td\Models\Impl\Job\Warrior;
use Beweb\Td\Models\Impl\Race\Elf;
use Beweb\Td\Models\Impl\Race\Human;
use Beweb\Td\Models\Impl\Race\Orc;
use Beweb\Td\Models\Job;

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


// $dao = new DAO("./db/datas.json");




//================================================
// on charge de la data (on la recup)
// $RaceDatas = $RaceDao->load();
// $JobDatas = $JobDao->load();
// var_dump($RaceDatas);

// $jobs = file_get_contents("./db/jobs.json");
// $jobs_as_array = json_decode($jobs, true);
// var_dump(key($jobs_as_array[0]));


// // à faire
// //>>>>>>>>>>>
// $JobDao = new DAOjob();
// //liste des jobs
// $JobsDatas = $JobDao->load();
// //>>>>>>>>>>>

// // à faire
// //>>>>>>>>>>>
//racedao = nouvelle classe ()
$RaceDao = new DAOrace();
//liste des races
$RacesDatas = $RaceDao->load();
// //>>>>>>>>>>>



// var_dump($JobsDatas);
var_dump($RacesDatas);
