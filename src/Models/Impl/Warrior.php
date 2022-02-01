<?php
namespace Beweb\Td\Models\Impl\Job;


use Beweb\Td\Models\Job;

/**
 * Warrior class use to create modificator aplly at race->modifiers properties
 * 
*/
class Warrior extends Job {

    /**
     * Warrior class override clss Job attributs
     * define multiplicator which will be applied to character Hp, defense and attack points
    */
    public function __construct(){
      $this->hpmultiplicator = 2;
      $this->attackmultiplicator = 2;
      $this->defensemultiplicator = 2;
    }

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// Liste des getters

    public function getMultiplicatorHp(){
      return $this->hpmultiplicator;
    }

    public function getMultiplicatorAttack(){
      return $this->attackmultiplicator;
    }

    public function getMultiplicatorDefense(){
      return $this->defensemultiplicator;
    }
    
}