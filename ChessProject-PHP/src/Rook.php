<?php

namespace LogicNow;



class Rook extends Piece
{
    /** @var  string */
    private $_shortName = 'R';

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
        return $this->getPieceShortColor() . $this->_shortName;
    }

}