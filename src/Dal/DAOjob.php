<?php

namespace Beweb\Td\Dal;

use Beweb\Td\Models\Job;

// extension de classe 
class DAOJob extends DAO {

    // constructeur 
    function __construct(){
        // on accède à la propriété datasource et on lui stock notre fichier json de Jobs
        $this->datasource = "./db/jobs.json";
    }


    function persist(mixed $data){

    }

    // on recup les datas sous forme de tableau
    function load(): array{

        // init tableau
        $jobs = [];
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