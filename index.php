<?php
require("./vendor/autoload.php");

use Beweb\Td\Models\Character;
use Beweb\Td\Models\Impl\Elf;
use Beweb\Td\Models\Impl\Job\Warrior;



$test = new Character(new Elf,new Warrior);

var_dump($test);
