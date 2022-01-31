<?php
require("./vendor/autoload.php");

// use Beweb\Td\Models\Character;

use Beweb\Td\Models\Character;
use Beweb\Td\Models\Impl\Elf;
use Beweb\Td\Models\Impl\Job\Warrior;

// use Beweb\Td\Models\Impl\Job\Warrior;



$test = new Character(new Elf,new Warrior);

$elf = new Elf();
var_dump($test);
