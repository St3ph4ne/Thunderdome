<?php
namespace Beweb\Td\Models;;

abstract class Race {
    
    protected Stats $modifiers;
    
    function __construct(){
        $this->modifiers = new Stats();
    }

    /**
     * retourne l'ensemble des stats du character qui l'appelle
     */
    public function accessModifiersData(){
        return $this->modifiers; 
    }

};