<?php
namespace Beweb\Td\Models\Impl\Race;

use Beweb\Td\Models\Race;

class Elf extends Race {

    public $emoticon = "\u{1F916}";

    public function __construct()
    {
        parent::__construct(); // recup des stats vides de Race - qui fait un new stat et stock dans $modifiers
        $this->modify(); // recup les stats "pleinnes"
    }
    
    //  on recupere les stats de Stats, qu'on initiatlise pour cette Race
    private function modify(){
        $this->modifiers->hp = 100;
        $this->modifiers->attack = 40;
        $this->modifiers->defense = 70;
    } 
} 