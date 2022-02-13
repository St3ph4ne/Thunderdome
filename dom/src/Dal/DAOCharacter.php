<?php

namespace Beweb\Td\Dal;

use Beweb\Td\Models\Character;

class DAOCharacter extends DAO {
    function __construct() {
        $this->datasource = "./db/characters.json";
    }


    /**
     * Persiste un objet Character dans le fichier characters.json
     *
     * @param mixed $character
     * @return void
     */
    function persist(mixed $character) {
        $characters = $this->load();
        $character->id = count($characters) + 1;
        array_push($characters, $character);
        file_put_contents($this->datasource, json_encode($characters));
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
    function createCharacter(String $name, String $race, String $job): Character {
        $daoRace = new DAORace();
        $daoJob = new DAOJob();

        //création d'un Objet Character qu'on va hydrater à l'aide des DAO race et job
        $character = new Character($name, $daoRace->findByName($race), $daoJob->findByName($job));

        return $character;
    }


    /**
     * Charge les personnages contenu dans le fichier characters.json
     *
     * @return array - tableau d'Objet Character
     */
    function load(): array {
        $characters = [];
        
        // récupère le contenu de characters.json 
        $characters_data = json_decode(file_get_contents($this->datasource), true);

        $DAOrace = new DAORace();
        $DAOjob = new DAOJob();

        //création d'un Objet Character qu'on va hydrater à l'aide des DAO race et job pour chaque personnage
        foreach ($characters_data as $character_data) {
            $character = new Character(
                $character_data["name"],
                $DAOrace->findById($character_data["race"]),
                $DAOjob->findById($character_data["job"])
            );
            $character->id = $character_data["id"];

            array_push($characters, $character);
        }

        return $characters;
    }


    /**
     * Retourne le personnage recherché par id
     *
     * @param integer $id
     * @return mixed - retourne l'Objet Character trouvé
     */
    function findById(int $id): mixed {
        
    }

    /**
     * Retourne le personnage recherché par son nom
     *
     * @param String $name
     * @return mixed - retourne l'Objet Character trouvé
     */
    function findByName(String $name): mixed {
        foreach ($this->load() as $character) {
            if ($character->name == $name) {
                return $character;
            }
        }
    }
}
