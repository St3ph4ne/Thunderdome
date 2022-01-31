<?php
namespace Beweb\Td\Models\Impl\Race;

use Beweb\Td\Models\Race;

class Human extends Race{
    // private int $hp;
    // private array $weapons;
    // private int $attack;
    // private int $defense;

    public function __construct($name)
    {
        $this->name = $name;
    }
}