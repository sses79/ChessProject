<?php

namespace LogicNow;


class Pawn extends Piece
{
    /** @var  string */
    private $_shortName = 'P';

    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        parent::__construct($pieceColorEnum);
    }

    public function move(MovementTypeEnum $movementTypeEnum, $newX, $newY)
    {
        switch ($movementTypeEnum) {
            case MovementTypeEnum::MOVE():
                switch ($this->getPieceColor()) {
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
                return false;
                break;
            default:
                throw new \InvalidArgumentException("$movementTypeEnum is not a valid movement");
        }
    }

    public function addValidSquareCheck($_xCoordinate, $_yCoordinate){
        if($_xCoordinate === 7){
            return false;
        }
        return TRUE;
    }

    public function getName() {
        return $this->getPieceShortColor() . $this->_shortName;
    }

    protected function currentPositionAsString()
    {
        $result = "Current X: " . $this->getXCoordinate() . PHP_EOL;
        $result .= "Current Y: " . $this->getYCoordinate() . PHP_EOL;
        $result .= "Piece Color: " . $this->getPieceShortColor(). PHP_EOL;
        $result .= "Piece Name: " . $this->getName();
        return $result;
    }
}