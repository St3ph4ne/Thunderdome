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


    function persist(mixed $data){
        $characters = $this->load();
        $data->id = count($characters) +1;
        array_push($characters,$data);
        file_put_contents($this->datasource,json_encode($characters));
    }


    /**
     * Ici on implémente une methode pour creer un personnage 
     * oui le DAO est un gestionnaire d'entité , il semble normal de lui deléguer 
     * la fastidieuse tache de fabriquer des personnages (oui ce serait con de faire ça dans l'index.php alors qu'on sait faire des objets ;) )
     * 
     * @todo faire en sorte de passer par un objet qui retourne le bon DAO selon ce qu'on veut faire
     * au lieu de les instanciers dans les methodes (cf : fabrique , singleton ).
     *
     * @param string $race idem que pour job mais pour  race , sauf que c'est différent parce que c'est pas pareil alors que les structures sont les mêmes, mais c'est tout a faire similaire malgré le corollaire évident de la propriété recherchée 
     * @param string $job la classe du personnage pour la chercher afin de l'ajouter a la création du personnage
     * @return Character le personnage que l'on vient de creer
     */
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
