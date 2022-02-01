<?php
namespace Beweb\Td\Models\Impl\Race;

use Beweb\Td\Models\Race;

class Human extends Race {

    public $emoticon = "\u{1F921}";

    public function __construct()
    {
        parent::__construct(); // recup des stats vides de Race - qui fait un new stat et stock dans $modifiers
        $this->modify();
    }
    
    //  on recupère les stats de Stats, qu'on initiatlise pour cette Race
    private function modify(){
        $this->modifiers->hp = 50;
        $this->modifiers->attack = 60;
        $this->modifiers->defense = 30;
    } 

} 