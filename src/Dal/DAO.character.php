<?php

namespace Beweb\Td\Dal;

use Beweb\Td\Models\Job;
use Beweb\Td\Models\Race;

// extension de classe 
class DAOcharacter extends DAO {

    // constructeur 
    function __construct(Job $job, Race $race){
        
    }


    function persist(mixed $data){

    }

    // on recup les datas sous forme de tableau
    function load(): array{

        // init tableau
        $characters = [];
        // on stock dans la variable data notre contenu de fichier json décodé

        $datas = json_decode(file_get_contents($this->datasource),true);

        // on loop dans notre fichier json
        foreach ($datas as  $job_as_array) {

            //creation de classe Job
            $j = new Job();

            // on pointe sur chacune des propriétés de notre classe Job et on insère 
            $j = $job_as_array;
            // $j->def_multi = $job_as_array["def_multi"];
            // $j->pv_multi = $job_as_array["hp_multi"];
            // $j->name = $job_as_array["Job"];
        
            // on pousse nos données (propriétés de chaque jobs dans le tableau vide jobs)
            array_push($jobs,$j);
        }

        // on retourne le tableau jobs
        return $jobs;
    }
}