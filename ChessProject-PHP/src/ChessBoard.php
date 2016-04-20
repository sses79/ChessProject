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

    /**
     * @param Pawn $pawn
     * @param $_xCoordinate
     * @param $_yCoordinate
     * @param PieceColorEnum $pieceColor
     * @return bool
     */
    public function add(Pawn $pawn, $_xCoordinate, $_yCoordinate, PieceColorEnum $pieceColor)
    {
        $pawn->setXCoordinate(- 1);
        $pawn->setYCoordinate(- 1);

        //check Position
        if ( ! $this->isLegalBoardPosition($_xCoordinate, $_yCoordinate)) {
            return false;
        }

        //Pawn Position Check
        if ($_xCoordinate === 7) {
            return false;
        }

        //Cell Check
        if ( ! $this->isLegalBoardCell($_xCoordinate, $_yCoordinate)) {
            return false;
        }

        $this->_pieces[$_xCoordinate][$_yCoordinate] = 'P';
        $pawn->setXCoordinate($_xCoordinate);
        $pawn->setYCoordinate($_yCoordinate);

        return true;
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

    /**
     * @param Pawn $pawn
     * @param $_xCoordinate
     * @param $_yCoordinate
     * @return bool
     */
    public function isLegalBoardCell($_xCoordinate, $_yCoordinate)
    {
        $current_piece = $this->_pieces[$_xCoordinate][$_yCoordinate];
        if ($this->isLegalBoardPosition($_xCoordinate, $_yCoordinate)) {
            if ($current_piece === 0) {
                return true;
            }
        }

        return false;
    }
}