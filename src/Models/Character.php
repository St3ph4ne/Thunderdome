<?php

namespace Beweb\Td\Models;

use Beweb\Td\Models\Interfaces\Fighter;
use JsonSerializable;
use Serializable;
/**
 * reprensente les Characters qui se battrons les uns les autres
 * Un character est defibni par des caracteristiques de race et de job
 */
class Character implements Fighter , JsonSerializable{

    private Race $race;

    private Job $job;


    public int $pv = 0;
    public int $att = 0;
    public int $def = 0;

    public int $id = 0;


   

    public function __construct(Race $race,Job $job){
        $this->race = $race;
        $this->job = $job;
    }


    function attack(Fighter &$target): void{

    }

    /**
     * cette methode issue de l'interface est utilisée par json_encode pour recuperer 
     * une représentation custom de l'objet courant 
     * sinon (si on n'implémente pas l'interface JSONSerializable) json_encode parse (transforme) en json les propriétés publiques de l'objet courant
     * (je vous invite a tester le parsing en jouant avec des propriété public protected et private pour valider mon explication du dessus)
     * 
     *
     * @return mixed
     */
    public function jsonSerialize(): mixed{
        return  array(
            "id" => $this->id,
            "race"=>$this->race->id,
            "job" => $this->job->id,
            "att" => $this->att,
            "def" => $this->def,
            "pv" => $this->pv
        );
    }

}
