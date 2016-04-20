<?php

namespace LogicNow;

class ChessBoard
{

    const MAX_BOARD_WIDTH = 7;
    const MAX_BOARD_HEIGHT = 7;

    private $_pieces;

    public function __construct()
    {
        $this->_pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Pawn $pawn, $_xCoordinate, $_yCoordinate, PieceColorEnum $pieceColor)
    {
        throw new \ErrorException("Need to implement ChessBoard.add() ");
    }

    /**
     * @param $_xCoordinate
     * @param $_yCoordinate
     * @return bool
     */
    public function isLegalBoardPosition($_xCoordinate, $_yCoordinate)
    {
        if ($_xCoordinate > self::MAX_BOARD_WIDTH || $_xCoordinate < 0 ||
            $_yCoordinate > self::MAX_BOARD_HEIGHT || $_yCoordinate < 0
        ) {
            return false;
        }

        return true;
    }
}