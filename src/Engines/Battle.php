<?php

namespace Beweb\Td\Engines;

use Beweb\Td\Models\Interfaces\Fighter;

/**
     * Réprésente le combat entre 2 combattants
     */
    class Battle {
        /**
         * nombre de tour pour un combat
         *
         * @var integer
         */
        public int $round;
        /**
         * combattant 1 dans l'arène
         *
         * @var Fighter
         */
        public Fighter $fighter1;
        /**
         * combattant 2 dans l'arène
         *
         * @var Fighter
         */
        public Fighter $fighter2;



        public function __construct($fighter1, $fighter2) {
            $this->round = 0;
            $this->fighter1 = $fighter1;
            $this->fighter2 = $fighter2;

        }



        /**
         * Choisit qui attaque et défend en premier aléatoirement
         *
         * @return array
         */
        private function setRole(): array {
            $fighters = [$this->fighter1, $this->fighter2];
            shuffle($fighters);
            $roles = ["attacker" => $fighters[0], "defender" => $fighters[1]];

            return $roles;
        }

        /**
         * Fait combattre les deux combattants jusqu'à ce que l'un n'ait plus de point de vie
         *
         * @return Fighter le combattant mort
         */
        public function fight() {
            while(true) {
                $this->round++;
                echo "<span style='color:blue'>Tour " . $this->round . "</span><br>";

                // extrait les rôles en variables
                extract($this->setRole());
                
                // attaquant attaque en 1er
                echo "<span style='font-weight:bold'>>>> " . $attacker->name. "(" . $attacker->hp . " PV)" . " attaque en premier et " . $defender->name . "(" . $defender->hp . " PV)" . " défend</span><br>";
                $attacker->hit() ? $defender->decreaseHp($attacker->atk) : $attacker->decreaseHp($attacker->atk);
                if ($attacker->isDead()) return $attacker;
                if ($defender->isDead()) return $defender;

                // défenseur riposte
                echo "<span style='font-weight:bold'>>>> " . $defender->name . " riposte</span><br>";
                $defender->hit() ? $attacker->decreaseHp($defender->atk) : $defender->decreaseHp($defender->atk);
                if ($attacker->isDead()) return $attacker;
                if ($defender->isDead()) return $defender;

                echo "<br>";
            }
        }
    }

?>
