<?php

namespace LogicNow;

class ChessBoard
{

    const MAX_BOARD_WIDTH = 8;
    const MAX_BOARD_HEIGHT = 8;

    private $_pieces;

    public function __construct()
    {
        $this->_pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Piece $piece, $_xCoordinate, $_yCoordinate, PieceColorEnum $pieceColor)
    {

        $piece->setXCoordinate(-1);
        $piece->setYCoordinate(-1);

        //check Position
        if(!$this->isLegalBoardPosition($_xCoordinate, $_yCoordinate)){
            return false;
        }

        //Pawn Position Check
        if($piece->getName() === 'P'){
            if(!$piece->addValidSquareCheck($_xCoordinate, $_yCoordinate)) {
                return FALSE;
            }
        }

        //Cell Check
        if(!$this->isLegalBoardCell($piece, $_xCoordinate, $_yCoordinate)){
            return false;
        }

        $this->_pieces[$_xCoordinate][$_yCoordinate] = $piece->getName();
        $piece->setXCoordinate($_xCoordinate);
        $piece->setYCoordinate($_yCoordinate);
        return true;
    }

    /** @return: boolean */
    public function isLegalBoardPosition($_xCoordinate, $_yCoordinate)
    {
        if ($_xCoordinate >= self::MAX_BOARD_WIDTH || $_xCoordinate < 0 ||
            $_yCoordinate >= self::MAX_BOARD_HEIGHT || $_yCoordinate < 0
        ) {
            return false;
        }
        return true;
    }

    public function isLegalBoardCell(Piece $piece, $_xCoordinate, $_yCoordinate)
    {
        $current_piece = $this->_pieces[$_xCoordinate][$_yCoordinate];
        if($this->isLegalBoardPosition($_xCoordinate, $_yCoordinate)){
            if ($current_piece === 0) {
                return true;
            }
        }
        return false;
    }

}