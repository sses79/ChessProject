<?php

namespace LogicNow;



class Rook extends Piece
{

    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        parent::__construct($pieceColorEnum);
    }

    public function move(MovementTypeEnum $movementTypeEnum, $newX, $newY)
    {
        // TODO: Implement move() method.
        throw new \Exception("Need to implement Rook.move()");
    }

    function addValidSquareCheck($_xCoordinate, $_yCoordinate) {
        // TODO: Implement addValidSquareCheck() method.
        throw new \Exception("Need to implement Rook.addValidSquareCheck()");
    }

    public function getName() {
        switch ($this->getPieceColor()) {
            case PieceColorEnum::WHITE():
                return 'WR';
                break;
            case PieceColorEnum::BLACK();
                return 'BR';
                break;
            default:
                throw new \InvalidArgumentException("Piece color is not a valid color");
        }
    }

}