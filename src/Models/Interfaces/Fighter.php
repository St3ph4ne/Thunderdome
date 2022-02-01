<?php

namespace Beweb\Td\Models\Interfaces;

interface Fighter
{

    function attack(Fighter &$target): void;
}
