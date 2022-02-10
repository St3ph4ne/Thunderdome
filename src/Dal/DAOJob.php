<?php

namespace Beweb\Td\Dal;

use Beweb\Td\Models\Job;

class DAOJob extends DAO {
    
    function __construct() {
        $this->datasource = "./db/jobs.json";
    }


    function persist(mixed $data) {

    }

    // on recup les datas sous forme de tableau
    function load(): array {
        // init tableau
        $jobs = [];
        // on stock dans la variable data notre contenu de fichier json décodé

        $datas = json_decode(file_get_contents($this->datasource), true);

        // on loop dans notre fichier json
        foreach ($datas as  $job_as_array) {
            //creation de classe Job
            $j = new Job();
            $j->id = $job_as_array["id"];
            $j->name = $job_as_array["name"];
            $j->att_multi = $job_as_array["att_multi"];
            $j->def_multi = $job_as_array["def_multi"];
            $j->hp_multi = $job_as_array["hp_multi"];
            $j->fumble = $job_as_array["fumble"];

            // on pousse nos données (propriétés de chaque jobs dans le tableau vide jobs)
            array_push($jobs, $j);
        }

        return $jobs;
    }

    function findById(int $id): mixed {
        foreach ($this->load() as $job) {
            if ($job->id == $id) {
                return $job;
            }
        }
    }


    function findByName($name){
        foreach ($this->load() as $job) {
            if ($job->name == $name) {
                return $job;
            }
        }
    }
}
