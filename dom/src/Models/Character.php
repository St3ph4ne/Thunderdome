<?php

namespace Beweb\Td\Models;

use Beweb\Td\Models\Interfaces\Fighter;
use JsonSerializable;

/**
 * reprensente les Characters qui se battrons les uns les autres
 * Un character est defibni par des caracteristiques de race et de job
 */
class Character implements Fighter, JsonSerializable{
    public int $id;
    public String $name;
    private Race $race;
    private Job $job;

    public int $hp;
    public int $atk;
    /**
     * défense du personnage
     *
     * @var integer - valeur entre 1 et 10
     */
    public int $def;
    public int $fumble;
   
    public function __construct(String $name, Race $race,Job $job) {
        $this->name = $name;
        $this->race = $race;
        $this->job = $job;

        $this->hp = $this->race->hp * $this->job->hp_multi;
        $this->atk = $this->race->att * $this->job->att_multi;
        $this->def = $this->race->def * $this->job->def_multi;
        $this->fumble = $this->job->fumble;
    }

    /**
     * cette methode issue de l'interface est utilisée par json_encode pour recuperer 
     * une représentation custom de l'objet courant 
     * sinon (si on n'implémente pas l'interface JSONSerializable) json_encode parse (transforme) en json les propriétés publiques de l'objet courant
     * (je vous invite a tester le parsing en jouant avec des propriété public protected et private pour valider mon explication du dessus)
     * 
     * @return mixed
     */
    public function jsonSerialize(): mixed {
        return array(
            "id" => $this->id,
            "name" =>$this->name,
            "race"=>$this->race->id,
            "job" => $this->job->id
        );
    }



        /**
     * Decrease hp after the calculation of dmg when the fighter received a hit
     * 
     * @param int $atk récupère l'attaque de l'attaquant
     * @return void
     */
    public function decreaseHp($atk): void {
        if($this->def >= 100) {
            $resistance = 90;    
        } else {
            $resistance = $this->def;
        }

        $dmg = round($atk - ($atk * $resistance / 100));
        
        if($dmg <= 0) {
            $dmg = 1;
        }

        $this->hp -= $dmg;

        echo $this->name . " perd <span style='font-weight:bold'>" . $dmg . " PV</span> et a maintenant <span style='font-weight:bold'>" . $this->hp . "PV</span><br>";
    }

    /**
     * Vérifie si le combattant est mort
     *
     * @return boolean true si il est bien mort lol
     */
    public function isDead(): bool {
        if($this->hp <= 0) {
            echo "<span style='font-weight:bold'>" . $this->name . " est K.O</span><br><br>";
            return true;
        }
        return false;
    }

    /**
     * Octroie le succès de l'attaque aléatoirement en fonction de la probabilité d'échec critique de l'attaquant
     *
     * @return boolean true si l'attaque est un succès
     */
    public function hit(): bool {
        if($this->fumble < rand(0,10)) {
            echo $this->name . " <span style='color:green; font-weight:bold'>réussit à frapper !</span><br>";
            return true;
        }
        else {
            echo "<span style='color : red; font-weight:bold'>Echec critique</span> - " . $this->name . " se rate !<br>";
            return false;
        }
    }
}


