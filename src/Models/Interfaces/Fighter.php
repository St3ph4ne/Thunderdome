<?php

namespace Beweb\Td\Models\Interfaces;

/**
 * Réprésente un combattant avec des caractéristiques
 */
interface Fighter {
    // /**
    //  * nom du combattant
    //  *
    //  * @var String
    //  */
    // public String $name;
    // /**
    //  * point de vie
    //  *
    //  * @var integer
    //  */
    // public int $hp;
    // /**
    //  * points d'attaque
    //  *
    //  * @var integer
    //  */
    // public int $atk;
    // /**
    //  * points de defense en % 
    //  *
    //  * @var integer valeur de 0 à 100
    //  */
    // public int $def;
    // /**
    //  * Probabilité d'échec critique
    //  *
    //  * @var integer valeur de 1 à 10
    //  */
    // public int $fumble;



    // public function __construct($name, $hp, $atk, $def, $fumble) {
    //     $this->name = $name;
    //     $this->hp = $hp;
    //     $this->atk = $atk;
    //     $this->def = $def;
    //     $this->fumble = $fumble;
    // }


    
    /**
     * Decrease hp after the calculation of dmg when the fighter received a hit
     *
     * @param int $atk récupère l'attaque de l'attaquant
     * @return void
     */
    public function decreaseHp($atk): void;

    /**
     * Vérifie si le combattant est mort
     *
     * @return boolean true si il est bien mort lol
     */
    public function isDead(): bool;

    /**
     * Octroie le succès de l'attaque aléatoirement en fonction de la probabilité d'échec critique de l'attaquant
     *
     * @return boolean true si l'attaque est un succès
     */
    public function hit(): bool;


}

?>
