<?php

namespace Beweb\Td\Dal;

use Beweb\Td\Models\Character;
use Beweb\Td\Models\Job;
use Beweb\Td\Models\Race;

// extension de classe 
class DAOcharacter extends DAO
{

    // constructeur 
    function __construct()
    {
        $this->datasource = "./db/characters.json";
    }


    function persist(mixed $data)
    {
        $character = $this->load();
        array_push($characters, $data);
        file_put_contents($this->datasource, json_encode($characters));
    }

    // on recup les datas sous forme de tableau
    function createCharacter(string $race, string $job) : Character
    {
        $daoRace = new DAOrace();
        $daoJob = new DAOJob();
        $c = new Character(
            $daoRace->findByName($race),
            $daoJob->findByName($job));
        return $c;
    }

    // function new_character($race, $job)
    // {
    //     $DAOrace = new DAOrace();
    //     $race = $DAOrace->findByName($race);

    //     $DAOjob = new DAOJob();
    //     $job = $DAOjob->findByName($job);

    //     $characters = new Character($race, $job);

    //     $characters->stats->att = $race->att * $job->att_multi;
    // }




    function load(): array
    {

        // init tableau
        $characters = [];
        // on stock dans la variable data notre contenu de fichier json décodé

        $datas = json_decode(file_get_contents($this->datasource), true);
        $DAOrace = new DAOrace();
        $DAOjob = new DAOJob();
        // on loop dans notre fichier json
        foreach ($datas as  $character_as_array) {

            //creation de classe race
            $c = new Character(
                $DAOrace->findbyname($character_as_array["race"]),
                $DAOjob->findbyname($character_as_array["job"]),
            );

            $c->id = $character_as_array["id"];
            $c->att = $character_as_array["att"];
            $c->def = $character_as_array["def"];
            $c->hp = $character_as_array["hp"];
            $c->name = $character_as_array["name"];

            array_push($characters, $c);
        }

        // on retourne le tableau jobs
        return $characters;
    }


    function findByName($character)
    {
        foreach ($this->load() as $key => $character) {
            if ($character['name'] == $character) {
                return $character;
            }
        }
    }
}
