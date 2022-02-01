<?php

namespace Beweb\Td\Models;

use Beweb\Td\Models\Interfaces\Fighter;

/**
 * reprensente les Characters qui se battrons les uns les autres
 * Un character est defibni par des caracteristiques de race et de job
 */
class Character implements Fighter
{

    private string $name;
    private Race $race;
    private Job $job;
    private Stats $stats;

    public function __construct(Race $race, Job $job)
    {
        // on recup les statistiques de race (exemple : Elf 50pv50atck50def)
        // on recup les multiplicateurs de pv attack et defense d'un Job (exemple, un guerrier aura ses pv de Race multiplie par 2) 
        // et donc on  donne a notre Character ses -> Stats influences par Race(valeur)*Job(coefficient)
        // (au donne les stats grace a un appel de fonction qui va faire cette operation)

        $this->race = $race;
        $this->job = $job;
        $this->stats = new Stats();
        $this->defineStats();
    }

    public function getName(){
        return $this->name;
    }

    public function getRace(){
        return $this->race;
    }

    public function getStats(){
        return $this->stats;
    }

    public function setName($name){
        $this->name = $name;        
    }

    private function defineStats()
    {
        $this->stats->attack = $this->race->accessModifiersData()->attack * $this->job->getMultiplicatorAttack();
        $this->stats->defense = $this->race->accessModifiersData()->defense * $this->job->getMultiplicatorDefense();
        $this->stats->hp = $this->race->accessModifiersData()->hp * $this->job->getMultiplicatorHp();
    }

    public function showCharacterstats()
    {
        echo  $this->race->emoticon . " " . $this->name. "["."\u{1F50B}" .$this->stats->hp."]". "\n";
        //echo 'Salut j\'ai ' . $this->stats->attack . " points d'attaque, " . $this->stats->defense . " points de defense et une santé de " . $this->stats->hp . "\n";
    }


    function attack(Fighter &$target): void
    {
    }
}

