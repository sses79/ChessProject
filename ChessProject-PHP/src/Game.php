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
        //if(!checkNotSameSquare($piece, $newX, $newY)){
        //    return FALSE;
        //}
        //if(!$piece->move(MovementTypeEnum::MOVE(),$newX, $newY)){
        //    return FALSE;
        //}
        //if(!checkNotOccupied($piece, $newX, $newY)){
        //    return FALSE;
        //}
        return TRUE;
    }

    //private function checkNotOccupied(Piece $piece, $newX, $newY){
    //    $currentPiece = self::getBoard()->getPiece($newX, $newY);
    //
    //    if($currentPiece == 0
    //    || $currentPiece->getPieceColor() != $piece->getPieceColor())
    //        return FALSE;
    //}

    private function checkBoardBoundary(Piece $piece, $newX, $newY){
        if(!$this->_Board->isLegalBoardPosition($newX, $newY)){
            return FALSE;
        }
        return TRUE;
    }

    public function makeMove(Piece $piece, $newX, $newY){
        if($this->validateMove($piece, $newX, $newY)){

        }

    }




}