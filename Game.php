<?php
class Game {
    private $board;
    private $currentPlayer;

    function Game($startColor) {
        $this->currentPlayer = $startColor;
        $this->board = new Board();
    }

    public function placePiece($row,$column) {
        $position = new Position($row,$column);
        $this->board->placePiece($position,$this->currentPlayer); 
        $this->swapPlayer();
    }

    private function swapPlayer() {
        if($this->currentPlayer == 'white') {
            $this->currentPlayer = 'black';
        } else {
            $this->currentPlayer = 'white';
        }    
    }

    public function getCellAtPosition($row,$column) {
        $position = new Position($row,$column);
        return $this->board->getCellAtPosition($position); 
    } 
}

class Cell {
    private $color;
    private $count;

    function Cell($color,$count) {
        $this->color = $color;
        $this->count = $count;
    } 

    public function getColor() {
        return $this->color;
    }

    public function getCount() {
        return $this->count;
    }
    
}

class Board {
    private $board  = array(array(null,null,null),array(null,null,null),array(null,null,null));   

    public function placePiece($position,$color) {
        if($this->board[$position->getRow()][$position->getColumn()] != null && $this->board[$position->getRow()][$position->getColumn()]->getColor != $color) {
            throw new Exception("Move not allowed ");
        }

        $this->board[$position->getRow()][$position->getColumn()] = new Cell($color,1);
    }

    public function getCellAtPosition($position) {
        return $this->board[$position->getRow()][$position->getColumn()]; 
    }
}

class Position {
    private $row;
    private $column;

    function Position($row,$column) {
        $this->row = $row;
        $this->column = $column;
    }

    public function getRow() {
        return $this->row;
    }

    public function getColumn() {
        return $this->column;
    }

}
