<?php

namespace Beweb\Td\Dal;

use Beweb\Td\Models\Job;

// extension de classe 
class DAOJob extends DAO
{

    // constructeur 
    function __construct()
    {
        // on accède à la propriété datasource et on lui stock notre fichier json de Jobs
        $this->datasource = "./db/jobs.json";
    }


    function persist(mixed $data)
    {
    }

    // on recup les datas sous forme de tableau
    function load(): array
    {

        // init tableau
        $jobs = [];
        // on stock dans la variable data notre contenu de fichier json décodé

        $datas = json_decode(file_get_contents($this->datasource), true);

        // on loop dans notre fichier json
        foreach ($datas as  $job_as_array) {

            //creation de classe Job
            $j = new Job();

            // $key = key($job_as_array);
            // if (key($datas[0]) === "Warrior") {
            //     $j = new Job($datas[0]);
            //     echo "aaaa |   ";
            // }

            // on pointe sur chacune des propriétés de notre classe Job et on insère 
            $j = $job_as_array;
            // on pousse nos données (propriétés de chaque jobs dans le tableau vide jobs)
            array_push($jobs, $j);





            //     // $jobs = file_get_contents("./db/jobs.json");
            //     // $jobs_as_array = json_decode($jobs, true);
            //     if (key($datas[0]) == "Warrior") {
            //         var_dump($datas->att_multi);
            //         echo "test". "\n";
            //     }

            // $j->def_multi = $job_as_array["def_multi"];
            // $j->pv_multi = $job_as_array["hp_multi"];
            // $j->name = $job_as_array["Job"];

        }

        // on retourne le tableau jobs
        return $jobs;
    }

    /**
     * recherche par id
     *
     * @param [type] $id
     * @return 
     */
    function findByName($name)
    {
        foreach ($this->load() as $key => $job) {
            if ($job['name'] == $name) {
                return $job;
            }
        }
    }
}
