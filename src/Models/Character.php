<?php
namespace Beweb\Td\Models;

use Beweb\Td\Models\Interface\Fighter;

class Character implements Fighter {
    private Race $race;
    private Job $job;
    private Stats $stats;

    public function __construct(Race $race, Job $job)
    {
        $this->stats = new Stats();
        $this->race = $race;
        $this->job = $job;
    }
}