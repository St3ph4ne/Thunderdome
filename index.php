<?php

use Beweb\Td\Dal\DAOCharacter;
use Beweb\Td\Engines\Dome;


require("./vendor/autoload.php");

$dao = new DAOCharacter();

$dome = Dome::getInstance();

// $sony = $dao->findByName("Sony");
// $brocoli = $dao->findByName("Brocoli");
// $ken = $dao->findByName("Ken");

// $dome->add($sony);
// $dome->add($ken);
// $dome->add($brocoli);

$dome->addAll($dao->load());



//var_dump($dome->)
$dome->start();

