<?php

namespace LogicNow;

class Game {

    /** @var  ChessBoard */
    private $_board;

    /** @var  Log */
    private $_log;

    public function __construct() {
        $this->setupBoard();
    }

    public function setupBoard() {
        $this->_board = new ChessBoard();
        $this->_log = new Log();
    }


    public function getBoard() {
        return $this->_board;
    }


    public function validateMove(Piece $piece, $newX, $newY) {
        if ( ! $this->checkBoardBoundary($piece, $newX, $newY)) {
            return FALSE;
        }
        if ( ! $this->checkNotSameCell($piece, $newX, $newY)) {
            return FALSE;
        }
        if ( ! $piece->move(MovementTypeEnum::MOVE(), $newX, $newY)) {
            return FALSE;
        }
        if ($this->checkNotOccupied($newX, $newY)) {
            return TRUE;
        } else {
            if ($this->checkOccupiedBySameColor($piece, $newX, $newY)) {
                return FALSE;
            }

            return TRUE;
        }
    }

    private function checkBoardBoundary(Piece $piece, $newX, $newY) {
        if ($this->_board->isLegalBoardPosition($piece->getXCoordinate(), $piece->getYCoordinate())
            && $this->_board->isLegalBoardPosition($newX, $newY)
        ) {
            return TRUE;
        }

        return FALSE;
    }

    private function checkNotSameCell(Piece $piece, $newX, $newY) {
        if ($piece->getXCoordinate() !== $newX || $piece->getYCoordinate() !== $newY) {
            return TRUE;
        }

        return FALSE;
    }

    private function checkNotOccupied($newX, $newY) {
        if (is_null($this->_board->getPiece($newX, $newY))) {
            return TRUE;
        }

        return FALSE;
    }

    private function checkOccupiedBySameColor(Piece $piece, $newX, $newY) {
        $current_piece = $this->_board->getPiece($newX, $newY);
        if ($current_piece->getPieceColor() == $piece->getPieceColor()) {
            //Occupied by same color
            return TRUE;
        }

        //Occupied by different color
        return FALSE;
    }

    public function makeMove(Piece $piece, $newX, $newY) {

        if ($this->validateMove($piece, $newX, $newY)) {
            if ($this->checkNotOccupied($newX, $newY)) {
                $this->move($piece, $newX, $newY);
            }
            if ( ! $this->checkOccupiedBySameColor($piece, $newX, $newY)) {
                $this->capture($piece, $newX, $newY);
            }
        } else {
            // TODO
            // Notify this is not a valid move
        }

    }

    private function move(Piece $Piece, $newX, $newY) {

        $this->_log->add($Piece->getName() . ' move from '
            . $Piece->getXCoordinate() . ',' . $Piece->getYCoordinate()
            . ' to ' . $newX . ',' . $newY, 'info');
        $this->_log->display();

        $this->_board->movePiece($Piece, $newX, $newY);
    }

    private function capture(Piece $Piece, $newX, $newY) {
        $this->_log->add($Piece->getName() . ' capture '
            . $this->_board->getPiece($newX, $newY)->getName() . ' '
            . 'at ' . $newX . ',' . $newY, 'info');
        $this->_log->display();

        $this->_board->removePiece($newX, $newY);
        $this->_board->movePiece($Piece, $newX, $newY);
    }


}