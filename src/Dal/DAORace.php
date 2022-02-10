<?php

namespace Beweb\Td\Dal;

use Beweb\Td\Models\Race;

class DAOrace extends DAO {

    function __construct() {
        $this->datasource = "./db/races.json";
    }


    function persist(mixed $data) {
        
    }


    function load(): array {
        $races = [];

        $races_array = json_decode(file_get_contents($this->datasource), true);

        foreach ($races_array as  $race) {
            $r = new Race();

            $r->id = $race["id"];
            $r->name = $race["name"];
            $r->att = $race["att"];
            $r->def = $race["def"];
            $r->hp = $race["hp"];

            array_push($races, $r);
        }

        return $races;
    }

    function findById(int $id): mixed {
        foreach ($this->load() as $race) {
            if ($race->id == $id) {
                return $race;
            }
        } 
    }

    function findByName($name) {
        foreach ($this->load() as $race) {
            if ($race->name == $name) {
                return $race;
            }
        }
    }
}
