<?php

namespace Beweb\Td\Engines;

use Beweb\Td\Models\Character;

class Round
{

  static int $number_of_round = 0;
  public $round_arena;
  public string $result = "";

  public function __construct($arena)
  {
    $this->round_arena = $arena;
    self::$number_of_round++;

    $attacker = $this->getFighter();
    $defender = $this->getFighter();

    $this->result .= "\n" . "- Round : " . self::$number_of_round . ", On a l'attaquant et le défenseur";
    $this->fight($attacker, $defender);

    echo $this->result;
    return $this->round_arena;
  }

  private function getFighter()
  {
    return $this->round_arena[rand(0, (count($this->round_arena) - 1))];
  }

  private function fight($attacker, $defender)
  {
    $defender->getStats()->hp -= $attacker->getStats()->attack;
    $this->result .= "\n" . "Attaquant truc attaque defenseur machin résumé point fe vie ././.. ";
    $this->isDefenderDead($defender);
  }

  private function isDefenderDead($defender)
  {
    if ($defender->getStats()->hp <= 0) {
      $this->result .= "\n" . "le défenseur machin a passer l'arme a gauche, il reste x joueur dans l'arene " . "\n" . "\n";
      $key = array_search($defender, $this->round_arena);
      array_splice($this->round_arena, $key, 1);
    }
  }
}
