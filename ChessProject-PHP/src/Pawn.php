<?php

namespace LogicNow;


class Pawn
{

    /** @var PieceColorEnum */
    private $_pieceColorEnum;
    /** @var  ChessBoard */
    private $_chessBoard;
    /** @var  int */
    private $_xCoordinate;
    /** @var  int */
    private $_yCoordinate;

    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        $this->_pieceColorEnum = $pieceColorEnum;
    }

    public function getChesssBoard()
    {
        return $this->_chessBoard;
    }

    public function setChessBoard(ChessBoard $chessBoard)
    {
        $this->_chessBoard = $chessBoard;
    }

    /** @return int */
    public function getXCoordinate()
    {
        return $this->_xCoordinate;
    }

    /** @var int */
    public function setXCoordinate($value)
    {
        $this->_xCoordinate = $value;
    }

    /** @return int */
    public function getYCoordinate()
    {
        return $this->_yCoordinate;
    }

    /** @var int */
    public function setYCoordinate($value)
    {
        $this->_yCoordinate = $value;
    }

    public function getPieceColor()
    {
        return $this->_pieceColorEnum;
    }

    public function setPieceColor(PieceColorEnum $value)
    {
        $this->_pieceColorEnum = $value;
    }

    public function move(MovementTypeEnum $movementTypeEnum, $newX, $newY)
    {
        switch ($movementTypeEnum) {
            case MovementTypeEnum::MOVE():
                switch ($this->_pieceColorEnum) {
                    case PieceColorEnum::WHITE():
                        //Pawn only allow change Y
                        if($newX == $this->getXCoordinate()){
                            if($newY > $this->getYCoordinate()){
                                //Only one space limited in the exercise
                                if($newY - $this->getYCoordinate() == 1){
                                    $this->setYCoordinate($newY);
                                    return true;
                                }
                            }
                        }
                        return false;
                        break;
                    case PieceColorEnum::BLACK();
                        if($newX == $this->getXCoordinate()){
                            if($newY < $this->getYCoordinate()){
                                //Only one space limited in the exercise
                                if($this->getYCoordinate() - $newY== 1){
                                    $this->setYCoordinate($newY);
                                    return true;
                                }
                            }
                        }
                        return false;
                        break;
                    default:
                        throw new \InvalidArgumentException("Piece color is not a valid color");
                }
                break;
            case MovementTypeEnum::CAPTURE():
                // TODO
                break;
            default:
                throw new \InvalidArgumentException("$movementTypeEnum is not a valid movement");
        }
    }

    public function toString()
    {
        return $this->currentPositionAsString();
    }

    protected function currentPositionAsString()
    {
        $result = "Current X: " . $this->_xCoordinate . PHP_EOL;
        $result .= "Current Y: " . $this->_yCoordinate . PHP_EOL;
        $result .= "Piece Color: " . $this->_pieceColorEnum;
        return $result;
    }

}