<?php
namespace App;

class TennisGame
{

  private $p1_score = 0;
  private $p2_score = 0;

  public function firstPlayerScore()
  {
    $this->p1_score ++;
  }

  public function secondPlayerScore()
  {
    $this->p2_score ++;
  }

  public function score()
  {
    $scoreLookup = [0 => 'Love', 1 => 'Fifteen', 2 => 'Thirty', 3 => 'Forty'];
    $maxScore = max($this->p1_score, $this->p2_score);
    if ($this->p1_score == $this->p2_score) {

      if ($this->p1_score >= 3) {
        return 'Deuce';
      }

      return $scoreLookup[$this->p1_score] . '-All';

    }    

    if ($maxScore >= 4) {
      $score_difference = abs($this->p1_score - $this->p2_score);
      $adv = $this->p1_score > $this->p2_score ? 'Player1' : 'Player2';
    
      if ($score_difference == 1) {
        return 'Advantage ' . $adv;
      } else if ($score_difference == 2) {
        return 'Win for ' . $adv;
      }
    }

    return $scoreLookup[$this->p1_score] . '-' . $scoreLookup[$this->p2_score];

  }

}