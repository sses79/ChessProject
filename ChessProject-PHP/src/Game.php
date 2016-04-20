<?php

namespace LogicNow;

class Game
{
    /** @var  ChessBoard */
    private $_Board;

    public function __construct()
    {
        $this->setupBoard();
    }

    public function setupBoard() {
        $this->_Board = new ChessBoard();
    }


    public function getBoard() {
        return $this->_Board;
    }


    public function validateMove(Piece $piece, $newX, $newY){
        if(!$this->checkBoardBoundary($piece, $newX, $newY)){
            return FALSE;
        }
        if(!$this->checkNotSameCell($piece, $newX, $newY)){
            return FALSE;
        }
        if(!$piece->move(MovementTypeEnum::MOVE(),$newX, $newY)){
            return FALSE;
        }
        if($this->checkNotOccupied($newX, $newY)){
            return true;
        }else{
            if($this->checkOccupiedBySameColor($piece, $newX, $newY)){
                return false;
            }
            return true;
        }
    }

    private function checkBoardBoundary(Piece $piece, $newX, $newY){
        if($this->_Board->isLegalBoardPosition($piece->getXCoordinate(), $piece->getYCoordinate())
            && $this->_Board->isLegalBoardPosition($newX, $newY)){
            return true;
        }
        return false;
    }

    private function checkNotSameCell(Piece $piece, $newX, $newY)
    {
        if($piece->getXCoordinate() !== $newX || $piece->getYCoordinate() !== $newY){
            return true;
        }
        return false;
    }

    private function checkNotOccupied($newX, $newY){
        if(is_null($this->_Board->getPiece($newX, $newY))){
            return true;
        }
        return false;
    }

    private function checkOccupiedBySameColor(Piece $piece, $newX, $newY){
        $current_piece = $this->_Board->getPiece($newX, $newY);
        if($current_piece->getPieceColor() == $piece->getPieceColor()){
            //Occupied by same color
            return true;
        }
        //Occupied by different color
        return false;
    }

    public function makeMove(Piece $piece, $newX, $newY){
        if($this->validateMove($piece, $newX, $newY)){
            if($this->checkNotOccupied($newX, $newY) ){
                $this->move($piece, $newX, $newY);
            }
            if(!$this->checkOccupiedBySameColor($piece, $newX, $newY)){
                $this->capture($piece, $newX, $newY);
            }
        }else{
            // TODO
            // Notify this is not a valid move
        }

    }

    private function move(Piece $Piece, $newX, $newY){
        $this->_Board->movePiece($Piece, $newX, $newY);
    }

    private function capture(Piece $Piece, $newX, $newY){
        $this->_Board->removePiece($newX, $newY);
        $this->_Board->movePiece($Piece, $newX, $newY);
    }


}