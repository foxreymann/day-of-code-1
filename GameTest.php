<?php

require 'Game.php';

class GameTest extends PHPUnit_Framework_TestCase
{
    protected $game;

    protected function setUp()
    {
        $this->game = new Game('white');
    }

    public function testFirstMove() {
        $this->game->placePiece(0,0);
        $cell = $this->game->getCellAtPosition(0,0);
        $this->assertEquals('white',$cell->getColor()); 
        $this->assertEquals(1,$cell->getCount()); 
    }

    public function testSecondMoveCorrect() {
        $this->game->placePiece(0,0);
        $this->game->placePiece(1,1);

        $cell = $this->game->getCellAtPosition(0,0);
        $this->assertEquals('white',$cell->getColor()); 
        $this->assertEquals(1,$cell->getCount()); 

        $cell = $this->game->getCellAtPosition(1,1);
        $this->assertEquals('black',$cell->getColor()); 
        $this->assertEquals(1,$cell->getCount()); 
    }

    public function testBlackPieceOnTopOfWhiteShouldCauseException() {
        $this->game->placePiece(0,0);
        try {
            $this->game->placePiece(0,0);
        } catch (Exception $e) {
            return;
        }

        $this->fail('Expected an exception');
    }
}
