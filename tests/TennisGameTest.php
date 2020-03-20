<?php
namespace Test;

use App\TennisGame;
use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{

  protected function setUp():void
  {
    parent::setUp();
    $this->game = new TennisGame();
  }

  protected function tearDown():void
  {
    parent::tearDown();
    $this->game = null;
  }

  /**
   * @test
   */
  public function test_LoveAll()
  {
    //Arrange
    $expected = 'Love-All';
    
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_FifteenLove()
  {
    //Arrange
    $this->game->firstPlayerScore();

    $expected = 'Fifteen-Love';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_ThirtyLove()
  {
    //Arrange
    $this->game->firstPlayerScore();
    $this->game->firstPlayerScore();

    $expected = 'Thirty-Love';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_ThirtyFifteen()
  {
    //Arrange
    $this->game->firstPlayerScore();
    $this->game->firstPlayerScore();

    $this->game->secondPlayerScore();

    $expected = 'Thirty-Fifteen';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_3vs3Deuce()
  {
    //Arrange
    $this->p1_addScore(3);
    $this->p2_addScore(3);

    $expected = 'Deuce';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_FifteenAll()
  {
    //Arrange
    $this->p1_addScore(1);
    $this->p2_addScore(1);

    $expected = 'Fifteen-All';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_5vs5Deuce()
  {
    //Arrange
    $this->p1_addScore(5);
    $this->p2_addScore(5);

    $expected = 'Deuce';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_4vs3AdvPlayer1()
  {
    //Arrange
    $this->p1_addScore(4);
    $this->p2_addScore(3);

    $expected = 'Advantage Player1';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_4vs5AdvPlayer1()
  {
    //Arrange
    $this->p1_addScore(4);
    $this->p2_addScore(5);

    $expected = 'Advantage Player2';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_4vs2WinforPlayer1()
  {
    //Arrange
    $this->p1_addScore(4);
    $this->p2_addScore(2);

    $expected = 'Win for Player1';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_3vs5WinforPlayer2()
  {
    //Arrange
    $this->p1_addScore(3);
    $this->p2_addScore(5);

    $expected = 'Win for Player2';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function test_FortyFifteen()
  {
    //Arrange
    $this->p1_addScore(3);
    $this->p2_addScore(1);

    $expected = 'Forty-Fifteen';
    //Act
    $actual = $this->game->score();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  private function p1_addScore($score)
  {
    for ($i = 0; $i < $score; $i ++) {
      $this->game->firstPlayerScore();
    }
  }

  private function p2_addScore($score)
  {
    for ($i = 0; $i < $score; $i ++) {
      $this->game->secondPlayerScore();
    }
  }

}
