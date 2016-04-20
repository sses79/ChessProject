<?php

namespace LogicNow;


abstract class Piece
{

    /** @var PieceColorEnum */
    private $_pieceColorEnum;
    /** @var  ChessBoard */
    private $_chessBoard;
    /** @var  int */
    private $_xCoordinate;
    /** @var  int */
    private $_yCoordinate;
    /** @var  string */
    private $_shortColor;

    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        $this->_pieceColorEnum = $pieceColorEnum;
        $this->setPieceShortColor($pieceColorEnum);
    }

    public function getChessBoard()
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

    public function setPieceShortColor(PieceColorEnum $value)
    {
        switch ($value) {
            case PieceColorEnum::WHITE():
                $this->_shortColor = 'W';
                break;
            case PieceColorEnum::BLACK();
                $this->_shortColor = 'B';
                break;
            default:
                throw new \InvalidArgumentException("Piece color is not a valid color");
        }
    }

    public function getPieceShortColor()
    {
        return $this->_shortColor;
    }

    abstract function move(MovementTypeEnum $movementTypeEnum, $newX, $newY);

    public function toString()
    {
        return $this->currentPositionAsString();
    }

    protected function currentPositionAsString()
    {
        $result = "Current X: " . $this->_xCoordinate . PHP_EOL;
        $result .= "Current Y: " . $this->_yCoordinate . PHP_EOL;
        $result .= "Piece Color: " . $this->_shortColor;
        return $result;
    }

    abstract function addValidSquareCheck($_xCoordinate, $_yCoordinate);

    abstract function getName();

}