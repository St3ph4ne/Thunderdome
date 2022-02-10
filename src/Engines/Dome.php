<?php

namespace Beweb\Td\Engines;

use Beweb\Td\Models\Interfaces\Fighter;

/**
     * Représente l'arène avec les combattants et les combats
     */
    class Dome {
        /**
         * liste des combattants
         *
         * @var array
         */
        public array $fighters;
        /**
         * instance du dome pour le singleton
         *
         * @var Dome|null
         */
        private static ?Dome $instance = null;



        private function __construct() {
            $this->fighters = [];
        }

        

        /**
         * ajoute un combattant à la liste de combattants
         *
         * @param Fighter $fighter
         * @return void
         */
        public function add(Fighter $fighter) {
            array_push($this->fighters, $fighter);
        }

        /**
         * ajoute plusieurs combattants à la liste ses combattants
         *
         * @param array $fighters
         * @return void
         */
        public function addAll(array $fighters) {
            $this->fighters = array_merge($this->fighters, $fighters);
        }


        /**
         * enlève un combattant de la liste de combattants
         *
         * @param Fighter $fighter
         * @return void
         */
        public function remove(Fighter $fighter) {
            if (($key = array_search($fighter, $this->fighters)) !== false) {
                unset($this->fighters[$key]);
            }
        }

        /**
         * Choisit aléatoirement 2 combattans depuis la liste des combattants
         *
         * @return array
         */
        public function chooseFighters() {
            return array_rand($this->fighters, 2); 
        }

        /**
         * commence le massacre dans le dôme
         *
         * @return Fighter ken le survivant
         */
        public function start(): Fighter {
            while(count($this->fighters) > 1) {
                // choisit 2 combattants dans la liste
                $fighters = $this->chooseFighters();
                $fighter1 = $this->fighters[$fighters[0]];
                $fighter2 = $this->fighters[$fighters[1]];
                echo "<span style='color:orange; font-weight:bold;'>Les combattants " . $fighter1->name . " et " . $fighter2->name . " entrent dans l'arène</span><br>";
                echo "<span style='color:orange; font-weight:bold;'>FIGHT !</span><br><br>";
                
                // crée et effectue le combat avec les 2 combattants
                $battle = new Battle($fighter1, $fighter2);
                $this->remove($battle->fight());
            }

            $survivor = array_values($this->fighters)[0];
            echo "<h1>WINNER IS : " . $survivor->name . " LE SURVIVANT <small> (de l'enfer)</small> !<h1>";
            return $survivor;
        }

        /**
         * Instance unique du dome
         *
         * @return Dome
         */
        public static function getInstance(): Dome {
            if(is_null(self::$instance)) self::$instance = new Dome();
    
            return self::$instance;
        }

    }


?>
