<?php
namespace Beweb\Td\Models;

abstract class Job  {

    protected int $hpmultiplicator;
    protected int $attackmultiplicator;
    protected int $defensemultiplicator;

    // public function getMultiHpJob()
    // {
    //     $this->job->getMultiplicatorHp();
    // }

    // public function getMultiAttackJob()
    // {
    //     $this->job->getMultiplicatorAttack();
    // }

    // public function getMultiDefenseJob()
    // {
    //     $this->job->getMultiplicatorDefense();
    // }

    abstract function getMultiplicatorHp();
    abstract function getMultiplicatorAttack();
    abstract function getMultiplicatorDefense();

}