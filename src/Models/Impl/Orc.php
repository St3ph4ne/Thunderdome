<?php
namespace Beweb\Td\Models\Impl\Race;

use Beweb\Td\Models\Race;

class Orc extends Race {

    public $emoticon = "\u{1F47D}";

    public function __construct()
    {
        parent::__construct(); // recup des stats vides de Race - qui fait un new stat et stock dans $modifiers
        $this->modify();
    }
    
    //  on recupère les stats de Stats, qu'on initiatlise pour cette Race
    private function modify(){
        $this->modifiers->hp = 30;
        $this->modifiers->attack = 70;
        $this->modifiers->defense = 40;
    } 

} 