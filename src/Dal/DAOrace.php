<?php

namespace Beweb\Td\Dal;

use Beweb\Td\Models\Race;

// extension de classe 
class DAOrace extends DAO {

    // constructeur 
    function __construct(){
        // on accède à la propriété datasource et on lui stock notre fichier json de Jobs
        $this->datasource = "./db/races.json";
    }


    function persist(mixed $data){

    }

    // on recup les datas sous forme de tableau
    function load(): array{

        // init tableau
        $races = [];
        // on stock dans la variable data notre contenu de fichier json décodé

        $datas = json_decode(file_get_contents($this->datasource),true);

        // on loop dans notre fichier json
        foreach ($datas as  $race_as_array) {

            //creation de classe race
            $r = new Race();

            // on pointe sur chacune des propriétés de notre classe Job
            // $r->att = $race_as_array["att"];
            // $r->def = $race_as_array["def"];
            // $r->hp = $race_as_array["hp"];
            // $r->name = $race_as_array["Race"];

            $r = $race_as_array;
            
            // on pousse nos données (propriétés de chaque jobs dans le tableau vide jobs)
            array_push($races,$r);
        }

        // on retourne le tableau jobs
        return $races;
    }
}