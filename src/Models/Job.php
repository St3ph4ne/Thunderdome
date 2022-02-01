<?php
namespace Beweb\Td\Models;

abstract class Job  {

    protected int $hpmultiplicator;
    protected int $attackmultiplicator;
    protected int $defensemultiplicator;

    abstract function getMultiplicatorHp();
    abstract function getMultiplicatorAttack();
    abstract function getMultiplicatorDefense();

}